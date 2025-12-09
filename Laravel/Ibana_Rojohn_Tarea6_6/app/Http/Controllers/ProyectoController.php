<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyectos = Proyecto::all();

        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['descripcion'] = isset($data['descripcion']) ? $data['descripcion'] : '';
        $data['link'] = isset($data['link']) ? $data['link'] : '';

        Proyecto::create($data);

        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proyecto = Proyecto::find($id);

        return view('proyectos.show', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $data['descripcion'] = isset($data['descripcion']) ? $data['descripcion'] : '';
        $data['link'] = isset($data['link']) ? $data['link'] : '';

        $proyecto = Proyecto::find($id);
        $proyecto->update($data);

        return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proyecto = Proyecto::find($id);
        $proyecto->delete();

        return redirect()->route('proyectos.index')->with('success', 'Proyecto eliminado correctamente');
    }

    public function create() {
        return view('proyectos.create');
    }

    public function edit(string $id) {
        $proyecto = Proyecto::find($id);

        return view('proyectos.edit', compact('proyecto'));
    }
}
