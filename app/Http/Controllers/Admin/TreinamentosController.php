<?php

namespace App\Http\Controllers\Admin;

use App\Treinamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTreinamentosRequest;
use App\Http\Requests\Admin\UpdateTreinamentosRequest;
use Yajra\DataTables\DataTables;

class TreinamentosController extends Controller
{
    /**
     * Display a listing of Treinamento.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('treinamento_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Treinamento::query();
            $query->with("nome_treinamento");
            $query->with("nome_setores");
            $query->with("instrutor");
            $query->with("nome_participantes");
            $query->with("tipo_treinamento");
            $query->with("espec_treinamento");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('treinamento_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'treinamentos.id',
                'treinamentos.nome_treinamento_id',
                'treinamentos.carga_horaria',
                'treinamentos.nome_setores_id',
                'treinamentos.data_inicio',
                'treinamentos.data_conclusao',
                'treinamentos.validadade',
                'treinamentos.reciclagem',
                'treinamentos.situacao_turma',
                'treinamentos.localidade',
                'treinamentos.disponibilidade',
                'treinamentos.instrutor_id',
                'treinamentos.tipo_treinamento_id',
                'treinamentos.espec_treinamento_id',
                'treinamentos.horas',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'treinamento_';
                $routeKey = 'admin.treinamentos';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('nome_treinamento.nome_treinamento', function ($row) {
                return $row->nome_treinamento ? $row->nome_treinamento->nome_treinamento : '';
            });
            $table->editColumn('carga_horaria', function ($row) {
                return $row->carga_horaria ? $row->carga_horaria : '';
            });
            $table->editColumn('nome_setores.nome_setores', function ($row) {
                return $row->nome_setores ? $row->nome_setores->nome_setores : '';
            });
            $table->editColumn('data_inicio', function ($row) {
                return $row->data_inicio ? $row->data_inicio : '';
            });
            $table->editColumn('data_conclusao', function ($row) {
                return $row->data_conclusao ? $row->data_conclusao : '';
            });
            $table->editColumn('validadade', function ($row) {
                return $row->validadade ? $row->validadade : '';
            });
            $table->editColumn('reciclagem', function ($row) {
                return $row->reciclagem ? $row->reciclagem : '';
            });
            $table->editColumn('situacao_turma', function ($row) {
                return $row->situacao_turma ? $row->situacao_turma : '';
            });
            $table->editColumn('localidade', function ($row) {
                return $row->localidade ? $row->localidade : '';
            });
            $table->editColumn('disponibilidade', function ($row) {
                return $row->disponibilidade ? $row->disponibilidade : '';
            });
            $table->editColumn('instrutor.nome_funcionario', function ($row) {
                return $row->instrutor ? $row->instrutor->nome_funcionario : '';
            });
            $table->editColumn('nome_participantes.nome_funcionario', function ($row) {
                if(count($row->nome_participantes) == 0) {
                    return '';
                }

                return '<span class="label label-info label-many">' . implode('</span><span class="label label-info label-many"> ',
                        $row->nome_participantes->pluck('nome_funcionario')->toArray()) . '</span>';
            });
            $table->editColumn('tipo_treinamento.nome_tipo_treinamento', function ($row) {
                return $row->tipo_treinamento ? $row->tipo_treinamento->nome_tipo_treinamento : '';
            });
            $table->editColumn('espec_treinamento.nome_espectreinamento', function ($row) {
                return $row->espec_treinamento ? $row->espec_treinamento->nome_espectreinamento : '';
            });
            $table->editColumn('horas', function ($row) {
                return $row->horas ? $row->horas : '';
            });

            $table->rawColumns(['actions','massDelete','nome_participantes.nome_funcionario']);

            return $table->make(true);
        }

        return view('admin.treinamentos.index');
    }

    /**
     * Show the form for creating new Treinamento.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('treinamento_create')) {
            return abort(401);
        }
        
        $nome_treinamentos = \App\Turma::get()->pluck('nome_treinamento', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $nome_setores = \App\Setore::get()->pluck('nome_setores', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $instrutors = \App\Funcionario::get()->pluck('nome_funcionario', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $nome_participantes = \App\Funcionario::get()->pluck('nome_funcionario', 'id');

        $tipo_treinamentos = \App\TipoDeTreinamento::get()->pluck('nome_tipo_treinamento', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $espec_treinamentos = \App\EspecTreinamento::get()->pluck('nome_espectreinamento', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.treinamentos.create', compact('nome_treinamentos', 'nome_setores', 'instrutors', 'nome_participantes', 'tipo_treinamentos', 'espec_treinamentos'));
    }

    /**
     * Store a newly created Treinamento in storage.
     *
     * @param  \App\Http\Requests\StoreTreinamentosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTreinamentosRequest $request)
    {
        if (! Gate::allows('treinamento_create')) {
            return abort(401);
        }
        $treinamento = Treinamento::create($request->all());
        $treinamento->nome_participantes()->sync(array_filter((array)$request->input('nome_participantes')));



        return redirect()->route('admin.treinamentos.index');
    }


    /**
     * Show the form for editing Treinamento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('treinamento_edit')) {
            return abort(401);
        }
        
        $nome_treinamentos = \App\Turma::get()->pluck('nome_treinamento', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $nome_setores = \App\Setore::get()->pluck('nome_setores', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $instrutors = \App\Funcionario::get()->pluck('nome_funcionario', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $nome_participantes = \App\Funcionario::get()->pluck('nome_funcionario', 'id');

        $tipo_treinamentos = \App\TipoDeTreinamento::get()->pluck('nome_tipo_treinamento', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $espec_treinamentos = \App\EspecTreinamento::get()->pluck('nome_espectreinamento', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $treinamento = Treinamento::findOrFail($id);

        return view('admin.treinamentos.edit', compact('treinamento', 'nome_treinamentos', 'nome_setores', 'instrutors', 'nome_participantes', 'tipo_treinamentos', 'espec_treinamentos'));
    }

    /**
     * Update Treinamento in storage.
     *
     * @param  \App\Http\Requests\UpdateTreinamentosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTreinamentosRequest $request, $id)
    {
        if (! Gate::allows('treinamento_edit')) {
            return abort(401);
        }
        $treinamento = Treinamento::findOrFail($id);
        $treinamento->update($request->all());
        $treinamento->nome_participantes()->sync(array_filter((array)$request->input('nome_participantes')));



        return redirect()->route('admin.treinamentos.index');
    }


    /**
     * Display Treinamento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('treinamento_view')) {
            return abort(401);
        }
        $treinamento = Treinamento::findOrFail($id);

        return view('admin.treinamentos.show', compact('treinamento'));
    }


    /**
     * Remove Treinamento from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('treinamento_delete')) {
            return abort(401);
        }
        $treinamento = Treinamento::findOrFail($id);
        $treinamento->delete();

        return redirect()->route('admin.treinamentos.index');
    }

    /**
     * Delete all selected Treinamento at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('treinamento_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Treinamento::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Treinamento from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('treinamento_delete')) {
            return abort(401);
        }
        $treinamento = Treinamento::onlyTrashed()->findOrFail($id);
        $treinamento->restore();

        return redirect()->route('admin.treinamentos.index');
    }

    /**
     * Permanently delete Treinamento from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('treinamento_delete')) {
            return abort(401);
        }
        $treinamento = Treinamento::onlyTrashed()->findOrFail($id);
        $treinamento->forceDelete();

        return redirect()->route('admin.treinamentos.index');
    }
}
