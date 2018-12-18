<?php

namespace App\Http\Controllers\Admin;

use App\Setore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreSetoresRequest;
use App\Http\Requests\Admin\UpdateSetoresRequest;
use Yajra\DataTables\DataTables;

class SetoresController extends Controller
{
    /**
     * Display a listing of Setore.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('setore_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Setore::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('setore_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'setores.id',
                'setores.nome_setores',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'setore_';
                $routeKey = 'admin.setores';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('nome_setores', function ($row) {
                return $row->nome_setores ? $row->nome_setores : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.setores.index');
    }

    /**
     * Show the form for creating new Setore.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('setore_create')) {
            return abort(401);
        }
        return view('admin.setores.create');
    }

    /**
     * Store a newly created Setore in storage.
     *
     * @param  \App\Http\Requests\StoreSetoresRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSetoresRequest $request)
    {
        if (! Gate::allows('setore_create')) {
            return abort(401);
        }
        $setore = Setore::create($request->all());



        return redirect()->route('admin.setores.index');
    }


    /**
     * Show the form for editing Setore.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('setore_edit')) {
            return abort(401);
        }
        $setore = Setore::findOrFail($id);

        return view('admin.setores.edit', compact('setore'));
    }

    /**
     * Update Setore in storage.
     *
     * @param  \App\Http\Requests\UpdateSetoresRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSetoresRequest $request, $id)
    {
        if (! Gate::allows('setore_edit')) {
            return abort(401);
        }
        $setore = Setore::findOrFail($id);
        $setore->update($request->all());



        return redirect()->route('admin.setores.index');
    }


    /**
     * Display Setore.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('setore_view')) {
            return abort(401);
        }
        $treinamentos = \App\Treinamento::where('nome_setores_id', $id)->get();$funcionarios = \App\Funcionario::where('nome_setor_id', $id)->get();

        $setore = Setore::findOrFail($id);

        return view('admin.setores.show', compact('setore', 'treinamentos', 'funcionarios'));
    }


    /**
     * Remove Setore from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('setore_delete')) {
            return abort(401);
        }
        $setore = Setore::findOrFail($id);
        $setore->delete();

        return redirect()->route('admin.setores.index');
    }

    /**
     * Delete all selected Setore at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('setore_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Setore::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Setore from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('setore_delete')) {
            return abort(401);
        }
        $setore = Setore::onlyTrashed()->findOrFail($id);
        $setore->restore();

        return redirect()->route('admin.setores.index');
    }

    /**
     * Permanently delete Setore from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('setore_delete')) {
            return abort(401);
        }
        $setore = Setore::onlyTrashed()->findOrFail($id);
        $setore->forceDelete();

        return redirect()->route('admin.setores.index');
    }
}
