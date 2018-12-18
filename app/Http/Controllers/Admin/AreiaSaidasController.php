<?php

namespace App\Http\Controllers\Admin;

use App\AreiaSaida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAreiaSaidasRequest;
use App\Http\Requests\Admin\UpdateAreiaSaidasRequest;
use Yajra\DataTables\DataTables;

class AreiaSaidasController extends Controller
{
    /**
     * Display a listing of AreiaSaida.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('areia_saida_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = AreiaSaida::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('areia_saida_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'areia_saidas.id',
                'areia_saidas.data',
                'areia_saidas.lider',
                'areia_saidas.forno',
                'areia_saidas.saida',
                'areia_saidas.saida_acumulada',
                'areia_saidas.observacao',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'areia_saida_';
                $routeKey = 'admin.areia_saidas';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('data', function ($row) {
                return $row->data ? $row->data : '';
            });
            $table->editColumn('lider', function ($row) {
                return $row->lider ? $row->lider : '';
            });
            $table->editColumn('forno', function ($row) {
                return $row->forno ? $row->forno : '';
            });
            $table->editColumn('saida', function ($row) {
                return $row->saida ? $row->saida : '';
            });
            $table->editColumn('saida_acumulada', function ($row) {
                return $row->saida_acumulada ? $row->saida_acumulada : '';
            });
            $table->editColumn('observacao', function ($row) {
                return $row->observacao ? $row->observacao : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.areia_saidas.index');
    }

    /**
     * Show the form for creating new AreiaSaida.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('areia_saida_create')) {
            return abort(401);
        }
        return view('admin.areia_saidas.create');
    }

    /**
     * Store a newly created AreiaSaida in storage.
     *
     * @param  \App\Http\Requests\StoreAreiaSaidasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAreiaSaidasRequest $request)
    {
        if (! Gate::allows('areia_saida_create')) {
            return abort(401);
        }
        $areia_saida = AreiaSaida::create($request->all());



        return redirect()->route('admin.areia_saidas.index');
    }


    /**
     * Show the form for editing AreiaSaida.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('areia_saida_edit')) {
            return abort(401);
        }
        $areia_saida = AreiaSaida::findOrFail($id);

        return view('admin.areia_saidas.edit', compact('areia_saida'));
    }

    /**
     * Update AreiaSaida in storage.
     *
     * @param  \App\Http\Requests\UpdateAreiaSaidasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAreiaSaidasRequest $request, $id)
    {
        if (! Gate::allows('areia_saida_edit')) {
            return abort(401);
        }
        $areia_saida = AreiaSaida::findOrFail($id);
        $areia_saida->update($request->all());



        return redirect()->route('admin.areia_saidas.index');
    }


    /**
     * Display AreiaSaida.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('areia_saida_view')) {
            return abort(401);
        }
        $areia_saida = AreiaSaida::findOrFail($id);

        return view('admin.areia_saidas.show', compact('areia_saida'));
    }


    /**
     * Remove AreiaSaida from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('areia_saida_delete')) {
            return abort(401);
        }
        $areia_saida = AreiaSaida::findOrFail($id);
        $areia_saida->delete();

        return redirect()->route('admin.areia_saidas.index');
    }

    /**
     * Delete all selected AreiaSaida at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('areia_saida_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = AreiaSaida::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore AreiaSaida from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('areia_saida_delete')) {
            return abort(401);
        }
        $areia_saida = AreiaSaida::onlyTrashed()->findOrFail($id);
        $areia_saida->restore();

        return redirect()->route('admin.areia_saidas.index');
    }

    /**
     * Permanently delete AreiaSaida from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('areia_saida_delete')) {
            return abort(401);
        }
        $areia_saida = AreiaSaida::onlyTrashed()->findOrFail($id);
        $areia_saida->forceDelete();

        return redirect()->route('admin.areia_saidas.index');
    }
}
