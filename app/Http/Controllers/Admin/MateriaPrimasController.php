<?php

namespace App\Http\Controllers\Admin;

use App\MateriaPrima;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMateriaPrimasRequest;
use App\Http\Requests\Admin\UpdateMateriaPrimasRequest;
use Yajra\DataTables\DataTables;

class MateriaPrimasController extends Controller
{
    /**
     * Display a listing of MateriaPrima.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('materia_prima_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = MateriaPrima::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('materia_prima_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'materia_primas.id',
                'materia_primas.cod_matprima',
                'materia_primas.nome_matprima',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'materia_prima_';
                $routeKey = 'admin.materia_primas';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('cod_matprima', function ($row) {
                return $row->cod_matprima ? $row->cod_matprima : '';
            });
            $table->editColumn('nome_matprima', function ($row) {
                return $row->nome_matprima ? $row->nome_matprima : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.materia_primas.index');
    }

    /**
     * Show the form for creating new MateriaPrima.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('materia_prima_create')) {
            return abort(401);
        }
        return view('admin.materia_primas.create');
    }

    /**
     * Store a newly created MateriaPrima in storage.
     *
     * @param  \App\Http\Requests\StoreMateriaPrimasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMateriaPrimasRequest $request)
    {
        if (! Gate::allows('materia_prima_create')) {
            return abort(401);
        }
        $materia_prima = MateriaPrima::create($request->all());



        return redirect()->route('admin.materia_primas.index');
    }


    /**
     * Show the form for editing MateriaPrima.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('materia_prima_edit')) {
            return abort(401);
        }
        $materia_prima = MateriaPrima::findOrFail($id);

        return view('admin.materia_primas.edit', compact('materia_prima'));
    }

    /**
     * Update MateriaPrima in storage.
     *
     * @param  \App\Http\Requests\UpdateMateriaPrimasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMateriaPrimasRequest $request, $id)
    {
        if (! Gate::allows('materia_prima_edit')) {
            return abort(401);
        }
        $materia_prima = MateriaPrima::findOrFail($id);
        $materia_prima->update($request->all());



        return redirect()->route('admin.materia_primas.index');
    }


    /**
     * Display MateriaPrima.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('materia_prima_view')) {
            return abort(401);
        }
        $materia_prima = MateriaPrima::findOrFail($id);

        return view('admin.materia_primas.show', compact('materia_prima'));
    }


    /**
     * Remove MateriaPrima from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('materia_prima_delete')) {
            return abort(401);
        }
        $materia_prima = MateriaPrima::findOrFail($id);
        $materia_prima->delete();

        return redirect()->route('admin.materia_primas.index');
    }

    /**
     * Delete all selected MateriaPrima at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('materia_prima_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = MateriaPrima::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore MateriaPrima from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('materia_prima_delete')) {
            return abort(401);
        }
        $materia_prima = MateriaPrima::onlyTrashed()->findOrFail($id);
        $materia_prima->restore();

        return redirect()->route('admin.materia_primas.index');
    }

    /**
     * Permanently delete MateriaPrima from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('materia_prima_delete')) {
            return abort(401);
        }
        $materia_prima = MateriaPrima::onlyTrashed()->findOrFail($id);
        $materia_prima->forceDelete();

        return redirect()->route('admin.materia_primas.index');
    }
}
