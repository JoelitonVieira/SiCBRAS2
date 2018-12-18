<?php

namespace App\Http\Controllers\Admin;

use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreProdutosRequest;
use App\Http\Requests\Admin\UpdateProdutosRequest;
use Yajra\DataTables\DataTables;

class ProdutosController extends Controller
{
    /**
     * Display a listing of Produto.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('produto_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Produto::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('produto_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'produtos.id',
                'produtos.codigo',
                'produtos.produto',
                'produtos.granulometria',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'produto_';
                $routeKey = 'admin.produtos';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('codigo', function ($row) {
                return $row->codigo ? $row->codigo : '';
            });
            $table->editColumn('produto', function ($row) {
                return $row->produto ? $row->produto : '';
            });
            $table->editColumn('granulometria', function ($row) {
                return $row->granulometria ? $row->granulometria : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.produtos.index');
    }

    /**
     * Show the form for creating new Produto.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('produto_create')) {
            return abort(401);
        }
        return view('admin.produtos.create');
    }

    /**
     * Store a newly created Produto in storage.
     *
     * @param  \App\Http\Requests\StoreProdutosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProdutosRequest $request)
    {
        if (! Gate::allows('produto_create')) {
            return abort(401);
        }
        $produto = Produto::create($request->all());



        return redirect()->route('admin.produtos.index');
    }


    /**
     * Show the form for editing Produto.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('produto_edit')) {
            return abort(401);
        }
        $produto = Produto::findOrFail($id);

        return view('admin.produtos.edit', compact('produto'));
    }

    /**
     * Update Produto in storage.
     *
     * @param  \App\Http\Requests\UpdateProdutosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProdutosRequest $request, $id)
    {
        if (! Gate::allows('produto_edit')) {
            return abort(401);
        }
        $produto = Produto::findOrFail($id);
        $produto->update($request->all());



        return redirect()->route('admin.produtos.index');
    }


    /**
     * Display Produto.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('produto_view')) {
            return abort(401);
        }
        $especificacaos = \App\Especificacao::where('cd_produto_id', $id)->get();

        $produto = Produto::findOrFail($id);

        return view('admin.produtos.show', compact('produto', 'especificacaos'));
    }


    /**
     * Remove Produto from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('produto_delete')) {
            return abort(401);
        }
        $produto = Produto::findOrFail($id);
        $produto->delete();

        return redirect()->route('admin.produtos.index');
    }

    /**
     * Delete all selected Produto at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('produto_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Produto::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Produto from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('produto_delete')) {
            return abort(401);
        }
        $produto = Produto::onlyTrashed()->findOrFail($id);
        $produto->restore();

        return redirect()->route('admin.produtos.index');
    }

    /**
     * Permanently delete Produto from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('produto_delete')) {
            return abort(401);
        }
        $produto = Produto::onlyTrashed()->findOrFail($id);
        $produto->forceDelete();

        return redirect()->route('admin.produtos.index');
    }
}
