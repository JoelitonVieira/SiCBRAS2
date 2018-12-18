<?php

namespace App\Http\Controllers\Admin;

use App\ResultadosQuimico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreResultadosQuimicosRequest;
use App\Http\Requests\Admin\UpdateResultadosQuimicosRequest;
use Yajra\DataTables\DataTables;

class ResultadosQuimicosController extends Controller
{
    /**
     * Display a listing of ResultadosQuimico.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('resultados_quimico_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = ResultadosQuimico::query();
            $query->with("n_analis");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('resultados_quimico_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'resultados_quimicos.id',
                'resultados_quimicos.data',
                'resultados_quimicos.op_forno',
                'resultados_quimicos.quantidade',
                'resultados_quimicos.numeracao',
                'resultados_quimicos.sic_flourizado',
                'resultados_quimicos.sic',
                'resultados_quimicos.ppc',
                'resultados_quimicos.c_reagido',
                'resultados_quimicos.si_reagido',
                'resultados_quimicos.si_livre',
                'resultados_quimicos.sio2',
                'resultados_quimicos.si_sio2',
                'resultados_quimicos.fe2o3',
                'resultados_quimicos.al2o3',
                'resultados_quimicos.cao',
                'resultados_quimicos.mgo',
                'resultados_quimicos.observa',
                'resultados_quimicos.status',
                'resultados_quimicos.n_analis_id',
                'resultados_quimicos.c_livgre',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'resultados_quimico_';
                $routeKey = 'admin.resultados_quimicos';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('data', function ($row) {
                return $row->data ? $row->data : '';
            });
            $table->editColumn('op_forno', function ($row) {
                return $row->op_forno ? $row->op_forno : '';
            });
            $table->editColumn('quantidade', function ($row) {
                return $row->quantidade ? $row->quantidade : '';
            });
            $table->editColumn('numeracao', function ($row) {
                return $row->numeracao ? $row->numeracao : '';
            });
            $table->editColumn('sic_flourizado', function ($row) {
                return $row->sic_flourizado ? $row->sic_flourizado : '';
            });
            $table->editColumn('sic', function ($row) {
                return $row->sic ? $row->sic : '';
            });
            $table->editColumn('ppc', function ($row) {
                return $row->ppc ? $row->ppc : '';
            });
            $table->editColumn('c_reagido', function ($row) {
                return $row->c_reagido ? $row->c_reagido : '';
            });
            $table->editColumn('si_reagido', function ($row) {
                return $row->si_reagido ? $row->si_reagido : '';
            });
            $table->editColumn('si_livre', function ($row) {
                return $row->si_livre ? $row->si_livre : '';
            });
            $table->editColumn('sio2', function ($row) {
                return $row->sio2 ? $row->sio2 : '';
            });
            $table->editColumn('si_sio2', function ($row) {
                return $row->si_sio2 ? $row->si_sio2 : '';
            });
            $table->editColumn('fe2o3', function ($row) {
                return $row->fe2o3 ? $row->fe2o3 : '';
            });
            $table->editColumn('al2o3', function ($row) {
                return $row->al2o3 ? $row->al2o3 : '';
            });
            $table->editColumn('cao', function ($row) {
                return $row->cao ? $row->cao : '';
            });
            $table->editColumn('mgo', function ($row) {
                return $row->mgo ? $row->mgo : '';
            });
            $table->editColumn('observa', function ($row) {
                return $row->observa ? $row->observa : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('n_analis.nu_analise', function ($row) {
                return $row->n_analis ? $row->n_analis->nu_analise : '';
            });
            $table->editColumn('c_livgre', function ($row) {
                return $row->c_livgre ? $row->c_livgre : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.resultados_quimicos.index');
    }

    /**
     * Show the form for creating new ResultadosQuimico.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('resultados_quimico_create')) {
            return abort(401);
        }
        
        $n_analis = \App\AnaliseQuimica::get()->pluck('nu_analise', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.resultados_quimicos.create', compact('n_analis'));
    }

    /**
     * Store a newly created ResultadosQuimico in storage.
     *
     * @param  \App\Http\Requests\StoreResultadosQuimicosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResultadosQuimicosRequest $request)
    {
        if (! Gate::allows('resultados_quimico_create')) {
            return abort(401);
        }
        $resultados_quimico = ResultadosQuimico::create($request->all());



        return redirect()->route('admin.resultados_quimicos.index');
    }


    /**
     * Show the form for editing ResultadosQuimico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('resultados_quimico_edit')) {
            return abort(401);
        }
        
        $n_analis = \App\AnaliseQuimica::get()->pluck('nu_analise', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $resultados_quimico = ResultadosQuimico::findOrFail($id);

        return view('admin.resultados_quimicos.edit', compact('resultados_quimico', 'n_analis'));
    }

    /**
     * Update ResultadosQuimico in storage.
     *
     * @param  \App\Http\Requests\UpdateResultadosQuimicosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResultadosQuimicosRequest $request, $id)
    {
        if (! Gate::allows('resultados_quimico_edit')) {
            return abort(401);
        }
        $resultados_quimico = ResultadosQuimico::findOrFail($id);
        $resultados_quimico->update($request->all());



        return redirect()->route('admin.resultados_quimicos.index');
    }


    /**
     * Display ResultadosQuimico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('resultados_quimico_view')) {
            return abort(401);
        }
        $resultados_quimico = ResultadosQuimico::findOrFail($id);

        return view('admin.resultados_quimicos.show', compact('resultados_quimico'));
    }


    /**
     * Remove ResultadosQuimico from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('resultados_quimico_delete')) {
            return abort(401);
        }
        $resultados_quimico = ResultadosQuimico::findOrFail($id);
        $resultados_quimico->delete();

        return redirect()->route('admin.resultados_quimicos.index');
    }

    /**
     * Delete all selected ResultadosQuimico at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('resultados_quimico_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = ResultadosQuimico::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore ResultadosQuimico from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('resultados_quimico_delete')) {
            return abort(401);
        }
        $resultados_quimico = ResultadosQuimico::onlyTrashed()->findOrFail($id);
        $resultados_quimico->restore();

        return redirect()->route('admin.resultados_quimicos.index');
    }

    /**
     * Permanently delete ResultadosQuimico from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('resultados_quimico_delete')) {
            return abort(401);
        }
        $resultados_quimico = ResultadosQuimico::onlyTrashed()->findOrFail($id);
        $resultados_quimico->forceDelete();

        return redirect()->route('admin.resultados_quimicos.index');
    }
}
