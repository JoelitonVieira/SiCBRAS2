<?php

namespace App\Http\Controllers\Admin;

use App\ComposicaoQuimica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreComposicaoQuimicasRequest;
use App\Http\Requests\Admin\UpdateComposicaoQuimicasRequest;
use Yajra\DataTables\DataTables;

class ComposicaoQuimicasController extends Controller
{
    /**
     * Display a listing of ComposicaoQuimica.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('composicao_quimica_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = ComposicaoQuimica::query();
            $query->with("cd_especificacao");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('composicao_quimica_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'composicao_quimicas.id',
                'composicao_quimicas.comp',
                'composicao_quimicas.max',
                'composicao_quimicas.minimo',
                'composicao_quimicas.cd_especificacao_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'composicao_quimica_';
                $routeKey = 'admin.composicao_quimicas';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('comp', function ($row) {
                return $row->comp ? $row->comp : '';
            });
            $table->editColumn('max', function ($row) {
                return $row->max ? $row->max : '';
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

        return view('admin.composicao_quimicas.index');
    }

    /**
     * Show the form for creating new ComposicaoQuimica.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('composicao_quimica_create')) {
            return abort(401);
        }
        
        $cd_especificacaos = \App\Especificacao::get()->pluck('codigo', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.composicao_quimicas.create', compact('cd_especificacaos'));
    }

    /**
     * Store a newly created ComposicaoQuimica in storage.
     *
     * @param  \App\Http\Requests\StoreComposicaoQuimicasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComposicaoQuimicasRequest $request)
    {
        if (! Gate::allows('composicao_quimica_create')) {
            return abort(401);
        }
        $composicao_quimica = ComposicaoQuimica::create($request->all());



        return redirect()->route('admin.composicao_quimicas.index');
    }


    /**
     * Show the form for editing ComposicaoQuimica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('composicao_quimica_edit')) {
            return abort(401);
        }
        
        $cd_especificacaos = \App\Especificacao::get()->pluck('codigo', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $composicao_quimica = ComposicaoQuimica::findOrFail($id);

        return view('admin.composicao_quimicas.edit', compact('composicao_quimica', 'cd_especificacaos'));
    }

    /**
     * Update ComposicaoQuimica in storage.
     *
     * @param  \App\Http\Requests\UpdateComposicaoQuimicasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComposicaoQuimicasRequest $request, $id)
    {
        if (! Gate::allows('composicao_quimica_edit')) {
            return abort(401);
        }
        $composicao_quimica = ComposicaoQuimica::findOrFail($id);
        $composicao_quimica->update($request->all());



        return redirect()->route('admin.composicao_quimicas.index');
    }


    /**
     * Display ComposicaoQuimica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('composicao_quimica_view')) {
            return abort(401);
        }
        $composicao_quimica = ComposicaoQuimica::findOrFail($id);

        return view('admin.composicao_quimicas.show', compact('composicao_quimica'));
    }


    /**
     * Remove ComposicaoQuimica from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('composicao_quimica_delete')) {
            return abort(401);
        }
        $composicao_quimica = ComposicaoQuimica::findOrFail($id);
        $composicao_quimica->delete();

        return redirect()->route('admin.composicao_quimicas.index');
    }

    /**
     * Delete all selected ComposicaoQuimica at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('composicao_quimica_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ComposicaoQuimica::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore ComposicaoQuimica from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('composicao_quimica_delete')) {
            return abort(401);
        }
        $composicao_quimica = ComposicaoQuimica::onlyTrashed()->findOrFail($id);
        $composicao_quimica->restore();

        return redirect()->route('admin.composicao_quimicas.index');
    }

    /**
     * Permanently delete ComposicaoQuimica from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('composicao_quimica_delete')) {
            return abort(401);
        }
        $composicao_quimica = ComposicaoQuimica::onlyTrashed()->findOrFail($id);
        $composicao_quimica->forceDelete();

        return redirect()->route('admin.composicao_quimicas.index');
    }
}
