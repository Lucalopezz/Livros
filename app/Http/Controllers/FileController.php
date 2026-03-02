<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFileRequest $request)
    {
        $validated = $request->validated();
        $file = new File;
        $file->livro_id = $validated['livro_id'];
        $file->original_name = $validated['file']->getClientOriginalName();
        if (! $file->path = $validated['file']->store('.')) {
            request()->session()->flash('alert-danger', 'Erro ao salvar o arquivo!');

            return back();
        }
        $file->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        return Storage::download($file->path, $file->original_name);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }
}
