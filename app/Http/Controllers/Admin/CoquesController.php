<?php

namespace App\Http\Controllers\Admin;

use App\Coque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCoquesRequest;
use App\Http\Requests\Admin\UpdateCoquesRequest;
use Yajra\DataTables\DataTables;

class CoquesController extends Controller
{
    /**
     * Display a listing of Coque.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('coque_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Coque::query();
            $query->with("fornecedor");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('coque_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'coques.id',
                'coques.data_recebimento',
                'coques.data_expedicao',
                'coques.transportadora',
                'coques.fornecedor_id',
                'coques.nota_fiscal',
                'coques.cte',
                'coques.peso_nf',
                'coques.peso_sicbras',
                'coques.diferenca',
                'coques.rs_acordo',
                'coques.cambio',
                'coques.dolar_acordo',
                'coques.valor_nota',
                'coques.rs_real_imposto',
                'coques.icms',
                'coques.pis_confins',
                'coques.ipi',
                'coques.encargo_30',
                'coques.rs_real_semimposto',
                'coques.dolar_sem_imposto',
                'coques.valor_frete',
                'coques.rs_frete',
                'coques.saldo_retirar',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'coque_';
                $routeKey = 'admin.coques';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('data_recebimento', function ($row) {
                return $row->data_recebimento ? $row->data_recebimento : '';
            });
            $table->editColumn('data_expedicao', function ($row) {
                return $row->data_expedicao ? $row->data_expedicao : '';
            });
            $table->editColumn('transportadora', function ($row) {
                return $row->transportadora ? $row->transportadora : '';
            });
            $table->editColumn('fornecedor.nome_fantasia', function ($row) {
                return $row->fornecedor ? $row->fornecedor->nome_fantasia : '';
            });
            $table->editColumn('nota_fiscal', function ($row) {
                return $row->nota_fiscal ? $row->nota_fiscal : '';
            });
            $table->editColumn('cte', function ($row) {
                return $row->cte ? $row->cte : '';
            });
            $table->editColumn('peso_nf', function ($row) {
                return $row->peso_nf ? $row->peso_nf : '';
            });
            $table->editColumn('peso_sicbras', function ($row) {
                return $row->peso_sicbras ? $row->peso_sicbras : '';
            });
            $table->editColumn('diferenca', function ($row) {
                return $row->diferenca ? $row->diferenca : '';
            });
            $table->editColumn('rs_acordo', function ($row) {
                return $row->rs_acordo ? $row->rs_acordo : '';
            });
            $table->editColumn('cambio', function ($row) {
                return $row->cambio ? $row->cambio : '';
            });
            $table->editColumn('dolar_acordo', function ($row) {
                return $row->dolar_acordo ? $row->dolar_acordo : '';
            });
            $table->editColumn('valor_nota', function ($row) {
                return $row->valor_nota ? $row->valor_nota : '';
            });
            $table->editColumn('rs_real_imposto', function ($row) {
                return $row->rs_real_imposto ? $row->rs_real_imposto : '';
            });
            $table->editColumn('icms', function ($row) {
                return $row->icms ? $row->icms : '';
            });
            $table->editColumn('pis_confins', function ($row) {
                return $row->pis_confins ? $row->pis_confins : '';
            });
            $table->editColumn('ipi', function ($row) {
                return $row->ipi ? $row->ipi : '';
            });
            $table->editColumn('encargo_30', function ($row) {
                return $row->encargo_30 ? $row->encargo_30 : '';
            });
            $table->editColumn('rs_real_semimposto', function ($row) {
                return $row->rs_real_semimposto ? $row->rs_real_semimposto : '';
            });
            $table->editColumn('dolar_sem_imposto', function ($row) {
                return $row->dolar_sem_imposto ? $row->dolar_sem_imposto : '';
            });
            $table->editColumn('valor_frete', function ($row) {
                return $row->valor_frete ? $row->valor_frete : '';
            });
            $table->editColumn('rs_frete', function ($row) {
                return $row->rs_frete ? $row->rs_frete : '';
            });
            $table->editColumn('saldo_retirar', function ($row) {
                return $row->saldo_retirar ? $row->saldo_retirar : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.coques.index');
    }

    /**
     * Show the form for creating new Coque.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('coque_create')) {
            return abort(401);
        }
        
        $fornecedors = \App\Fornecedor::get()->pluck('nome_fantasia', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.coques.create', compact('fornecedors'));
    }

    /**
     * Store a newly created Coque in storage.
     *
     * @param  \App\Http\Requests\StoreCoquesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoquesRequest $request)
    {
        if (! Gate::allows('coque_create')) {
            return abort(401);
        }
        $coque = Coque::create($request->all());



        return redirect()->route('admin.coques.index');
    }


    /**
     * Show the form for editing Coque.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('coque_edit')) {
            return abort(401);
        }
        
        $fornecedors = \App\Fornecedor::get()->pluck('nome_fantasia', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $coque = Coque::findOrFail($id);

        return view('admin.coques.edit', compact('coque', 'fornecedors'));
    }

    /**
     * Update Coque in storage.
     *
     * @param  \App\Http\Requests\UpdateCoquesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoquesRequest $request, $id)
    {
        if (! Gate::allows('coque_edit')) {
            return abort(401);
        }
        $coque = Coque::findOrFail($id);
        $coque->update($request->all());



        return redirect()->route('admin.coques.index');
    }


    /**
     * Display Coque.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('coque_view')) {
            return abort(401);
        }
        $coque = Coque::findOrFail($id);

        return view('admin.coques.show', compact('coque'));
    }


    /**
     * Remove Coque from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('coque_delete')) {
            return abort(401);
        }
        $coque = Coque::findOrFail($id);
        $coque->delete();

        return redirect()->route('admin.coques.index');
    }

    /**
     * Delete all selected Coque at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('coque_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Coque::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Coque from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('coque_delete')) {
            return abort(401);
        }
        $coque = Coque::onlyTrashed()->findOrFail($id);
        $coque->restore();

        return redirect()->route('admin.coques.index');
    }

    /**
     * Permanently delete Coque from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('coque_delete')) {
            return abort(401);
        }
        $coque = Coque::onlyTrashed()->findOrFail($id);
        $coque->forceDelete();

        return redirect()->route('admin.coques.index');
    }
}
