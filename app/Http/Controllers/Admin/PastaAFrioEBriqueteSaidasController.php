<?php

namespace App\Http\Controllers\Admin;

use App\PastaAFrioEBriqueteSaida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePastaAFrioEBriqueteSaidasRequest;
use App\Http\Requests\Admin\UpdatePastaAFrioEBriqueteSaidasRequest;
use Yajra\DataTables\DataTables;

class PastaAFrioEBriqueteSaidasController extends Controller
{
    /**
     * Display a listing of PastaAFrioEBriqueteSaida.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('pasta_a_frio_e_briquete_saida_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = PastaAFrioEBriqueteSaida::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('pasta_a_frio_e_briquete_saida_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'pasta_a_frio_e_briquete_saidas.id',
                'pasta_a_frio_e_briquete_saidas.materia_prima',
                'pasta_a_frio_e_briquete_saidas.data',
                'pasta_a_frio_e_briquete_saidas.lider_saida',
                'pasta_a_frio_e_briquete_saidas.forno_saida',
                'pasta_a_frio_e_briquete_saidas.operacao',
                'pasta_a_frio_e_briquete_saidas.saida',
                'pasta_a_frio_e_briquete_saidas.saida_acumulada',
                'pasta_a_frio_e_briquete_saidas.observacoes',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'pasta_a_frio_e_briquete_saida_';
                $routeKey = 'admin.pasta_a_frio_e_briquete_saidas';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('materia_prima', function ($row) {
                return $row->materia_prima ? $row->materia_prima : '';
            });
            $table->editColumn('data', function ($row) {
                return $row->data ? $row->data : '';
            });
            $table->editColumn('lider_saida', function ($row) {
                return $row->lider_saida ? $row->lider_saida : '';
            });
            $table->editColumn('forno_saida', function ($row) {
                return $row->forno_saida ? $row->forno_saida : '';
            });
            $table->editColumn('operacao', function ($row) {
                return $row->operacao ? $row->operacao : '';
            });
            $table->editColumn('saida', function ($row) {
                return $row->saida ? $row->saida : '';
            });
            $table->editColumn('saida_acumulada', function ($row) {
                return $row->saida_acumulada ? $row->saida_acumulada : '';
            });
            $table->editColumn('observacoes', function ($row) {
                return $row->observacoes ? $row->observacoes : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.pasta_a_frio_e_briquete_saidas.index');
    }

    /**
     * Show the form for creating new PastaAFrioEBriqueteSaida.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('pasta_a_frio_e_briquete_saida_create')) {
            return abort(401);
        }
        return view('admin.pasta_a_frio_e_briquete_saidas.create');
    }

    /**
     * Store a newly created PastaAFrioEBriqueteSaida in storage.
     *
     * @param  \App\Http\Requests\StorePastaAFrioEBriqueteSaidasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePastaAFrioEBriqueteSaidasRequest $request)
    {
        if (! Gate::allows('pasta_a_frio_e_briquete_saida_create')) {
            return abort(401);
        }
        $pasta_a_frio_e_briquete_saida = PastaAFrioEBriqueteSaida::create($request->all());



        return redirect()->route('admin.pasta_a_frio_e_briquete_saidas.index');
    }


    /**
     * Show the form for editing PastaAFrioEBriqueteSaida.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('pasta_a_frio_e_briquete_saida_edit')) {
            return abort(401);
        }
        $pasta_a_frio_e_briquete_saida = PastaAFrioEBriqueteSaida::findOrFail($id);

        return view('admin.pasta_a_frio_e_briquete_saidas.edit', compact('pasta_a_frio_e_briquete_saida'));
    }

    /**
     * Update PastaAFrioEBriqueteSaida in storage.
     *
     * @param  \App\Http\Requests\UpdatePastaAFrioEBriqueteSaidasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePastaAFrioEBriqueteSaidasRequest $request, $id)
    {
        if (! Gate::allows('pasta_a_frio_e_briquete_saida_edit')) {
            return abort(401);
        }
        $pasta_a_frio_e_briquete_saida = PastaAFrioEBriqueteSaida::findOrFail($id);
        $pasta_a_frio_e_briquete_saida->update($request->all());



        return redirect()->route('admin.pasta_a_frio_e_briquete_saidas.index');
    }


    /**
     * Display PastaAFrioEBriqueteSaida.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('pasta_a_frio_e_briquete_saida_view')) {
            return abort(401);
        }
        $pasta_a_frio_e_briquete_saida = PastaAFrioEBriqueteSaida::findOrFail($id);

        return view('admin.pasta_a_frio_e_briquete_saidas.show', compact('pasta_a_frio_e_briquete_saida'));
    }


    /**
     * Remove PastaAFrioEBriqueteSaida from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('pasta_a_frio_e_briquete_saida_delete')) {
            return abort(401);
        }
        $pasta_a_frio_e_briquete_saida = PastaAFrioEBriqueteSaida::findOrFail($id);
        $pasta_a_frio_e_briquete_saida->delete();

        return redirect()->route('admin.pasta_a_frio_e_briquete_saidas.index');
    }

    /**
     * Delete all selected PastaAFrioEBriqueteSaida at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('pasta_a_frio_e_briquete_saida_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = PastaAFrioEBriqueteSaida::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore PastaAFrioEBriqueteSaida from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('pasta_a_frio_e_briquete_saida_delete')) {
            return abort(401);
        }
        $pasta_a_frio_e_briquete_saida = PastaAFrioEBriqueteSaida::onlyTrashed()->findOrFail($id);
        $pasta_a_frio_e_briquete_saida->restore();

        return redirect()->route('admin.pasta_a_frio_e_briquete_saidas.index');
    }

    /**
     * Permanently delete PastaAFrioEBriqueteSaida from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('pasta_a_frio_e_briquete_saida_delete')) {
            return abort(401);
        }
        $pasta_a_frio_e_briquete_saida = PastaAFrioEBriqueteSaida::onlyTrashed()->findOrFail($id);
        $pasta_a_frio_e_briquete_saida->forceDelete();

        return redirect()->route('admin.pasta_a_frio_e_briquete_saidas.index');
    }
}
