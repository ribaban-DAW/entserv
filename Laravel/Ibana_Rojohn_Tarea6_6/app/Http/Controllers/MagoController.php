<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mago;

class MagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $magos = Mago::all();

        return view('magos.index', compact('magos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Mago::create($request->all());

        return redirect()->route('magos.index')->with('success', 'Mago creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mago = Mago::find($id);

        return view('magos.show', compact('mago'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mago = Mago::find($id);
        $mago->update($request->all());

        return redirect()->route('magos.index')->with('success', 'Mago actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mago = Mago::find($id);
        $mago->delete();

        return redirect()->route('magos.index')->with('success', 'Mago eliminado correctamente');
    }

    public function create() {
        return view('magos.create');
    }

    public function edit(string $id) {
        $mago = Mago::find($id);

        return view('magos.edit', compact('mago'));
    }
}
