<?php

namespace App\Http\Controllers\Admin;

use App\Grafite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreGrafitesRequest;
use App\Http\Requests\Admin\UpdateGrafitesRequest;
use Yajra\DataTables\DataTables;

class GrafitesController extends Controller
{
    /**
     * Display a listing of Grafite.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('grafite_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Grafite::query();
            $query->with("fornecedor");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('grafite_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'grafites.id',
                'grafites.data',
                'grafites.nota_fiscal',
                'grafites.transportadora',
                'grafites.fornecedor_id',
                'grafites.forno',
                'grafites.operacao',
                'grafites.quantidade',
                'grafites.umidade',
                'grafites.quantidade_real',
                'grafites.entrada_acumulada',
                'grafites.observacoes',
                'grafites.quantidade_bags',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'grafite_';
                $routeKey = 'admin.grafites';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('data', function ($row) {
                return $row->data ? $row->data : '';
            });
            $table->editColumn('nota_fiscal', function ($row) {
                return $row->nota_fiscal ? $row->nota_fiscal : '';
            });
            $table->editColumn('transportadora', function ($row) {
                return $row->transportadora ? $row->transportadora : '';
            });
            $table->editColumn('fornecedor.nome_fantasia', function ($row) {
                return $row->fornecedor ? $row->fornecedor->nome_fantasia : '';
            });
            $table->editColumn('forno', function ($row) {
                return $row->forno ? $row->forno : '';
            });
            $table->editColumn('operacao', function ($row) {
                return $row->operacao ? $row->operacao : '';
            });
            $table->editColumn('quantidade', function ($row) {
                return $row->quantidade ? $row->quantidade : '';
            });
            $table->editColumn('umidade', function ($row) {
                return $row->umidade ? $row->umidade : '';
            });
            $table->editColumn('quantidade_real', function ($row) {
                return $row->quantidade_real ? $row->quantidade_real : '';
            });
            $table->editColumn('entrada_acumulada', function ($row) {
                return $row->entrada_acumulada ? $row->entrada_acumulada : '';
            });
            $table->editColumn('observacoes', function ($row) {
                return $row->observacoes ? $row->observacoes : '';
            });
            $table->editColumn('quantidade_bags', function ($row) {
                return $row->quantidade_bags ? $row->quantidade_bags : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.grafites.index');
    }

    /**
     * Show the form for creating new Grafite.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('grafite_create')) {
            return abort(401);
        }
        
        $fornecedors = \App\Fornecedor::get()->pluck('nome_fantasia', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.grafites.create', compact('fornecedors'));
    }

    /**
     * Store a newly created Grafite in storage.
     *
     * @param  \App\Http\Requests\StoreGrafitesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGrafitesRequest $request)
    {
        if (! Gate::allows('grafite_create')) {
            return abort(401);
        }
        $grafite = Grafite::create($request->all());



        return redirect()->route('admin.grafites.index');
    }


    /**
     * Show the form for editing Grafite.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('grafite_edit')) {
            return abort(401);
        }
        
        $fornecedors = \App\Fornecedor::get()->pluck('nome_fantasia', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $grafite = Grafite::findOrFail($id);

        return view('admin.grafites.edit', compact('grafite', 'fornecedors'));
    }

    /**
     * Update Grafite in storage.
     *
     * @param  \App\Http\Requests\UpdateGrafitesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGrafitesRequest $request, $id)
    {
        if (! Gate::allows('grafite_edit')) {
            return abort(401);
        }
        $grafite = Grafite::findOrFail($id);
        $grafite->update($request->all());



        return redirect()->route('admin.grafites.index');
    }


    /**
     * Display Grafite.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('grafite_view')) {
            return abort(401);
        }
        $grafite = Grafite::findOrFail($id);

        return view('admin.grafites.show', compact('grafite'));
    }


    /**
     * Remove Grafite from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('grafite_delete')) {
            return abort(401);
        }
        $grafite = Grafite::findOrFail($id);
        $grafite->delete();

        return redirect()->route('admin.grafites.index');
    }

    /**
     * Delete all selected Grafite at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('grafite_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Grafite::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Grafite from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('grafite_delete')) {
            return abort(401);
        }
        $grafite = Grafite::onlyTrashed()->findOrFail($id);
        $grafite->restore();

        return redirect()->route('admin.grafites.index');
    }

    /**
     * Permanently delete Grafite from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('grafite_delete')) {
            return abort(401);
        }
        $grafite = Grafite::onlyTrashed()->findOrFail($id);
        $grafite->forceDelete();

        return redirect()->route('admin.grafites.index');
    }
}
