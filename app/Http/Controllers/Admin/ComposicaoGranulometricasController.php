<?php

namespace App\Http\Controllers\Admin;

use App\ComposicaoGranulometrica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreComposicaoGranulometricasRequest;
use App\Http\Requests\Admin\UpdateComposicaoGranulometricasRequest;
use Yajra\DataTables\DataTables;

class ComposicaoGranulometricasController extends Controller
{
    /**
     * Display a listing of ComposicaoGranulometrica.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('composicao_granulometrica_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = ComposicaoGranulometrica::query();
            $query->with("cd_especificacao");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('composicao_granulometrica_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'composicao_granulometricas.id',
                'composicao_granulometricas.telas',
                'composicao_granulometricas.maximo',
                'composicao_granulometricas.minimo',
                'composicao_granulometricas.cd_especificacao_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'composicao_granulometrica_';
                $routeKey = 'admin.composicao_granulometricas';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('telas', function ($row) {
                return $row->telas ? $row->telas : '';
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

        return view('admin.composicao_granulometricas.index');
    }

    /**
     * Show the form for creating new ComposicaoGranulometrica.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('composicao_granulometrica_create')) {
            return abort(401);
        }
        
        $cd_especificacaos = \App\Especificacao::get()->pluck('codigo', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.composicao_granulometricas.create', compact('cd_especificacaos'));
    }

    /**
     * Store a newly created ComposicaoGranulometrica in storage.
     *
     * @param  \App\Http\Requests\StoreComposicaoGranulometricasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreComposicaoGranulometricasRequest $request)
    {
        if (! Gate::allows('composicao_granulometrica_create')) {
            return abort(401);
        }
        $composicao_granulometrica = ComposicaoGranulometrica::create($request->all());



        return redirect()->route('admin.composicao_granulometricas.index');
    }


    /**
     * Show the form for editing ComposicaoGranulometrica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('composicao_granulometrica_edit')) {
            return abort(401);
        }
        
        $cd_especificacaos = \App\Especificacao::get()->pluck('codigo', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $composicao_granulometrica = ComposicaoGranulometrica::findOrFail($id);

        return view('admin.composicao_granulometricas.edit', compact('composicao_granulometrica', 'cd_especificacaos'));
    }

    /**
     * Update ComposicaoGranulometrica in storage.
     *
     * @param  \App\Http\Requests\UpdateComposicaoGranulometricasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateComposicaoGranulometricasRequest $request, $id)
    {
        if (! Gate::allows('composicao_granulometrica_edit')) {
            return abort(401);
        }
        $composicao_granulometrica = ComposicaoGranulometrica::findOrFail($id);
        $composicao_granulometrica->update($request->all());



        return redirect()->route('admin.composicao_granulometricas.index');
    }


    /**
     * Display ComposicaoGranulometrica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('composicao_granulometrica_view')) {
            return abort(401);
        }
        $composicao_granulometrica = ComposicaoGranulometrica::findOrFail($id);

        return view('admin.composicao_granulometricas.show', compact('composicao_granulometrica'));
    }


    /**
     * Remove ComposicaoGranulometrica from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('composicao_granulometrica_delete')) {
            return abort(401);
        }
        $composicao_granulometrica = ComposicaoGranulometrica::findOrFail($id);
        $composicao_granulometrica->delete();

        return redirect()->route('admin.composicao_granulometricas.index');
    }

    /**
     * Delete all selected ComposicaoGranulometrica at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('composicao_granulometrica_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ComposicaoGranulometrica::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore ComposicaoGranulometrica from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('composicao_granulometrica_delete')) {
            return abort(401);
        }
        $composicao_granulometrica = ComposicaoGranulometrica::onlyTrashed()->findOrFail($id);
        $composicao_granulometrica->restore();

        return redirect()->route('admin.composicao_granulometricas.index');
    }

    /**
     * Permanently delete ComposicaoGranulometrica from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('composicao_granulometrica_delete')) {
            return abort(401);
        }
        $composicao_granulometrica = ComposicaoGranulometrica::onlyTrashed()->findOrFail($id);
        $composicao_granulometrica->forceDelete();

        return redirect()->route('admin.composicao_granulometricas.index');
    }
}
