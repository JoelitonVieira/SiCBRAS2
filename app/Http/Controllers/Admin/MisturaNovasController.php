<?php

namespace App\Http\Controllers\Admin;

use App\MisturaNova;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMisturaNovasRequest;
use App\Http\Requests\Admin\UpdateMisturaNovasRequest;
use Yajra\DataTables\DataTables;

class MisturaNovasController extends Controller
{
    /**
     * Display a listing of MisturaNova.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('mistura_nova_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = MisturaNova::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('mistura_nova_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'mistura_novas.id',
                'mistura_novas.data',
                'mistura_novas.numero_cf',
                'mistura_novas.numero_kf',
                'mistura_novas.kg_coquebase',
                'mistura_novas.kg_areiabase',
                'mistura_novas.kg_coquereal',
                'mistura_novas.kg_areiareal',
                'mistura_novas.mediacoque',
                'mistura_novas.mediaareia',
                'mistura_novas.num_batelada',
                'mistura_novas.turnos',
                'mistura_novas.coque_total',
                'mistura_novas.areia_total',
                'mistura_novas.total_batelada',
                'mistura_novas.total_misturadia',
                'mistura_novas.mistura_total',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'mistura_nova_';
                $routeKey = 'admin.mistura_novas';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('data', function ($row) {
                return $row->data ? $row->data : '';
            });
            $table->editColumn('numero_cf', function ($row) {
                return $row->numero_cf ? $row->numero_cf : '';
            });
            $table->editColumn('numero_kf', function ($row) {
                return $row->numero_kf ? $row->numero_kf : '';
            });
            $table->editColumn('kg_coquebase', function ($row) {
                return $row->kg_coquebase ? $row->kg_coquebase : '';
            });
            $table->editColumn('kg_areiabase', function ($row) {
                return $row->kg_areiabase ? $row->kg_areiabase : '';
            });
            $table->editColumn('kg_coquereal', function ($row) {
                return $row->kg_coquereal ? $row->kg_coquereal : '';
            });
            $table->editColumn('kg_areiareal', function ($row) {
                return $row->kg_areiareal ? $row->kg_areiareal : '';
            });
            $table->editColumn('mediacoque', function ($row) {
                return $row->mediacoque ? $row->mediacoque : '';
            });
            $table->editColumn('mediaareia', function ($row) {
                return $row->mediaareia ? $row->mediaareia : '';
            });
            $table->editColumn('num_batelada', function ($row) {
                return $row->num_batelada ? $row->num_batelada : '';
            });
            $table->editColumn('turnos', function ($row) {
                return $row->turnos ? $row->turnos : '';
            });
            $table->editColumn('coque_total', function ($row) {
                return $row->coque_total ? $row->coque_total : '';
            });
            $table->editColumn('areia_total', function ($row) {
                return $row->areia_total ? $row->areia_total : '';
            });
            $table->editColumn('total_batelada', function ($row) {
                return $row->total_batelada ? $row->total_batelada : '';
            });
            $table->editColumn('total_misturadia', function ($row) {
                return $row->total_misturadia ? $row->total_misturadia : '';
            });
            $table->editColumn('mistura_total', function ($row) {
                return $row->mistura_total ? $row->mistura_total : '';
            });

            $table->rawColumns(['actions','massDelete']);

            return $table->make(true);
        }

        return view('admin.mistura_novas.index');
    }

    /**
     * Show the form for creating new MisturaNova.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('mistura_nova_create')) {
            return abort(401);
        }
        return view('admin.mistura_novas.create');
    }

    /**
     * Store a newly created MisturaNova in storage.
     *
     * @param  \App\Http\Requests\StoreMisturaNovasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMisturaNovasRequest $request)
    {
        if (! Gate::allows('mistura_nova_create')) {
            return abort(401);
        }
        $mistura_nova = MisturaNova::create($request->all());



        return redirect()->route('admin.mistura_novas.index');
    }


    /**
     * Show the form for editing MisturaNova.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('mistura_nova_edit')) {
            return abort(401);
        }
        $mistura_nova = MisturaNova::findOrFail($id);

        return view('admin.mistura_novas.edit', compact('mistura_nova'));
    }

    /**
     * Update MisturaNova in storage.
     *
     * @param  \App\Http\Requests\UpdateMisturaNovasRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMisturaNovasRequest $request, $id)
    {
        if (! Gate::allows('mistura_nova_edit')) {
            return abort(401);
        }
        $mistura_nova = MisturaNova::findOrFail($id);
        $mistura_nova->update($request->all());



        return redirect()->route('admin.mistura_novas.index');
    }


    /**
     * Display MisturaNova.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('mistura_nova_view')) {
            return abort(401);
        }
        $mistura_nova = MisturaNova::findOrFail($id);

        return view('admin.mistura_novas.show', compact('mistura_nova'));
    }


    /**
     * Remove MisturaNova from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('mistura_nova_delete')) {
            return abort(401);
        }
        $mistura_nova = MisturaNova::findOrFail($id);
        $mistura_nova->delete();

        return redirect()->route('admin.mistura_novas.index');
    }

    /**
     * Delete all selected MisturaNova at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('mistura_nova_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = MisturaNova::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }


    /**
     * Restore MisturaNova from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('mistura_nova_delete')) {
            return abort(401);
        }
        $mistura_nova = MisturaNova::onlyTrashed()->findOrFail($id);
        $mistura_nova->restore();

        return redirect()->route('admin.mistura_novas.index');
    }

    /**
     * Permanently delete MisturaNova from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('mistura_nova_delete')) {
            return abort(401);
        }
        $mistura_nova = MisturaNova::onlyTrashed()->findOrFail($id);
        $mistura_nova->forceDelete();

        return redirect()->route('admin.mistura_novas.index');
    }
}
