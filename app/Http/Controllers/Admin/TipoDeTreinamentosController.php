<?php

namespace App\Http\Controllers\Admin;

use App\TipoDeTreinamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTipoDeTreinamentosRequest;
use App\Http\Requests\Admin\UpdateTipoDeTreinamentosRequest;
use Yajra\DataTables\DataTables;

class TipoDeTreinamentosController extends Controller
{
    /**
     * Display a listing of TipoDeTreinamento.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('tipo_de_treinamento_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = TipoDeTreinamento::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('tipo_de_treinamento_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'tipo_de_treinamentos.id',
                'tipo_de_treinamentos.nome_tipo_treinamento',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'tipo_de_treinamento_';
                $routeKey = 'admin.tipo_de_treinamentos';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('nome_tipo_treinamento', function ($row) {
                return $row->nome_tipo_treinamento ? $row->nome_tipo_treinamento : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.tipo_de_treinamentos.index');
    }

    /**
     * Show the form for creating new TipoDeTreinamento.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('tipo_de_treinamento_create')) {
            return abort(401);
        }
        return view('admin.tipo_de_treinamentos.create');
    }

    /**
     * Store a newly created TipoDeTreinamento in storage.
     *
     * @param  \App\Http\Requests\StoreTipoDeTreinamentosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoDeTreinamentosRequest $request)
    {
        if (! Gate::allows('tipo_de_treinamento_create')) {
            return abort(401);
        }
        $tipo_de_treinamento = TipoDeTreinamento::create($request->all());



        return redirect()->route('admin.tipo_de_treinamentos.index');
    }


    /**
     * Show the form for editing TipoDeTreinamento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('tipo_de_treinamento_edit')) {
            return abort(401);
        }
        $tipo_de_treinamento = TipoDeTreinamento::findOrFail($id);

        return view('admin.tipo_de_treinamentos.edit', compact('tipo_de_treinamento'));
    }

    /**
     * Update TipoDeTreinamento in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoDeTreinamentosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoDeTreinamentosRequest $request, $id)
    {
        if (! Gate::allows('tipo_de_treinamento_edit')) {
            return abort(401);
        }
        $tipo_de_treinamento = TipoDeTreinamento::findOrFail($id);
        $tipo_de_treinamento->update($request->all());



        return redirect()->route('admin.tipo_de_treinamentos.index');
    }


    /**
     * Display TipoDeTreinamento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('tipo_de_treinamento_view')) {
            return abort(401);
        }
        $treinamentos = \App\Treinamento::where('tipo_treinamento_id', $id)->get();

        $tipo_de_treinamento = TipoDeTreinamento::findOrFail($id);

        return view('admin.tipo_de_treinamentos.show', compact('tipo_de_treinamento', 'treinamentos'));
    }


    /**
     * Remove TipoDeTreinamento from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('tipo_de_treinamento_delete')) {
            return abort(401);
        }
        $tipo_de_treinamento = TipoDeTreinamento::findOrFail($id);
        $tipo_de_treinamento->delete();

        return redirect()->route('admin.tipo_de_treinamentos.index');
    }

    /**
     * Delete all selected TipoDeTreinamento at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('tipo_de_treinamento_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = TipoDeTreinamento::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore TipoDeTreinamento from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('tipo_de_treinamento_delete')) {
            return abort(401);
        }
        $tipo_de_treinamento = TipoDeTreinamento::onlyTrashed()->findOrFail($id);
        $tipo_de_treinamento->restore();

        return redirect()->route('admin.tipo_de_treinamentos.index');
    }

    /**
     * Permanently delete TipoDeTreinamento from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('tipo_de_treinamento_delete')) {
            return abort(401);
        }
        $tipo_de_treinamento = TipoDeTreinamento::onlyTrashed()->findOrFail($id);
        $tipo_de_treinamento->forceDelete();

        return redirect()->route('admin.tipo_de_treinamentos.index');
    }
}
