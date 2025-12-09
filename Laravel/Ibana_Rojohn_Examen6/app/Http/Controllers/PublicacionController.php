<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacion;

class PublicacionController extends Controller
{
    private function validateData($data) {
        if ($data['publicado'] == '1' && !$data['fechaPublicacion']) {
            return [
                'success' => false,
                'error' => 'La fecha de publicación debe estar establecida',
            ];
        }

        if (isset($data['fechaPublicacion'])) {
            if ($data['publicado'] == '0') {
                $data['fechaPublicacion'] = NULL;
                return [
                    'success' => false,
                    'error' => 'No se puede establecer la fecha de publicación porque no está publicado'
                ];
            } else if (strtotime(date("o/m/d" ,time())) - strtotime($data['fechaPublicacion']) > 0) {
                return [
                    'success' => false,
                    'error' => 'La fecha de publicación no debe ser anterior al día actual'
                ];
            }
        }

        return [
            'success' => true,
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publicaciones = Publicacion::all();

        return view('publicaciones.index', compact('publicaciones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['fechaCreacion'] = date("o/m/d" ,time());

        $validate = $this->validateData($data);
        if (!$validate['success']) {
            return redirect()->route('publicaciones.create')->with('failure', $validate['error']);
        }

        Publicacion::create($data);

        return redirect()->route('publicaciones.index')->with('success', 'Publicación creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $publicacion = Publicacion::find($id);

        return view('publicaciones.show', compact('publicacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $publicacion = Publicacion::find($id);
        $data = $request->all();

        $validate = $this->validateData($data);
        if (!$validate['success']) {
            return redirect()->route('publicaciones.edit', $publicacion->id)->with('failure', $validate['error']);
        }

        $publicacion->update($data);

        return redirect()->route('publicaciones.index')->with('success', 'Publicación actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $publicacion = Publicacion::find($id);
        $publicacion->delete();

        return redirect()->route('publicaciones.index')->with('success', 'Publicación eliminado correctamente');
    }

    public function create() {
        return view('publicaciones.create');
    }

    public function edit(string $id) {
        $publicacion = Publicacion::find($id);

        return view('publicaciones.edit', compact('publicacion'));
    }
}
