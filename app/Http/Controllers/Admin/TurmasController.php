<?php

namespace App\Http\Controllers\Admin;

use App\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTurmasRequest;
use App\Http\Requests\Admin\UpdateTurmasRequest;
use Yajra\DataTables\DataTables;

class TurmasController extends Controller
{
    /**
     * Display a listing of Turma.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('turma_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Turma::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('turma_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'turmas.id',
                'turmas.nome_treinamento',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'turma_';
                $routeKey = 'admin.turmas';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('nome_treinamento', function ($row) {
                return $row->nome_treinamento ? $row->nome_treinamento : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.turmas.index');
    }

    /**
     * Show the form for creating new Turma.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('turma_create')) {
            return abort(401);
        }
        return view('admin.turmas.create');
    }

    /**
     * Store a newly created Turma in storage.
     *
     * @param  \App\Http\Requests\StoreTurmasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTurmasRequest $request)
    {
        if (! Gate::allows('turma_create')) {
            return abort(401);
        }
        $turma = Turma::create($request->all());



        return redirect()->route('admin.turmas.index');
    }


    /**
     * Show the form for editing Turma.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('turma_edit')) {
            return abort(401);
        }
        $turma = Turma::findOrFail($id);

        return view('admin.turmas.edit', compact('turma'));
    }

    /**
     * Update Turma in storage.
     *
     * @param  \App\Http\Requests\UpdateTurmasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTurmasRequest $request, $id)
    {
        if (! Gate::allows('turma_edit')) {
            return abort(401);
        }
        $turma = Turma::findOrFail($id);
        $turma->update($request->all());



        return redirect()->route('admin.turmas.index');
    }


    /**
     * Display Turma.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('turma_view')) {
            return abort(401);
        }
        $treinamentos = \App\Treinamento::where('nome_treinamento_id', $id)->get();

        $turma = Turma::findOrFail($id);

        return view('admin.turmas.show', compact('turma', 'treinamentos'));
    }


    /**
     * Remove Turma from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('turma_delete')) {
            return abort(401);
        }
        $turma = Turma::findOrFail($id);
        $turma->delete();

        return redirect()->route('admin.turmas.index');
    }

    /**
     * Delete all selected Turma at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('turma_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Turma::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore Turma from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('turma_delete')) {
            return abort(401);
        }
        $turma = Turma::onlyTrashed()->findOrFail($id);
        $turma->restore();

        return redirect()->route('admin.turmas.index');
    }

    /**
     * Permanently delete Turma from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('turma_delete')) {
            return abort(401);
        }
        $turma = Turma::onlyTrashed()->findOrFail($id);
        $turma->forceDelete();

        return redirect()->route('admin.turmas.index');
    }
}
