<?php

namespace App\Http\Controllers\Admin;

use App\PastaAFrioOuBriquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePastaAFrioOuBriquetesRequest;
use App\Http\Requests\Admin\UpdatePastaAFrioOuBriquetesRequest;
use Yajra\DataTables\DataTables;

class PastaAFrioOuBriquetesController extends Controller
{
    /**
     * Display a listing of PastaAFrioOuBriquete.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('pasta_a_frio_ou_briquete_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = PastaAFrioOuBriquete::query();
            $query->with("fornecedor");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('pasta_a_frio_ou_briquete_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'pasta_a_frio_ou_briquetes.id',
                'pasta_a_frio_ou_briquetes.materia_prima',
                'pasta_a_frio_ou_briquetes.data',
                'pasta_a_frio_ou_briquetes.num_nf',
                'pasta_a_frio_ou_briquetes.transportadora',
                'pasta_a_frio_ou_briquetes.fornecedor_id',
                'pasta_a_frio_ou_briquetes.quantidade',
                'pasta_a_frio_ou_briquetes.entrada_acumulada',
                'pasta_a_frio_ou_briquetes.observacoes',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'pasta_a_frio_ou_briquete_';
                $routeKey = 'admin.pasta_a_frio_ou_briquetes';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('materia_prima', function ($row) {
                return $row->materia_prima ? $row->materia_prima : '';
            });
            $table->editColumn('data', function ($row) {
                return $row->data ? $row->data : '';
            });
            $table->editColumn('num_nf', function ($row) {
                return $row->num_nf ? $row->num_nf : '';
            });
            $table->editColumn('transportadora', function ($row) {
                return $row->transportadora ? $row->transportadora : '';
            });
            $table->editColumn('fornecedor.nome_fantasia', function ($row) {
                return $row->fornecedor ? $row->fornecedor->nome_fantasia : '';
            });
            $table->editColumn('quantidade', function ($row) {
                return $row->quantidade ? $row->quantidade : '';
            });
            $table->editColumn('entrada_acumulada', function ($row) {
                return $row->entrada_acumulada ? $row->entrada_acumulada : '';
            });
            $table->editColumn('observacoes', function ($row) {
                return $row->observacoes ? $row->observacoes : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.pasta_a_frio_ou_briquetes.index');
    }

    /**
     * Show the form for creating new PastaAFrioOuBriquete.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('pasta_a_frio_ou_briquete_create')) {
            return abort(401);
        }
        
        $fornecedors = \App\Fornecedor::get()->pluck('nome_fantasia', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.pasta_a_frio_ou_briquetes.create', compact('fornecedors'));
    }

    /**
     * Store a newly created PastaAFrioOuBriquete in storage.
     *
     * @param  \App\Http\Requests\StorePastaAFrioOuBriquetesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePastaAFrioOuBriquetesRequest $request)
    {
        if (! Gate::allows('pasta_a_frio_ou_briquete_create')) {
            return abort(401);
        }
        $pasta_a_frio_ou_briquete = PastaAFrioOuBriquete::create($request->all());



        return redirect()->route('admin.pasta_a_frio_ou_briquetes.index');
    }


    /**
     * Show the form for editing PastaAFrioOuBriquete.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('pasta_a_frio_ou_briquete_edit')) {
            return abort(401);
        }
        
        $fornecedors = \App\Fornecedor::get()->pluck('nome_fantasia', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $pasta_a_frio_ou_briquete = PastaAFrioOuBriquete::findOrFail($id);

        return view('admin.pasta_a_frio_ou_briquetes.edit', compact('pasta_a_frio_ou_briquete', 'fornecedors'));
    }

    /**
     * Update PastaAFrioOuBriquete in storage.
     *
     * @param  \App\Http\Requests\UpdatePastaAFrioOuBriquetesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePastaAFrioOuBriquetesRequest $request, $id)
    {
        if (! Gate::allows('pasta_a_frio_ou_briquete_edit')) {
            return abort(401);
        }
        $pasta_a_frio_ou_briquete = PastaAFrioOuBriquete::findOrFail($id);
        $pasta_a_frio_ou_briquete->update($request->all());



        return redirect()->route('admin.pasta_a_frio_ou_briquetes.index');
    }


    /**
     * Display PastaAFrioOuBriquete.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('pasta_a_frio_ou_briquete_view')) {
            return abort(401);
        }
        $pasta_a_frio_ou_briquete = PastaAFrioOuBriquete::findOrFail($id);

        return view('admin.pasta_a_frio_ou_briquetes.show', compact('pasta_a_frio_ou_briquete'));
    }


    /**
     * Remove PastaAFrioOuBriquete from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('pasta_a_frio_ou_briquete_delete')) {
            return abort(401);
        }
        $pasta_a_frio_ou_briquete = PastaAFrioOuBriquete::findOrFail($id);
        $pasta_a_frio_ou_briquete->delete();

        return redirect()->route('admin.pasta_a_frio_ou_briquetes.index');
    }

    /**
     * Delete all selected PastaAFrioOuBriquete at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('pasta_a_frio_ou_briquete_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = PastaAFrioOuBriquete::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore PastaAFrioOuBriquete from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('pasta_a_frio_ou_briquete_delete')) {
            return abort(401);
        }
        $pasta_a_frio_ou_briquete = PastaAFrioOuBriquete::onlyTrashed()->findOrFail($id);
        $pasta_a_frio_ou_briquete->restore();

        return redirect()->route('admin.pasta_a_frio_ou_briquetes.index');
    }

    /**
     * Permanently delete PastaAFrioOuBriquete from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('pasta_a_frio_ou_briquete_delete')) {
            return abort(401);
        }
        $pasta_a_frio_ou_briquete = PastaAFrioOuBriquete::onlyTrashed()->findOrFail($id);
        $pasta_a_frio_ou_briquete->forceDelete();

        return redirect()->route('admin.pasta_a_frio_ou_briquetes.index');
    }
}
