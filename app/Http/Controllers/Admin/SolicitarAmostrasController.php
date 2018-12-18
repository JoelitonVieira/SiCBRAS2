<?php

namespace App\Http\Controllers\Admin;

use App\SolicitarAmostra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSolicitarAmostrasRequest;
use App\Http\Requests\Admin\UpdateSolicitarAmostrasRequest;
use Yajra\DataTables\DataTables;

class SolicitarAmostrasController extends Controller
{
    /**
     * Display a listing of SolicitarAmostra.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('solicitar_amostra_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = SolicitarAmostra::query();
            $query->with("cd_especificacao");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('solicitar_amostra_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'solicitar_amostras.id',
                'solicitar_amostras.setor',
                'solicitar_amostras.data',
                'solicitar_amostras.equipamento',
                'solicitar_amostras.amostra',
                'solicitar_amostras.responsavel',
                'solicitar_amostras.referencia',
                'solicitar_amostras.alimentacao',
                'solicitar_amostras.od_producao',
                'solicitar_amostras.bag_pallet',
                'solicitar_amostras.peso',
                'solicitar_amostras.cd_especificacao_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'solicitar_amostra_';
                $routeKey = 'admin.solicitar_amostras';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('setor', function ($row) {
                return $row->setor ? $row->setor : '';
            });
            $table->editColumn('data', function ($row) {
                return $row->data ? $row->data : '';
            });
            $table->editColumn('equipamento', function ($row) {
                return $row->equipamento ? $row->equipamento : '';
            });
            $table->editColumn('amostra', function ($row) {
                return $row->amostra ? $row->amostra : '';
            });
            $table->editColumn('responsavel', function ($row) {
                return $row->responsavel ? $row->responsavel : '';
            });
            $table->editColumn('referencia', function ($row) {
                return $row->referencia ? $row->referencia : '';
            });
            $table->editColumn('alimentacao', function ($row) {
                return $row->alimentacao ? $row->alimentacao : '';
            });
            $table->editColumn('od_producao', function ($row) {
                return $row->od_producao ? $row->od_producao : '';
            });
            $table->editColumn('bag_pallet', function ($row) {
                return $row->bag_pallet ? $row->bag_pallet : '';
            });
            $table->editColumn('peso', function ($row) {
                return $row->peso ? $row->peso : '';
            });
            $table->editColumn('cd_especificacao.codigo', function ($row) {
                return $row->cd_especificacao ? $row->cd_especificacao->codigo : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.solicitar_amostras.index');
    }

    /**
     * Show the form for creating new SolicitarAmostra.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('solicitar_amostra_create')) {
            return abort(401);
        }
        
        $cd_especificacaos = \App\Especificacao::get()->pluck('codigo', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.solicitar_amostras.create', compact('cd_especificacaos'));
    }

    /**
     * Store a newly created SolicitarAmostra in storage.
     *
     * @param  \App\Http\Requests\StoreSolicitarAmostrasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSolicitarAmostrasRequest $request)
    {
        if (! Gate::allows('solicitar_amostra_create')) {
            return abort(401);
        }
        $solicitar_amostra = SolicitarAmostra::create($request->all());



        return redirect()->route('admin.solicitar_amostras.index');
    }


    /**
     * Show the form for editing SolicitarAmostra.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('solicitar_amostra_edit')) {
            return abort(401);
        }
        
        $cd_especificacaos = \App\Especificacao::get()->pluck('codigo', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $solicitar_amostra = SolicitarAmostra::findOrFail($id);

        return view('admin.solicitar_amostras.edit', compact('solicitar_amostra', 'cd_especificacaos'));
    }

    /**
     * Update SolicitarAmostra in storage.
     *
     * @param  \App\Http\Requests\UpdateSolicitarAmostrasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSolicitarAmostrasRequest $request, $id)
    {
        if (! Gate::allows('solicitar_amostra_edit')) {
            return abort(401);
        }
        $solicitar_amostra = SolicitarAmostra::findOrFail($id);
        $solicitar_amostra->update($request->all());



        return redirect()->route('admin.solicitar_amostras.index');
    }


    /**
     * Display SolicitarAmostra.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('solicitar_amostra_view')) {
            return abort(401);
        }
        
        $cd_especificacaos = \App\Especificacao::get()->pluck('codigo', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$analise_quimicas = \App\AnaliseQuimica::where('fk_solicitar_amostra_id', $id)->get();$analise_granulometricas = \App\AnaliseGranulometrica::where('fk_solicitar_amostrar_id', $id)->get();

        $solicitar_amostra = SolicitarAmostra::findOrFail($id);

        return view('admin.solicitar_amostras.show', compact('solicitar_amostra', 'analise_quimicas', 'analise_granulometricas'));
    }


    /**
     * Remove SolicitarAmostra from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('solicitar_amostra_delete')) {
            return abort(401);
        }
        $solicitar_amostra = SolicitarAmostra::findOrFail($id);
        $solicitar_amostra->delete();

        return redirect()->route('admin.solicitar_amostras.index');
    }

    /**
     * Delete all selected SolicitarAmostra at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('solicitar_amostra_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = SolicitarAmostra::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore SolicitarAmostra from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('solicitar_amostra_delete')) {
            return abort(401);
        }
        $solicitar_amostra = SolicitarAmostra::onlyTrashed()->findOrFail($id);
        $solicitar_amostra->restore();

        return redirect()->route('admin.solicitar_amostras.index');
    }

    /**
     * Permanently delete SolicitarAmostra from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('solicitar_amostra_delete')) {
            return abort(401);
        }
        $solicitar_amostra = SolicitarAmostra::onlyTrashed()->findOrFail($id);
        $solicitar_amostra->forceDelete();

        return redirect()->route('admin.solicitar_amostras.index');
    }
}
