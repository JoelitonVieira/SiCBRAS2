<?php

namespace App\Http\Controllers\Admin;

use App\SolicitacaoDeAnalise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSolicitacaoDeAnalisesRequest;
use App\Http\Requests\Admin\UpdateSolicitacaoDeAnalisesRequest;
use Yajra\DataTables\DataTables;

class SolicitacaoDeAnalisesController extends Controller
{
    /**
     * Display a listing of SolicitacaoDeAnalise.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('solicitacao_de_analise_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = SolicitacaoDeAnalise::query();
            $query->with("fornecedor");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('solicitacao_de_analise_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'solicitacao_de_analises.id',
                'solicitacao_de_analises.turnos',
                'solicitacao_de_analises.nome_resp_amostragem',
                'solicitacao_de_analises.mat_primas',
                'solicitacao_de_analises.lote_ano',
                'solicitacao_de_analises.tipos_graf',
                'solicitacao_de_analises.n_op',
                'solicitacao_de_analises.forno',
                'solicitacao_de_analises.fornecedor_id',
                'solicitacao_de_analises.origem',
                'solicitacao_de_analises.tipos_de_misturas',
                'solicitacao_de_analises.numero_operacao',
                'solicitacao_de_analises.fornos_das_misturas',
                'solicitacao_de_analises.amostra_teste',
                'solicitacao_de_analises.material',
                'solicitacao_de_analises.identificacao_da_amostra',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'solicitacao_de_analise_';
                $routeKey = 'admin.solicitacao_de_analises';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('turnos', function ($row) {
                return $row->turnos ? $row->turnos : '';
            });
            $table->editColumn('nome_resp_amostragem', function ($row) {
                return $row->nome_resp_amostragem ? $row->nome_resp_amostragem : '';
            });
            $table->editColumn('mat_primas', function ($row) {
                return $row->mat_primas ? $row->mat_primas : '';
            });
            $table->editColumn('lote_ano', function ($row) {
                return $row->lote_ano ? $row->lote_ano : '';
            });
            $table->editColumn('tipos_graf', function ($row) {
                return $row->tipos_graf ? $row->tipos_graf : '';
            });
            $table->editColumn('n_op', function ($row) {
                return $row->n_op ? $row->n_op : '';
            });
            $table->editColumn('forno', function ($row) {
                return $row->forno ? $row->forno : '';
            });
            $table->editColumn('fornecedor.nome_fantasia', function ($row) {
                return $row->fornecedor ? $row->fornecedor->nome_fantasia : '';
            });
            $table->editColumn('origem', function ($row) {
                return $row->origem ? $row->origem : '';
            });
            $table->editColumn('tipos_de_misturas', function ($row) {
                return $row->tipos_de_misturas ? $row->tipos_de_misturas : '';
            });
            $table->editColumn('numero_operacao', function ($row) {
                return $row->numero_operacao ? $row->numero_operacao : '';
            });
            $table->editColumn('fornos_das_misturas', function ($row) {
                return $row->fornos_das_misturas ? $row->fornos_das_misturas : '';
            });
            $table->editColumn('amostra_teste', function ($row) {
                return $row->amostra_teste ? $row->amostra_teste : '';
            });
            $table->editColumn('material', function ($row) {
                return $row->material ? $row->material : '';
            });
            $table->editColumn('identificacao_da_amostra', function ($row) {
                return $row->identificacao_da_amostra ? $row->identificacao_da_amostra : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.solicitacao_de_analises.index');
    }

    /**
     * Show the form for creating new SolicitacaoDeAnalise.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('solicitacao_de_analise_create')) {
            return abort(401);
        }
        
        $fornecedors = \App\Fornecedor::get()->pluck('nome_fantasia', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.solicitacao_de_analises.create', compact('fornecedors'));
    }

    /**
     * Store a newly created SolicitacaoDeAnalise in storage.
     *
     * @param  \App\Http\Requests\StoreSolicitacaoDeAnalisesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSolicitacaoDeAnalisesRequest $request)
    {
        if (! Gate::allows('solicitacao_de_analise_create')) {
            return abort(401);
        }
        $solicitacao_de_analise = SolicitacaoDeAnalise::create($request->all());



        return redirect()->route('admin.solicitacao_de_analises.index');
    }


    /**
     * Show the form for editing SolicitacaoDeAnalise.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('solicitacao_de_analise_edit')) {
            return abort(401);
        }
        
        $fornecedors = \App\Fornecedor::get()->pluck('nome_fantasia', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $solicitacao_de_analise = SolicitacaoDeAnalise::findOrFail($id);

        return view('admin.solicitacao_de_analises.edit', compact('solicitacao_de_analise', 'fornecedors'));
    }

    /**
     * Update SolicitacaoDeAnalise in storage.
     *
     * @param  \App\Http\Requests\UpdateSolicitacaoDeAnalisesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSolicitacaoDeAnalisesRequest $request, $id)
    {
        if (! Gate::allows('solicitacao_de_analise_edit')) {
            return abort(401);
        }
        $solicitacao_de_analise = SolicitacaoDeAnalise::findOrFail($id);
        $solicitacao_de_analise->update($request->all());



        return redirect()->route('admin.solicitacao_de_analises.index');
    }


    /**
     * Display SolicitacaoDeAnalise.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('solicitacao_de_analise_view')) {
            return abort(401);
        }
        $solicitacao_de_analise = SolicitacaoDeAnalise::findOrFail($id);

        return view('admin.solicitacao_de_analises.show', compact('solicitacao_de_analise'));
    }


    /**
     * Remove SolicitacaoDeAnalise from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('solicitacao_de_analise_delete')) {
            return abort(401);
        }
        $solicitacao_de_analise = SolicitacaoDeAnalise::findOrFail($id);
        $solicitacao_de_analise->delete();

        return redirect()->route('admin.solicitacao_de_analises.index');
    }

    /**
     * Delete all selected SolicitacaoDeAnalise at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('solicitacao_de_analise_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = SolicitacaoDeAnalise::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore SolicitacaoDeAnalise from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('solicitacao_de_analise_delete')) {
            return abort(401);
        }
        $solicitacao_de_analise = SolicitacaoDeAnalise::onlyTrashed()->findOrFail($id);
        $solicitacao_de_analise->restore();

        return redirect()->route('admin.solicitacao_de_analises.index');
    }

    /**
     * Permanently delete SolicitacaoDeAnalise from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('solicitacao_de_analise_delete')) {
            return abort(401);
        }
        $solicitacao_de_analise = SolicitacaoDeAnalise::onlyTrashed()->findOrFail($id);
        $solicitacao_de_analise->forceDelete();

        return redirect()->route('admin.solicitacao_de_analises.index');
    }
}
