<?php

namespace App\Http\Controllers\Admin;

use App\EspecTreinamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEspecTreinamentosRequest;
use App\Http\Requests\Admin\UpdateEspecTreinamentosRequest;
use Yajra\DataTables\DataTables;

class EspecTreinamentosController extends Controller
{
    /**
     * Display a listing of EspecTreinamento.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('espec_treinamento_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = EspecTreinamento::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('espec_treinamento_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'espec_treinamentos.id',
                'espec_treinamentos.nome_espectreinamento',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'espec_treinamento_';
                $routeKey = 'admin.espec_treinamentos';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('nome_espectreinamento', function ($row) {
                return $row->nome_espectreinamento ? $row->nome_espectreinamento : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.espec_treinamentos.index');
    }

    /**
     * Show the form for creating new EspecTreinamento.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('espec_treinamento_create')) {
            return abort(401);
        }
        return view('admin.espec_treinamentos.create');
    }

    /**
     * Store a newly created EspecTreinamento in storage.
     *
     * @param  \App\Http\Requests\StoreEspecTreinamentosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEspecTreinamentosRequest $request)
    {
        if (! Gate::allows('espec_treinamento_create')) {
            return abort(401);
        }
        $espec_treinamento = EspecTreinamento::create($request->all());



        return redirect()->route('admin.espec_treinamentos.index');
    }


    /**
     * Show the form for editing EspecTreinamento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('espec_treinamento_edit')) {
            return abort(401);
        }
        $espec_treinamento = EspecTreinamento::findOrFail($id);

        return view('admin.espec_treinamentos.edit', compact('espec_treinamento'));
    }

    /**
     * Update EspecTreinamento in storage.
     *
     * @param  \App\Http\Requests\UpdateEspecTreinamentosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEspecTreinamentosRequest $request, $id)
    {
        if (! Gate::allows('espec_treinamento_edit')) {
            return abort(401);
        }
        $espec_treinamento = EspecTreinamento::findOrFail($id);
        $espec_treinamento->update($request->all());



        return redirect()->route('admin.espec_treinamentos.index');
    }


    /**
     * Display EspecTreinamento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('espec_treinamento_view')) {
            return abort(401);
        }
        $treinamentos = \App\Treinamento::where('espec_treinamento_id', $id)->get();

        $espec_treinamento = EspecTreinamento::findOrFail($id);

        return view('admin.espec_treinamentos.show', compact('espec_treinamento', 'treinamentos'));
    }


    /**
     * Remove EspecTreinamento from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('espec_treinamento_delete')) {
            return abort(401);
        }
        $espec_treinamento = EspecTreinamento::findOrFail($id);
        $espec_treinamento->delete();

        return redirect()->route('admin.espec_treinamentos.index');
    }

    /**
     * Delete all selected EspecTreinamento at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('espec_treinamento_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = EspecTreinamento::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore EspecTreinamento from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('espec_treinamento_delete')) {
            return abort(401);
        }
        $espec_treinamento = EspecTreinamento::onlyTrashed()->findOrFail($id);
        $espec_treinamento->restore();

        return redirect()->route('admin.espec_treinamentos.index');
    }

    /**
     * Permanently delete EspecTreinamento from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('espec_treinamento_delete')) {
            return abort(401);
        }
        $espec_treinamento = EspecTreinamento::onlyTrashed()->findOrFail($id);
        $espec_treinamento->forceDelete();

        return redirect()->route('admin.espec_treinamentos.index');
    }
}
