<?php

namespace App\Http\Controllers\Admin;

use App\Areium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAreiasRequest;
use App\Http\Requests\Admin\UpdateAreiasRequest;
use Yajra\DataTables\DataTables;

class AreiasController extends Controller
{
    /**
     * Display a listing of Areium.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('areium_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Areium::query();
            $query->with("fornecedor");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('areium_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'areias.id',
                'areias.data',
                'areias.fornecedor_id',
                'areias.num_nf',
                'areias.cte',
                'areias.peso_nf',
                'areias.peso_sicbras',
                'areias.diferenca',
                'areias.valor_prod',
                'areias.valor_frete',
                'areias.rs_areia',
                'areias.rs_frete',
                'areias.saldo_retirar',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'areium_';
                $routeKey = 'admin.areias';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('data', function ($row) {
                return $row->data ? $row->data : '';
            });
            $table->editColumn('fornecedor.nome_fantasia', function ($row) {
                return $row->fornecedor ? $row->fornecedor->nome_fantasia : '';
            });
            $table->editColumn('num_nf', function ($row) {
                return $row->num_nf ? $row->num_nf : '';
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
            $table->editColumn('valor_prod', function ($row) {
                return $row->valor_prod ? $row->valor_prod : '';
            });
            $table->editColumn('valor_frete', function ($row) {
                return $row->valor_frete ? $row->valor_frete : '';
            });
            $table->editColumn('rs_areia', function ($row) {
                return $row->rs_areia ? $row->rs_areia : '';
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

        return view('admin.areias.index');
    }

    /**
     * Show the form for creating new Areium.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('areium_create')) {
            return abort(401);
        }
        
        $fornecedors = \App\Fornecedor::get()->pluck('nome_fantasia', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.areias.create', compact('fornecedors'));
    }

    /**
     * Store a newly created Areium in storage.
     *
     * @param  \App\Http\Requests\StoreAreiasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAreiasRequest $request)
    {
        if (! Gate::allows('areium_create')) {
            return abort(401);
        }
        $areium = Areium::create($request->all());



        return redirect()->route('admin.areias.index');
    }


    /**
     * Show the form for editing Areium.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('areium_edit')) {
            return abort(401);
        }
        
        $fornecedors = \App\Fornecedor::get()->pluck('nome_fantasia', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $areium = Areium::findOrFail($id);

        return view('admin.areias.edit', compact('areium', 'fornecedors'));
    }

    /**
     * Update Areium in storage.
     *
     * @param  \App\Http\Requests\UpdateAreiasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAreiasRequest $request, $id)
    {
        if (! Gate::allows('areium_edit')) {
            return abort(401);
        }
        $areium = Areium::findOrFail($id);
        $areium->update($request->all());



        return redirect()->route('admin.areias.index');
    }


    /**
     * Display Areium.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('areium_view')) {
            return abort(401);
        }
        $areium = Areium::findOrFail($id);

        return view('admin.areias.show', compact('areium'));
    }


    /**
     * Remove Areium from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('areium_delete')) {
            return abort(401);
        }
        $areium = Areium::findOrFail($id);
        $areium->delete();

        return redirect()->route('admin.areias.index');
    }

    /**
     * Delete all selected Areium at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('areium_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Areium::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Areium from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('areium_delete')) {
            return abort(401);
        }
        $areium = Areium::onlyTrashed()->findOrFail($id);
        $areium->restore();

        return redirect()->route('admin.areias.index');
    }

    /**
     * Permanently delete Areium from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('areium_delete')) {
            return abort(401);
        }
        $areium = Areium::onlyTrashed()->findOrFail($id);
        $areium->forceDelete();

        return redirect()->route('admin.areias.index');
    }
}
