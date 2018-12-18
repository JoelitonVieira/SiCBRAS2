<?php

namespace App\Http\Controllers\Admin;

use App\Fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFornecedorsRequest;
use App\Http\Requests\Admin\UpdateFornecedorsRequest;
use Yajra\DataTables\DataTables;

class FornecedorsController extends Controller
{
    /**
     * Display a listing of Fornecedor.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('fornecedor_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Fornecedor::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('fornecedor_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'fornecedors.id',
                'fornecedors.nome_fantasia',
                'fornecedors.matprima_fornecida',
                'fornecedors.telefone',
                'fornecedors.email',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'fornecedor_';
                $routeKey = 'admin.fornecedors';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('nome_fantasia', function ($row) {
                return $row->nome_fantasia ? $row->nome_fantasia : '';
            });
            $table->editColumn('matprima_fornecida', function ($row) {
                return $row->matprima_fornecida ? $row->matprima_fornecida : '';
            });
            $table->editColumn('telefone', function ($row) {
                return $row->telefone ? $row->telefone : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.fornecedors.index');
    }

    /**
     * Show the form for creating new Fornecedor.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('fornecedor_create')) {
            return abort(401);
        }
        return view('admin.fornecedors.create');
    }

    /**
     * Store a newly created Fornecedor in storage.
     *
     * @param  \App\Http\Requests\StoreFornecedorsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFornecedorsRequest $request)
    {
        if (! Gate::allows('fornecedor_create')) {
            return abort(401);
        }
        $fornecedor = Fornecedor::create($request->all());



        return redirect()->route('admin.fornecedors.index');
    }


    /**
     * Show the form for editing Fornecedor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('fornecedor_edit')) {
            return abort(401);
        }
        $fornecedor = Fornecedor::findOrFail($id);

        return view('admin.fornecedors.edit', compact('fornecedor'));
    }

    /**
     * Update Fornecedor in storage.
     *
     * @param  \App\Http\Requests\UpdateFornecedorsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFornecedorsRequest $request, $id)
    {
        if (! Gate::allows('fornecedor_edit')) {
            return abort(401);
        }
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->update($request->all());



        return redirect()->route('admin.fornecedors.index');
    }


    /**
     * Display Fornecedor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('fornecedor_view')) {
            return abort(401);
        }
        $areia = \App\Areium::where('fornecedor_id', $id)->get();$coques = \App\Coque::where('fornecedor_id', $id)->get();$grafites = \App\Grafite::where('fornecedor_id', $id)->get();$pasta_a_frio_ou_briquetes = \App\PastaAFrioOuBriquete::where('fornecedor_id', $id)->get();$solicitacao_de_analises = \App\SolicitacaoDeAnalise::where('fornecedor_id', $id)->get();$grafite_saidas = \App\GrafiteSaida::where('fornecedor_id', $id)->get();

        $fornecedor = Fornecedor::findOrFail($id);

        return view('admin.fornecedors.show', compact('fornecedor', 'areia', 'coques', 'grafites', 'pasta_a_frio_ou_briquetes', 'solicitacao_de_analises', 'grafite_saidas'));
    }


    /**
     * Remove Fornecedor from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('fornecedor_delete')) {
            return abort(401);
        }
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->delete();

        return redirect()->route('admin.fornecedors.index');
    }

    /**
     * Delete all selected Fornecedor at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('fornecedor_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Fornecedor::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Fornecedor from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('fornecedor_delete')) {
            return abort(401);
        }
        $fornecedor = Fornecedor::onlyTrashed()->findOrFail($id);
        $fornecedor->restore();

        return redirect()->route('admin.fornecedors.index');
    }

    /**
     * Permanently delete Fornecedor from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('fornecedor_delete')) {
            return abort(401);
        }
        $fornecedor = Fornecedor::onlyTrashed()->findOrFail($id);
        $fornecedor->forceDelete();

        return redirect()->route('admin.fornecedors.index');
    }
}
