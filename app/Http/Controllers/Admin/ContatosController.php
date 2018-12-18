<?php

namespace App\Http\Controllers\Admin;

use App\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreContatosRequest;
use App\Http\Requests\Admin\UpdateContatosRequest;
use Yajra\DataTables\DataTables;

class ContatosController extends Controller
{
    /**
     * Display a listing of Contato.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('contato_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Contato::query();
            $query->with("nome_cliente");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('contato_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'contatos.id',
                'contatos.telefone_2',
                'contatos.email_2',
                'contatos.nome_cliente_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'contato_';
                $routeKey = 'admin.contatos';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('telefone_2', function ($row) {
                return $row->telefone_2 ? $row->telefone_2 : '';
            });
            $table->editColumn('email_2', function ($row) {
                return $row->email_2 ? $row->email_2 : '';
            });
            $table->editColumn('nome_cliente.nome_cliente', function ($row) {
                return $row->nome_cliente ? $row->nome_cliente->nome_cliente : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.contatos.index');
    }

    /**
     * Show the form for creating new Contato.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('contato_create')) {
            return abort(401);
        }
        
        $nome_clientes = \App\Cliente::get()->pluck('nome_cliente', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.contatos.create', compact('nome_clientes'));
    }

    /**
     * Store a newly created Contato in storage.
     *
     * @param  \App\Http\Requests\StoreContatosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContatosRequest $request)
    {
        if (! Gate::allows('contato_create')) {
            return abort(401);
        }
        $contato = Contato::create($request->all());



        return redirect()->route('admin.contatos.index');
    }


    /**
     * Show the form for editing Contato.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('contato_edit')) {
            return abort(401);
        }
        
        $nome_clientes = \App\Cliente::get()->pluck('nome_cliente', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $contato = Contato::findOrFail($id);

        return view('admin.contatos.edit', compact('contato', 'nome_clientes'));
    }

    /**
     * Update Contato in storage.
     *
     * @param  \App\Http\Requests\UpdateContatosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContatosRequest $request, $id)
    {
        if (! Gate::allows('contato_edit')) {
            return abort(401);
        }
        $contato = Contato::findOrFail($id);
        $contato->update($request->all());



        return redirect()->route('admin.contatos.index');
    }


    /**
     * Display Contato.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('contato_view')) {
            return abort(401);
        }
        $contato = Contato::findOrFail($id);

        return view('admin.contatos.show', compact('contato'));
    }


    /**
     * Remove Contato from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('contato_delete')) {
            return abort(401);
        }
        $contato = Contato::findOrFail($id);
        $contato->delete();

        return redirect()->route('admin.contatos.index');
    }

    /**
     * Delete all selected Contato at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('contato_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Contato::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Contato from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('contato_delete')) {
            return abort(401);
        }
        $contato = Contato::onlyTrashed()->findOrFail($id);
        $contato->restore();

        return redirect()->route('admin.contatos.index');
    }

    /**
     * Permanently delete Contato from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('contato_delete')) {
            return abort(401);
        }
        $contato = Contato::onlyTrashed()->findOrFail($id);
        $contato->forceDelete();

        return redirect()->route('admin.contatos.index');
    }
}
