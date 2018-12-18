<?php

namespace App\Http\Controllers\Admin;

use App\GrafiteSaida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGrafiteSaidasRequest;
use App\Http\Requests\Admin\UpdateGrafiteSaidasRequest;
use Yajra\DataTables\DataTables;

class GrafiteSaidasController extends Controller
{
    /**
     * Display a listing of GrafiteSaida.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('grafite_saida_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = GrafiteSaida::query();
            $query->with("fornecedor");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('grafite_saida_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'grafite_saidas.id',
                'grafite_saidas.data',
                'grafite_saidas.nome_lider',
                'grafite_saidas.forno',
                'grafite_saidas.operacao',
                'grafite_saidas.saida',
                'grafite_saidas.umidade',
                'grafite_saidas.quantidade_real',
                'grafite_saidas.saida_acumulada',
                'grafite_saidas.observacoes',
                'grafite_saidas.quantidade_bags',
                'grafite_saidas.fornecedor_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'grafite_saida_';
                $routeKey = 'admin.grafite_saidas';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('data', function ($row) {
                return $row->data ? $row->data : '';
            });
            $table->editColumn('nome_lider', function ($row) {
                return $row->nome_lider ? $row->nome_lider : '';
            });
            $table->editColumn('forno', function ($row) {
                return $row->forno ? $row->forno : '';
            });
            $table->editColumn('operacao', function ($row) {
                return $row->operacao ? $row->operacao : '';
            });
            $table->editColumn('saida', function ($row) {
                return $row->saida ? $row->saida : '';
            });
            $table->editColumn('umidade', function ($row) {
                return $row->umidade ? $row->umidade : '';
            });
            $table->editColumn('quantidade_real', function ($row) {
                return $row->quantidade_real ? $row->quantidade_real : '';
            });
            $table->editColumn('saida_acumulada', function ($row) {
                return $row->saida_acumulada ? $row->saida_acumulada : '';
            });
            $table->editColumn('observacoes', function ($row) {
                return $row->observacoes ? $row->observacoes : '';
            });
            $table->editColumn('quantidade_bags', function ($row) {
                return $row->quantidade_bags ? $row->quantidade_bags : '';
            });
            $table->editColumn('fornecedor.nome_fantasia', function ($row) {
                return $row->fornecedor ? $row->fornecedor->nome_fantasia : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.grafite_saidas.index');
    }

    /**
     * Show the form for creating new GrafiteSaida.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('grafite_saida_create')) {
            return abort(401);
        }
        
        $fornecedors = \App\Fornecedor::get()->pluck('nome_fantasia', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.grafite_saidas.create', compact('fornecedors'));
    }

    /**
     * Store a newly created GrafiteSaida in storage.
     *
     * @param  \App\Http\Requests\StoreGrafiteSaidasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGrafiteSaidasRequest $request)
    {
        if (! Gate::allows('grafite_saida_create')) {
            return abort(401);
        }
        $grafite_saida = GrafiteSaida::create($request->all());



        return redirect()->route('admin.grafite_saidas.index');
    }


    /**
     * Show the form for editing GrafiteSaida.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('grafite_saida_edit')) {
            return abort(401);
        }
        
        $fornecedors = \App\Fornecedor::get()->pluck('nome_fantasia', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $grafite_saida = GrafiteSaida::findOrFail($id);

        return view('admin.grafite_saidas.edit', compact('grafite_saida', 'fornecedors'));
    }

    /**
     * Update GrafiteSaida in storage.
     *
     * @param  \App\Http\Requests\UpdateGrafiteSaidasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGrafiteSaidasRequest $request, $id)
    {
        if (! Gate::allows('grafite_saida_edit')) {
            return abort(401);
        }
        $grafite_saida = GrafiteSaida::findOrFail($id);
        $grafite_saida->update($request->all());



        return redirect()->route('admin.grafite_saidas.index');
    }


    /**
     * Display GrafiteSaida.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('grafite_saida_view')) {
            return abort(401);
        }
        $grafite_saida = GrafiteSaida::findOrFail($id);

        return view('admin.grafite_saidas.show', compact('grafite_saida'));
    }


    /**
     * Remove GrafiteSaida from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('grafite_saida_delete')) {
            return abort(401);
        }
        $grafite_saida = GrafiteSaida::findOrFail($id);
        $grafite_saida->delete();

        return redirect()->route('admin.grafite_saidas.index');
    }

    /**
     * Delete all selected GrafiteSaida at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('grafite_saida_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = GrafiteSaida::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore GrafiteSaida from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('grafite_saida_delete')) {
            return abort(401);
        }
        $grafite_saida = GrafiteSaida::onlyTrashed()->findOrFail($id);
        $grafite_saida->restore();

        return redirect()->route('admin.grafite_saidas.index');
    }

    /**
     * Permanently delete GrafiteSaida from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('grafite_saida_delete')) {
            return abort(401);
        }
        $grafite_saida = GrafiteSaida::onlyTrashed()->findOrFail($id);
        $grafite_saida->forceDelete();

        return redirect()->route('admin.grafite_saidas.index');
    }
}
