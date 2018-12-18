<?php

namespace App\Http\Controllers\Admin;

use App\Cargo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCargosRequest;
use App\Http\Requests\Admin\UpdateCargosRequest;
use Yajra\DataTables\DataTables;

class CargosController extends Controller
{
    /**
     * Display a listing of Cargo.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('cargo_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Cargo::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('cargo_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'cargos.id',
                'cargos.nome_cargo',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'cargo_';
                $routeKey = 'admin.cargos';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('nome_cargo', function ($row) {
                return $row->nome_cargo ? $row->nome_cargo : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.cargos.index');
    }

    /**
     * Show the form for creating new Cargo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('cargo_create')) {
            return abort(401);
        }
        return view('admin.cargos.create');
    }

    /**
     * Store a newly created Cargo in storage.
     *
     * @param  \App\Http\Requests\StoreCargosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCargosRequest $request)
    {
        if (! Gate::allows('cargo_create')) {
            return abort(401);
        }
        $cargo = Cargo::create($request->all());



        return redirect()->route('admin.cargos.index');
    }


    /**
     * Show the form for editing Cargo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('cargo_edit')) {
            return abort(401);
        }
        $cargo = Cargo::findOrFail($id);

        return view('admin.cargos.edit', compact('cargo'));
    }

    /**
     * Update Cargo in storage.
     *
     * @param  \App\Http\Requests\UpdateCargosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCargosRequest $request, $id)
    {
        if (! Gate::allows('cargo_edit')) {
            return abort(401);
        }
        $cargo = Cargo::findOrFail($id);
        $cargo->update($request->all());



        return redirect()->route('admin.cargos.index');
    }


    /**
     * Display Cargo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('cargo_view')) {
            return abort(401);
        }
        $funcionarios = \App\Funcionario::where('nome_cargo_id', $id)->get();

        $cargo = Cargo::findOrFail($id);

        return view('admin.cargos.show', compact('cargo', 'funcionarios'));
    }


    /**
     * Remove Cargo from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('cargo_delete')) {
            return abort(401);
        }
        $cargo = Cargo::findOrFail($id);
        $cargo->delete();

        return redirect()->route('admin.cargos.index');
    }

    /**
     * Delete all selected Cargo at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('cargo_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Cargo::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Cargo from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('cargo_delete')) {
            return abort(401);
        }
        $cargo = Cargo::onlyTrashed()->findOrFail($id);
        $cargo->restore();

        return redirect()->route('admin.cargos.index');
    }

    /**
     * Permanently delete Cargo from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('cargo_delete')) {
            return abort(401);
        }
        $cargo = Cargo::onlyTrashed()->findOrFail($id);
        $cargo->forceDelete();

        return redirect()->route('admin.cargos.index');
    }
}
