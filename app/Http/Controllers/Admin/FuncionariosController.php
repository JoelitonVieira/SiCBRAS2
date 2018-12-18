<?php

namespace App\Http\Controllers\Admin;

use App\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFuncionariosRequest;
use App\Http\Requests\Admin\UpdateFuncionariosRequest;
use Yajra\DataTables\DataTables;

class FuncionariosController extends Controller
{
    /**
     * Display a listing of Funcionario.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('funcionario_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Funcionario::query();
            $query->with("nome_cargo");
            $query->with("nome_departamento");
            $query->with("nome_setor");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('funcionario_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'funcionarios.id',
                'funcionarios.numero_matricula',
                'funcionarios.nome_funcionario',
                'funcionarios.nome_cargo_id',
                'funcionarios.nome_departamento_id',
                'funcionarios.nome_setor_id',
                'funcionarios.instrutor',
                'funcionarios.situacao',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'funcionario_';
                $routeKey = 'admin.funcionarios';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('numero_matricula', function ($row) {
                return $row->numero_matricula ? $row->numero_matricula : '';
            });
            $table->editColumn('nome_funcionario', function ($row) {
                return $row->nome_funcionario ? $row->nome_funcionario : '';
            });
            $table->editColumn('nome_cargo.nome_cargo', function ($row) {
                return $row->nome_cargo ? $row->nome_cargo->nome_cargo : '';
            });
            $table->editColumn('nome_departamento.nome_departamento', function ($row) {
                return $row->nome_departamento ? $row->nome_departamento->nome_departamento : '';
            });
            $table->editColumn('nome_setor.nome_setores', function ($row) {
                return $row->nome_setor ? $row->nome_setor->nome_setores : '';
            });
            $table->editColumn('instrutor', function ($row) {
                return $row->instrutor ? $row->instrutor : '';
            });
            $table->editColumn('situacao', function ($row) {
                return $row->situacao ? $row->situacao : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.funcionarios.index');
    }

    /**
     * Show the form for creating new Funcionario.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('funcionario_create')) {
            return abort(401);
        }
        
        $nome_cargos = \App\Cargo::get()->pluck('nome_cargo', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $nome_departamentos = \App\Departamento::get()->pluck('nome_departamento', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $nome_setors = \App\Setore::get()->pluck('nome_setores', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.funcionarios.create', compact('nome_cargos', 'nome_departamentos', 'nome_setors'));
    }

    /**
     * Store a newly created Funcionario in storage.
     *
     * @param  \App\Http\Requests\StoreFuncionariosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFuncionariosRequest $request)
    {
        if (! Gate::allows('funcionario_create')) {
            return abort(401);
        }
        $funcionario = Funcionario::create($request->all());



        return redirect()->route('admin.funcionarios.index');
    }


    /**
     * Show the form for editing Funcionario.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('funcionario_edit')) {
            return abort(401);
        }
        
        $nome_cargos = \App\Cargo::get()->pluck('nome_cargo', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $nome_departamentos = \App\Departamento::get()->pluck('nome_departamento', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $nome_setors = \App\Setore::get()->pluck('nome_setores', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $funcionario = Funcionario::findOrFail($id);

        return view('admin.funcionarios.edit', compact('funcionario', 'nome_cargos', 'nome_departamentos', 'nome_setors'));
    }

    /**
     * Update Funcionario in storage.
     *
     * @param  \App\Http\Requests\UpdateFuncionariosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFuncionariosRequest $request, $id)
    {
        if (! Gate::allows('funcionario_edit')) {
            return abort(401);
        }
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->update($request->all());



        return redirect()->route('admin.funcionarios.index');
    }


    /**
     * Display Funcionario.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('funcionario_view')) {
            return abort(401);
        }
        
        $nome_cargos = \App\Cargo::get()->pluck('nome_cargo', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $nome_departamentos = \App\Departamento::get()->pluck('nome_departamento', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $nome_setors = \App\Setore::get()->pluck('nome_setores', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$treinamentos = \App\Treinamento::where('instrutor_id', $id)->get();$treinamentos = \App\Treinamento::whereHas('nome_participantes',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();

        $funcionario = Funcionario::findOrFail($id);

        return view('admin.funcionarios.show', compact('funcionario', 'treinamentos', 'treinamentos'));
    }


    /**
     * Remove Funcionario from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('funcionario_delete')) {
            return abort(401);
        }
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->delete();

        return redirect()->route('admin.funcionarios.index');
    }

    /**
     * Delete all selected Funcionario at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('funcionario_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Funcionario::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Funcionario from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('funcionario_delete')) {
            return abort(401);
        }
        $funcionario = Funcionario::onlyTrashed()->findOrFail($id);
        $funcionario->restore();

        return redirect()->route('admin.funcionarios.index');
    }

    /**
     * Permanently delete Funcionario from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('funcionario_delete')) {
            return abort(401);
        }
        $funcionario = Funcionario::onlyTrashed()->findOrFail($id);
        $funcionario->forceDelete();

        return redirect()->route('admin.funcionarios.index');
    }
}
