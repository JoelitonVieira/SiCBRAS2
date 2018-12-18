<?php

namespace App\Http\Controllers\Admin;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreClientesRequest;
use App\Http\Requests\Admin\UpdateClientesRequest;
use Yajra\DataTables\DataTables;

class ClientesController extends Controller
{
    /**
     * Display a listing of Cliente.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('cliente_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Cliente::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('cliente_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'clientes.id',
                'clientes.nome_cliente',
                'clientes.cpf',
                'clientes.cnpj',
                'clientes.email_cliente',
                'clientes.telefone',
                'clientes.cep_address',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'cliente_';
                $routeKey = 'admin.clientes';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('nome_cliente', function ($row) {
                return $row->nome_cliente ? $row->nome_cliente : '';
            });
            $table->editColumn('cpf', function ($row) {
                return $row->cpf ? $row->cpf : '';
            });
            $table->editColumn('cnpj', function ($row) {
                return $row->cnpj ? $row->cnpj : '';
            });
            $table->editColumn('email_cliente', function ($row) {
                return $row->email_cliente ? $row->email_cliente : '';
            });
            $table->editColumn('telefone', function ($row) {
                return $row->telefone ? $row->telefone : '';
            });
            $table->editColumn('cep', function ($row) {
                return $row->cep ? $row->cep : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.clientes.index');
    }

    /**
     * Show the form for creating new Cliente.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('cliente_create')) {
            return abort(401);
        }
        return view('admin.clientes.create');
    }

    /**
     * Store a newly created Cliente in storage.
     *
     * @param  \App\Http\Requests\StoreClientesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientesRequest $request)
    {
        if (! Gate::allows('cliente_create')) {
            return abort(401);
        }
        $cliente = Cliente::create($request->all());

        foreach ($request->input('contatos', []) as $data) {
            $cliente->contatos()->create($data);
        }


        return redirect()->route('admin.clientes.index');
    }


    /**
     * Show the form for editing Cliente.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('cliente_edit')) {
            return abort(401);
        }
        $cliente = Cliente::findOrFail($id);

        return view('admin.clientes.edit', compact('cliente'));
    }

    /**
     * Update Cliente in storage.
     *
     * @param  \App\Http\Requests\UpdateClientesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientesRequest $request, $id)
    {
        if (! Gate::allows('cliente_edit')) {
            return abort(401);
        }
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        $contatos           = $cliente->contatos;
        $currentContatoData = [];
        foreach ($request->input('contatos', []) as $index => $data) {
            if (is_integer($index)) {
                $cliente->contatos()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentContatoData[$id] = $data;
            }
        }
        foreach ($contatos as $item) {
            if (isset($currentContatoData[$item->id])) {
                $item->update($currentContatoData[$item->id]);
            } else {
                $item->delete();
            }
        }


        return redirect()->route('admin.clientes.index');
    }


    /**
     * Display Cliente.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('cliente_view')) {
            return abort(401);
        }
        $contatos = \App\Contato::where('nome_cliente_id', $id)->get();$especificacaos = \App\Especificacao::where('nome_cliente_id', $id)->get();

        $cliente = Cliente::findOrFail($id);

        return view('admin.clientes.show', compact('cliente', 'contatos', 'especificacaos'));
    }


    /**
     * Remove Cliente from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('cliente_delete')) {
            return abort(401);
        }
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        return redirect()->route('admin.clientes.index');
    }

    /**
     * Delete all selected Cliente at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('cliente_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Cliente::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Cliente from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('cliente_delete')) {
            return abort(401);
        }
        $cliente = Cliente::onlyTrashed()->findOrFail($id);
        $cliente->restore();

        return redirect()->route('admin.clientes.index');
    }

    /**
     * Permanently delete Cliente from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('cliente_delete')) {
            return abort(401);
        }
        $cliente = Cliente::onlyTrashed()->findOrFail($id);
        $cliente->forceDelete();

        return redirect()->route('admin.clientes.index');
    }
}
