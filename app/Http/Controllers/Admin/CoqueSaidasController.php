<?php

namespace App\Http\Controllers\Admin;

use App\CoqueSaida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCoqueSaidasRequest;
use App\Http\Requests\Admin\UpdateCoqueSaidasRequest;
use Yajra\DataTables\DataTables;

class CoqueSaidasController extends Controller
{
    /**
     * Display a listing of CoqueSaida.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('coque_saida_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = CoqueSaida::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('coque_saida_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'coque_saidas.id',
                'coque_saidas.data',
                'coque_saidas.lider',
                'coque_saidas.forno',
                'coque_saidas.saida',
                'coque_saidas.saida_acumulada',
                'coque_saidas.observacao',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'coque_saida_';
                $routeKey = 'admin.coque_saidas';

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

        return view('admin.coque_saidas.index');
    }

    /**
     * Show the form for creating new CoqueSaida.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('coque_saida_create')) {
            return abort(401);
        }
        return view('admin.coque_saidas.create');
    }

    /**
     * Store a newly created CoqueSaida in storage.
     *
     * @param  \App\Http\Requests\StoreCoqueSaidasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCoqueSaidasRequest $request)
    {
        if (! Gate::allows('coque_saida_create')) {
            return abort(401);
        }
        $coque_saida = CoqueSaida::create($request->all());



        return redirect()->route('admin.coque_saidas.index');
    }


    /**
     * Show the form for editing CoqueSaida.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('coque_saida_edit')) {
            return abort(401);
        }
        $coque_saida = CoqueSaida::findOrFail($id);

        return view('admin.coque_saidas.edit', compact('coque_saida'));
    }

    /**
     * Update CoqueSaida in storage.
     *
     * @param  \App\Http\Requests\UpdateCoqueSaidasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoqueSaidasRequest $request, $id)
    {
        if (! Gate::allows('coque_saida_edit')) {
            return abort(401);
        }
        $coque_saida = CoqueSaida::findOrFail($id);
        $coque_saida->update($request->all());



        return redirect()->route('admin.coque_saidas.index');
    }


    /**
     * Display CoqueSaida.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('coque_saida_view')) {
            return abort(401);
        }
        $coque_saida = CoqueSaida::findOrFail($id);

        return view('admin.coque_saidas.show', compact('coque_saida'));
    }


    /**
     * Remove CoqueSaida from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('coque_saida_delete')) {
            return abort(401);
        }
        $coque_saida = CoqueSaida::findOrFail($id);
        $coque_saida->delete();

        return redirect()->route('admin.coque_saidas.index');
    }

    /**
     * Delete all selected CoqueSaida at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('coque_saida_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = CoqueSaida::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore CoqueSaida from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('coque_saida_delete')) {
            return abort(401);
        }
        $coque_saida = CoqueSaida::onlyTrashed()->findOrFail($id);
        $coque_saida->restore();

        return redirect()->route('admin.coque_saidas.index');
    }

    /**
     * Permanently delete CoqueSaida from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('coque_saida_delete')) {
            return abort(401);
        }
        $coque_saida = CoqueSaida::onlyTrashed()->findOrFail($id);
        $coque_saida->forceDelete();

        return redirect()->route('admin.coque_saidas.index');
    }
}
