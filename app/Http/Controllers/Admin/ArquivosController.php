<?php

namespace App\Http\Controllers\Admin;

use App\Arquivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreArquivosRequest;
use App\Http\Requests\Admin\UpdateArquivosRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\DataTables\DataTables;

class ArquivosController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of Arquivo.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('arquivo_access')) {
            return abort(401);
        }


        
        if (request()->ajax()) {
            $query = Arquivo::query();
            $template = 'actionsTemplate';
            if(request('show_deleted') == 1) {
                
        if (! Gate::allows('arquivo_delete')) {
            return abort(401);
        }
                $query->onlyTrashed();
                $template = 'restoreTemplate';
            }
            $query->select([
                'arquivos.id',
                'arquivos.nome_arquivo',
            ]);
            $table = Datatables::of($query);

            $table->setRowAttr([
                'data-entry-id' => '{{$id}}',
            ]);
            $table->addColumn('massDelete', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');
            $table->editColumn('actions', function ($row) use ($template) {
                $gateKey  = 'arquivo_';
                $routeKey = 'admin.arquivos';

                return view($template, compact('row', 'gateKey', 'routeKey'));
            });
            $table->editColumn('nome_arquivo', function ($row) {
                return $row->nome_arquivo ? $row->nome_arquivo : '';
            });
            $table->editColumn('arquivo', function ($row) {
                $build  = '';
                foreach ($row->getMedia('arquivo') as $media) {
                    $build .= '<p class="form-group"><a href="' . $media->getUrl() . '" target="_blank">' . $media->name . '</a></p>';
                }
                
                return $build;
            });

            $table->rawColumns(['actions','massDelete','arquivo']);

            return $table->make(true);
        }

        return view('admin.arquivos.index');
    }

    /**
     * Show the form for creating new Arquivo.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('arquivo_create')) {
            return abort(401);
        }
        return view('admin.arquivos.create');
    }

    /**
     * Store a newly created Arquivo in storage.
     *
     * @param  \App\Http\Requests\StoreArquivosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArquivosRequest $request)
    {
        if (! Gate::allows('arquivo_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $arquivo = Arquivo::create($request->all());


        foreach ($request->input('arquivo_id', []) as $index => $id) {
            $model          = config('laravel-medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $arquivo->id;
            $file->save();
        }

        return redirect()->route('admin.arquivos.index');
    }


    /**
     * Show the form for editing Arquivo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('arquivo_edit')) {
            return abort(401);
        }
        $arquivo = Arquivo::findOrFail($id);

        return view('admin.arquivos.edit', compact('arquivo'));
    }

    /**
     * Update Arquivo in storage.
     *
     * @param  \App\Http\Requests\UpdateArquivosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArquivosRequest $request, $id)
    {
        if (! Gate::allows('arquivo_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $arquivo = Arquivo::findOrFail($id);
        $arquivo->update($request->all());


        $media = [];
        foreach ($request->input('arquivo_id', []) as $index => $id) {
            $model          = config('laravel-medialibrary.media_model');
            $file           = $model::find($id);
            $file->model_id = $arquivo->id;
            $file->save();
            $media[] = $file->toArray();
        }
        $arquivo->updateMedia($media, 'arquivo');

        return redirect()->route('admin.arquivos.index');
    }


    /**
     * Display Arquivo.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('arquivo_view')) {
            return abort(401);
        }
        $arquivo = Arquivo::findOrFail($id);

        return view('admin.arquivos.show', compact('arquivo'));
    }


    /**
     * Remove Arquivo from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('arquivo_delete')) {
            return abort(401);
        }
        $arquivo = Arquivo::findOrFail($id);
        $arquivo->deletePreservingMedia();

        return redirect()->route('admin.arquivos.index');
    }

    /**
     * Delete all selected Arquivo at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('arquivo_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Arquivo::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->deletePreservingMedia();
            }
        }
    }


    /**
     * Restore Arquivo from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (! Gate::allows('arquivo_delete')) {
            return abort(401);
        }
        $arquivo = Arquivo::onlyTrashed()->findOrFail($id);
        $arquivo->restore();

        return redirect()->route('admin.arquivos.index');
    }

    /**
     * Permanently delete Arquivo from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function perma_del($id)
    {
        if (! Gate::allows('arquivo_delete')) {
            return abort(401);
        }
        $arquivo = Arquivo::onlyTrashed()->findOrFail($id);
        $arquivo->forceDelete();

        return redirect()->route('admin.arquivos.index');
    }
}
