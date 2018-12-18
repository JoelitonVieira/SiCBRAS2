<?php

namespace App\Http\Controllers\Admin;

use App\ResultadosFisico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreResultadosFisicosRequest;
use App\Http\Requests\Admin\UpdateResultadosFisicosRequest;
use Yajra\DataTables\DataTables;

class ResultadosFisicosController extends Controller
{
    /**
     * Display a listing of ResultadosFisico.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('resultados_fisico_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = ResultadosFisico::query();
            $query->with("nr_analise");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('resultados_fisico_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'resultados_fisicos.id',
                'resultados_fisicos.resultado_pesado',
                'resultados_fisicos.resultado_encontrado',
                'resultados_fisicos.nr_analise_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'resultados_fisico_';
                $routeKey = 'admin.resultados_fisicos';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('resultado_pesado', function ($row) {
                return $row->resultado_pesado ? $row->resultado_pesado : '';
            });
            $table->editColumn('resultado_encontrado', function ($row) {
                return $row->resultado_encontrado ? $row->resultado_encontrado : '';
            });
            $table->editColumn('nr_analise.resultados_penr', function ($row) {
                return $row->nr_analise ? $row->nr_analise->resultados_penr : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.resultados_fisicos.index');
    }

    /**
     * Show the form for creating new ResultadosFisico.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('resultados_fisico_create')) {
            return abort(401);
        }
        
        $nr_analises = \App\AnaliseGranulometrica::get()->pluck('resultados_penr', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.resultados_fisicos.create', compact('nr_analises'));
    }

    /**
     * Store a newly created ResultadosFisico in storage.
     *
     * @param  \App\Http\Requests\StoreResultadosFisicosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResultadosFisicosRequest $request)
    {
        if (! Gate::allows('resultados_fisico_create')) {
            return abort(401);
        }
        $resultados_fisico = ResultadosFisico::create($request->all());



        return redirect()->route('admin.resultados_fisicos.index');
    }


    /**
     * Show the form for editing ResultadosFisico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('resultados_fisico_edit')) {
            return abort(401);
        }
        
        $nr_analises = \App\AnaliseGranulometrica::get()->pluck('resultados_penr', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $resultados_fisico = ResultadosFisico::findOrFail($id);

        return view('admin.resultados_fisicos.edit', compact('resultados_fisico', 'nr_analises'));
    }

    /**
     * Update ResultadosFisico in storage.
     *
     * @param  \App\Http\Requests\UpdateResultadosFisicosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResultadosFisicosRequest $request, $id)
    {
        if (! Gate::allows('resultados_fisico_edit')) {
            return abort(401);
        }
        $resultados_fisico = ResultadosFisico::findOrFail($id);
        $resultados_fisico->update($request->all());



        return redirect()->route('admin.resultados_fisicos.index');
    }


    /**
     * Display ResultadosFisico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('resultados_fisico_view')) {
            return abort(401);
        }
        $resultados_fisico = ResultadosFisico::findOrFail($id);

        return view('admin.resultados_fisicos.show', compact('resultados_fisico'));
    }


    /**
     * Remove ResultadosFisico from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('resultados_fisico_delete')) {
            return abort(401);
        }
        $resultados_fisico = ResultadosFisico::findOrFail($id);
        $resultados_fisico->delete();

        return redirect()->route('admin.resultados_fisicos.index');
    }

    /**
     * Delete all selected ResultadosFisico at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('resultados_fisico_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ResultadosFisico::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore ResultadosFisico from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('resultados_fisico_delete')) {
            return abort(401);
        }
        $resultados_fisico = ResultadosFisico::onlyTrashed()->findOrFail($id);
        $resultados_fisico->restore();

        return redirect()->route('admin.resultados_fisicos.index');
    }

    /**
     * Permanently delete ResultadosFisico from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('resultados_fisico_delete')) {
            return abort(401);
        }
        $resultados_fisico = ResultadosFisico::onlyTrashed()->findOrFail($id);
        $resultados_fisico->forceDelete();

        return redirect()->route('admin.resultados_fisicos.index');
    }
}
