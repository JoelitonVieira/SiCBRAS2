<?php

namespace App\Http\Controllers\Admin;

use App\Especificacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEspecificacaosRequest;
use App\Http\Requests\Admin\UpdateEspecificacaosRequest;
use Yajra\DataTables\DataTables;

class EspecificacaosController extends Controller
{
    /**
     * Display a listing of Especificacao.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('especificacao_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Especificacao::query();
            $query->with("nome_cliente");
            $query->with("cd_produto");
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('especificacao_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'especificacaos.id',
                'especificacaos.codigo',
                'especificacaos.data',
                'especificacaos.requisito_iso',
                'especificacaos.nome_cliente_id',
                'especificacaos.cd_produto_id',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'especificacao_';
                $routeKey = 'admin.especificacaos';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('codigo', function ($row) {
                return $row->codigo ? $row->codigo : '';
            });
            $table->editColumn('data', function ($row) {
                return $row->data ? $row->data : '';
            });
            $table->editColumn('requisito_iso', function ($row) {
                return $row->requisito_iso ? $row->requisito_iso : '';
            });
            $table->editColumn('nome_cliente.nome_cliente', function ($row) {
                return $row->nome_cliente ? $row->nome_cliente->nome_cliente : '';
            });
            $table->editColumn('cd_produto.codigo', function ($row) {
                return $row->cd_produto ? $row->cd_produto->codigo : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.especificacaos.index');
    }

    /**
     * Show the form for creating new Especificacao.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('especificacao_create')) {
            return abort(401);
        }
        
        $nome_clientes = \App\Cliente::get()->pluck('nome_cliente', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $cd_produtos = \App\Produto::get()->pluck('codigo', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.especificacaos.create', compact('nome_clientes', 'cd_produtos'));
    }

    /**
     * Store a newly created Especificacao in storage.
     *
     * @param  \App\Http\Requests\StoreEspecificacaosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEspecificacaosRequest $request)
    {
        if (! Gate::allows('especificacao_create')) {
            return abort(401);
        }
        $especificacao = Especificacao::create($request->all());

        foreach ($request->input('composicao_fisicas', []) as $data) {
            $especificacao->composicao_fisicas()->create($data);
        }
        foreach ($request->input('composicao_granulometricas', []) as $data) {
            $especificacao->composicao_granulometricas()->create($data);
        }
        foreach ($request->input('composicao_quimicas', []) as $data) {
            $especificacao->composicao_quimicas()->create($data);
        }


        return redirect()->route('admin.especificacaos.index');
    }


    /**
     * Show the form for editing Especificacao.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('especificacao_edit')) {
            return abort(401);
        }
        
        $nome_clientes = \App\Cliente::get()->pluck('nome_cliente', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $cd_produtos = \App\Produto::get()->pluck('codigo', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $especificacao = Especificacao::findOrFail($id);

        return view('admin.especificacaos.edit', compact('especificacao', 'nome_clientes', 'cd_produtos'));
    }

    /**
     * Update Especificacao in storage.
     *
     * @param  \App\Http\Requests\UpdateEspecificacaosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEspecificacaosRequest $request, $id)
    {
        if (! Gate::allows('especificacao_edit')) {
            return abort(401);
        }
        $especificacao = Especificacao::findOrFail($id);
        $especificacao->update($request->all());

        $composicaoFisicas           = $especificacao->composicao_fisicas;
        $currentComposicaoFisicaData = [];
        foreach ($request->input('composicao_fisicas', []) as $index => $data) {
            if (is_integer($index)) {
                $especificacao->composicao_fisicas()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentComposicaoFisicaData[$id] = $data;
            }
        }
        foreach ($composicaoFisicas as $item) {
            if (isset($currentComposicaoFisicaData[$item->id])) {
                $item->update($currentComposicaoFisicaData[$item->id]);
            } else {
                $item->delete();
            }
        }
        $composicaoGranulometricas           = $especificacao->composicao_granulometricas;
        $currentComposicaoGranulometricaData = [];
        foreach ($request->input('composicao_granulometricas', []) as $index => $data) {
            if (is_integer($index)) {
                $especificacao->composicao_granulometricas()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentComposicaoGranulometricaData[$id] = $data;
            }
        }
        foreach ($composicaoGranulometricas as $item) {
            if (isset($currentComposicaoGranulometricaData[$item->id])) {
                $item->update($currentComposicaoGranulometricaData[$item->id]);
            } else {
                $item->delete();
            }
        }
        $composicaoQuimicas           = $especificacao->composicao_quimicas;
        $currentComposicaoQuimicaData = [];
        foreach ($request->input('composicao_quimicas', []) as $index => $data) {
            if (is_integer($index)) {
                $especificacao->composicao_quimicas()->create($data);
            } else {
                $id                          = explode('-', $index)[1];
                $currentComposicaoQuimicaData[$id] = $data;
            }
        }
        foreach ($composicaoQuimicas as $item) {
            if (isset($currentComposicaoQuimicaData[$item->id])) {
                $item->update($currentComposicaoQuimicaData[$item->id]);
            } else {
                $item->delete();
            }
        }


        return redirect()->route('admin.especificacaos.index');
    }


    /**
     * Display Especificacao.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('especificacao_view')) {
            return abort(401);
        }
        
        $nome_clientes = \App\Cliente::get()->pluck('nome_cliente', 'id')->prepend(trans('quickadmin.qa_please_select'), '');
        $cd_produtos = \App\Produto::get()->pluck('codigo', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$composicao_fisicas = \App\ComposicaoFisica::where('cd_especificacao_id', $id)->get();$composicao_granulometricas = \App\ComposicaoGranulometrica::where('cd_especificacao_id', $id)->get();$composicao_quimicas = \App\ComposicaoQuimica::where('cd_especificacao_id', $id)->get();$solicitar_amostras = \App\SolicitarAmostra::where('cd_especificacao_id', $id)->get();

        $especificacao = Especificacao::findOrFail($id);

        return view('admin.especificacaos.show', compact('especificacao', 'composicao_fisicas', 'composicao_granulometricas', 'composicao_quimicas', 'solicitar_amostras'));
    }


    /**
     * Remove Especificacao from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('especificacao_delete')) {
            return abort(401);
        }
        $especificacao = Especificacao::findOrFail($id);
        $especificacao->delete();

        return redirect()->route('admin.especificacaos.index');
    }

    /**
     * Delete all selected Especificacao at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('especificacao_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Especificacao::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Especificacao from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('especificacao_delete')) {
            return abort(401);
        }
        $especificacao = Especificacao::onlyTrashed()->findOrFail($id);
        $especificacao->restore();

        return redirect()->route('admin.especificacaos.index');
    }

    /**
     * Permanently delete Especificacao from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('especificacao_delete')) {
            return abort(401);
        }
        $especificacao = Especificacao::onlyTrashed()->findOrFail($id);
        $especificacao->forceDelete();

        return redirect()->route('admin.especificacaos.index');
    }
}
