<?php

namespace App\Http\Controllers\Admin;

use App\AnaliseQuimica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAnaliseQuimicasRequest;
use App\Http\Requests\Admin\UpdateAnaliseQuimicasRequest;
use Yajra\DataTables\DataTables;

class AnaliseQuimicasController extends Controller
{
    /**
     * Display a listing of AnaliseQuimica.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('analise_quimica_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = AnaliseQuimica::query();
            $query->with("fk_solicitar_amostra");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('analise_quimica_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'analise_quimicas.id',
                'analise_quimicas.material',
                'analise_quimicas.nu_analise',
                'analise_quimicas.data',
                'analise_quimicas.fk_solicitar_amostra_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'analise_quimica_';
                $routeKey = 'admin.analise_quimicas';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('material', function ($row) {
                return $row->material ? $row->material : '';
            });
            $table->editColumn('nu_analise', function ($row) {
                return $row->nu_analise ? $row->nu_analise : '';
            });
            $table->editColumn('data', function ($row) {
                return $row->data ? $row->data : '';
            });
            $table->editColumn('fk_solicitar_amostra.od_producao', function ($row) {
                return $row->fk_solicitar_amostra ? $row->fk_solicitar_amostra->od_producao : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.analise_quimicas.index');
    }

    /**
     * Show the form for creating new AnaliseQuimica.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('analise_quimica_create')) {
            return abort(401);
        }
        
        $fk_solicitar_amostras = \App\SolicitarAmostra::get()->pluck('od_producao', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.analise_quimicas.create', compact('fk_solicitar_amostras'));
    }

    /**
     * Store a newly created AnaliseQuimica in storage.
     *
     * @param  \App\Http\Requests\StoreAnaliseQuimicasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnaliseQuimicasRequest $request)
    {
        if (! Gate::allows('analise_quimica_create')) {
            return abort(401);
        }
        $analise_quimica = AnaliseQuimica::create($request->all());

        foreach ($request->input('resultados_quimicos', []) as $data) {
            $analise_quimica->resultados_quimicos()->create($data);
        }


        return redirect()->route('admin.analise_quimicas.index');
    }


    /**
     * Show the form for editing AnaliseQuimica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('analise_quimica_edit')) {
            return abort(401);
        }
        
        $fk_solicitar_amostras = \App\SolicitarAmostra::get()->pluck('od_producao', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $analise_quimica = AnaliseQuimica::findOrFail($id);

        return view('admin.analise_quimicas.edit', compact('analise_quimica', 'fk_solicitar_amostras'));
    }

    /**
     * Update AnaliseQuimica in storage.
     *
     * @param  \App\Http\Requests\UpdateAnaliseQuimicasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnaliseQuimicasRequest $request, $id)
    {
        if (! Gate::allows('analise_quimica_edit')) {
            return abort(401);
        }
        $analise_quimica = AnaliseQuimica::findOrFail($id);
        $analise_quimica->update($request->all());

        $resultadosQuimicos           = $analise_quimica->resultados_quimicos;
        $currentResultadosQuimicoData = [];
        foreach ($request->input('resultados_quimicos', []) as $index => $data) {
            if (is_integer($index)) {
                $analise_quimica->resultados_quimicos()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentResultadosQuimicoData[$id] = $data;
            }
        }
        foreach ($resultadosQuimicos as $item) {
            if (isset($currentResultadosQuimicoData[$item->id])) {
                $item->update($currentResultadosQuimicoData[$item->id]);
            } else {
                $item->delete();
            }
        }


        return redirect()->route('admin.analise_quimicas.index');
    }


    /**
     * Display AnaliseQuimica.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('analise_quimica_view')) {
            return abort(401);
        }
        
        $fk_solicitar_amostras = \App\SolicitarAmostra::get()->pluck('od_producao', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$resultados_quimicos = \App\ResultadosQuimico::where('n_analis_id', $id)->get();

        $analise_quimica = AnaliseQuimica::findOrFail($id);

        return view('admin.analise_quimicas.show', compact('analise_quimica', 'resultados_quimicos'));
    }


    /**
     * Remove AnaliseQuimica from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('analise_quimica_delete')) {
            return abort(401);
        }
        $analise_quimica = AnaliseQuimica::findOrFail($id);
        $analise_quimica->delete();

        return redirect()->route('admin.analise_quimicas.index');
    }

    /**
     * Delete all selected AnaliseQuimica at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('analise_quimica_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = AnaliseQuimica::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore AnaliseQuimica from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('analise_quimica_delete')) {
            return abort(401);
        }
        $analise_quimica = AnaliseQuimica::onlyTrashed()->findOrFail($id);
        $analise_quimica->restore();

        return redirect()->route('admin.analise_quimicas.index');
    }

    /**
     * Permanently delete AnaliseQuimica from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('analise_quimica_delete')) {
            return abort(401);
        }
        $analise_quimica = AnaliseQuimica::onlyTrashed()->findOrFail($id);
        $analise_quimica->forceDelete();

        return redirect()->route('admin.analise_quimicas.index');
    }
}
