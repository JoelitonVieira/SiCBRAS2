<?php

namespace App\Http\Controllers\Admin;

use App\AnaliseGranulometrica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAnaliseGranulometricasRequest;
use App\Http\Requests\Admin\UpdateAnaliseGranulometricasRequest;
use Yajra\DataTables\DataTables;

class AnaliseGranulometricasController extends Controller
{
    /**
     * Display a listing of AnaliseGranulometrica.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('analise_granulometrica_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = AnaliseGranulometrica::query();
            $query->with("fk_solicitar_amostrar");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('analise_granulometrica_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'analise_granulometricas.id',
                'analise_granulometricas.resultados_penr',
                'analise_granulometricas.data',
                'analise_granulometricas.status',
                'analise_granulometricas.destino_address',
                'analise_granulometricas.fk_solicitar_amostrar_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'analise_granulometrica_';
                $routeKey = 'admin.analise_granulometricas';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('resultados_penr', function ($row) {
                return $row->resultados_penr ? $row->resultados_penr : '';
            });
            $table->editColumn('data', function ($row) {
                return $row->data ? $row->data : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('destino', function ($row) {
                return $row->destino ? $row->destino : '';
            });
            $table->editColumn('fk_solicitar_amostrar.od_producao', function ($row) {
                return $row->fk_solicitar_amostrar ? $row->fk_solicitar_amostrar->od_producao : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.analise_granulometricas.index');
    }

    /**
     * Show the form for creating new AnaliseGranulometrica.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('analise_granulometrica_create')) {
            return abort(401);
        }
        
        $fk_solicitar_amostrars = \App\SolicitarAmostra::get()->pluck('od_producao', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.analise_granulometricas.create', compact('fk_solicitar_amostrars'));
    }

    /**
     * Store a newly created AnaliseGranulometrica in storage.
     *
     * @param  \App\Http\Requests\StoreAnaliseGranulometricasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnaliseGranulometricasRequest $request)
    {
        if (! Gate::allows('analise_granulometrica_create')) {
            return abort(401);
        }
        $analise_granulometrica = AnaliseGranulometrica::create($request->all());

        foreach ($request->input('resultados_fisicos', []) as $data) {
            $analise_granulometrica->resultados_fisicos()->create($data);
        }


        return redirect()->route('admin.analise_granulometricas.index');
    }


    /**
     * Show the form for editing AnaliseGranulometrica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('analise_granulometrica_edit')) {
            return abort(401);
        }
        
        $fk_solicitar_amostrars = \App\SolicitarAmostra::get()->pluck('od_producao', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $analise_granulometrica = AnaliseGranulometrica::findOrFail($id);

        return view('admin.analise_granulometricas.edit', compact('analise_granulometrica', 'fk_solicitar_amostrars'));
    }

    /**
     * Update AnaliseGranulometrica in storage.
     *
     * @param  \App\Http\Requests\UpdateAnaliseGranulometricasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnaliseGranulometricasRequest $request, $id)
    {
        if (! Gate::allows('analise_granulometrica_edit')) {
            return abort(401);
        }
        $analise_granulometrica = AnaliseGranulometrica::findOrFail($id);
        $analise_granulometrica->update($request->all());

        $resultadosFisicos           = $analise_granulometrica->resultados_fisicos;
        $currentResultadosFisicoData = [];
        foreach ($request->input('resultados_fisicos', []) as $index => $data) {
            if (is_integer($index)) {
                $analise_granulometrica->resultados_fisicos()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentResultadosFisicoData[$id] = $data;
            }
        }
        foreach ($resultadosFisicos as $item) {
            if (isset($currentResultadosFisicoData[$item->id])) {
                $item->update($currentResultadosFisicoData[$item->id]);
            } else {
                $item->delete();
            }
        }


        return redirect()->route('admin.analise_granulometricas.index');
    }


    /**
     * Display AnaliseGranulometrica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('analise_granulometrica_view')) {
            return abort(401);
        }
        
        $fk_solicitar_amostrars = \App\SolicitarAmostra::get()->pluck('od_producao', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$resultados_fisicos = \App\ResultadosFisico::where('nr_analise_id', $id)->get();

        $analise_granulometrica = AnaliseGranulometrica::findOrFail($id);

        return view('admin.analise_granulometricas.show', compact('analise_granulometrica', 'resultados_fisicos'));
    }


    /**
     * Remove AnaliseGranulometrica from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('analise_granulometrica_delete')) {
            return abort(401);
        }
        $analise_granulometrica = AnaliseGranulometrica::findOrFail($id);
        $analise_granulometrica->delete();

        return redirect()->route('admin.analise_granulometricas.index');
    }

    /**
     * Delete all selected AnaliseGranulometrica at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('analise_granulometrica_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = AnaliseGranulometrica::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore AnaliseGranulometrica from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('analise_granulometrica_delete')) {
            return abort(401);
        }
        $analise_granulometrica = AnaliseGranulometrica::onlyTrashed()->findOrFail($id);
        $analise_granulometrica->restore();

        return redirect()->route('admin.analise_granulometricas.index');
    }

    /**
     * Permanently delete AnaliseGranulometrica from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('analise_granulometrica_delete')) {
            return abort(401);
        }
        $analise_granulometrica = AnaliseGranulometrica::onlyTrashed()->findOrFail($id);
        $analise_granulometrica->forceDelete();

        return redirect()->route('admin.analise_granulometricas.index');
    }
}
