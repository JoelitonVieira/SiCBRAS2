<?php

namespace App\Http\Controllers\Admin;

use App\ComposicaoFisica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreComposicaoFisicasRequest;
use App\Http\Requests\Admin\UpdateComposicaoFisicasRequest;
use Yajra\DataTables\DataTables;

class ComposicaoFisicasController extends Controller
{
    /**
     * Display a listing of ComposicaoFisica.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('composicao_fisica_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = ComposicaoFisica::query();
            $query->with("cd_especificacao");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('composicao_fisica_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'composicao_fisicas.id',
                'composicao_fisicas.granulometria',
                'composicao_fisicas.maximo',
                'composicao_fisicas.minimo',
                'composicao_fisicas.cd_especificacao_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'composicao_fisica_';
                $routeKey = 'admin.composicao_fisicas';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('granulometria', function ($row) {
                return $row->granulometria ? $row->granulometria : '';
            });
            $table->editColumn('maximo', function ($row) {
                return $row->maximo ? $row->maximo : '';
            });
            $table->editColumn('minimo', function ($row) {
                return $row->minimo ? $row->minimo : '';
            });
            $table->editColumn('cd_especificacao.codigo', function ($row) {
                return $row->cd_especificacao ? $row->cd_especificacao->codigo : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.composicao_fisicas.index');
    }

    /**
     * Show the form for creating new ComposicaoFisica.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('composicao_fisica_create')) {
            return abort(401);
        }
        
        $cd_especificacaos = \App\Especificacao::get()->pluck('codigo', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.composicao_fisicas.create', compact('cd_especificacaos'));
    }

    /**
     * Store a newly created ComposicaoFisica in storage.
     *
     * @param  \App\Http\Requests\StoreComposicaoFisicasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComposicaoFisicasRequest $request)
    {
        if (! Gate::allows('composicao_fisica_create')) {
            return abort(401);
        }
        $composicao_fisica = ComposicaoFisica::create($request->all());



        return redirect()->route('admin.composicao_fisicas.index');
    }


    /**
     * Show the form for editing ComposicaoFisica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('composicao_fisica_edit')) {
            return abort(401);
        }
        
        $cd_especificacaos = \App\Especificacao::get()->pluck('codigo', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $composicao_fisica = ComposicaoFisica::findOrFail($id);

        return view('admin.composicao_fisicas.edit', compact('composicao_fisica', 'cd_especificacaos'));
    }

    /**
     * Update ComposicaoFisica in storage.
     *
     * @param  \App\Http\Requests\UpdateComposicaoFisicasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComposicaoFisicasRequest $request, $id)
    {
        if (! Gate::allows('composicao_fisica_edit')) {
            return abort(401);
        }
        $composicao_fisica = ComposicaoFisica::findOrFail($id);
        $composicao_fisica->update($request->all());



        return redirect()->route('admin.composicao_fisicas.index');
    }


    /**
     * Display ComposicaoFisica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('composicao_fisica_view')) {
            return abort(401);
        }
        $composicao_fisica = ComposicaoFisica::findOrFail($id);

        return view('admin.composicao_fisicas.show', compact('composicao_fisica'));
    }


    /**
     * Remove ComposicaoFisica from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('composicao_fisica_delete')) {
            return abort(401);
        }
        $composicao_fisica = ComposicaoFisica::findOrFail($id);
        $composicao_fisica->delete();

        return redirect()->route('admin.composicao_fisicas.index');
    }

    /**
     * Delete all selected ComposicaoFisica at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('composicao_fisica_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ComposicaoFisica::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore ComposicaoFisica from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('composicao_fisica_delete')) {
            return abort(401);
        }
        $composicao_fisica = ComposicaoFisica::onlyTrashed()->findOrFail($id);
        $composicao_fisica->restore();

        return redirect()->route('admin.composicao_fisicas.index');
    }

    /**
     * Permanently delete ComposicaoFisica from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('composicao_fisica_delete')) {
            return abort(401);
        }
        $composicao_fisica = ComposicaoFisica::onlyTrashed()->findOrFail($id);
        $composicao_fisica->forceDelete();

        return redirect()->route('admin.composicao_fisicas.index');
    }
}
