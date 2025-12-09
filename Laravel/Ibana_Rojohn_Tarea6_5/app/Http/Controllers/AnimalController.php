<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::all();
        return view('animals.index', compact('animals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data["observaciones"] = (isset($data["observaciones"])) ? $data["observaciones"] : "";
        Animal::create($data);
        
        return redirect()->route('animals.index')->with('success', 'Animal creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $animal = Animal::find($id);

        return view('animals.show', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $animal = Animal::find($id);

        $data = $request->all();
        $data["observaciones"] = (isset($data["observaciones"])) ? $data["observaciones"] : "";
        $animal->update($data);

        return redirect()->route('animals.index')->with('success', 'Animal editado correctamente');
    }
    
    /**
     * Remove the specified resource from storage.
    */
    public function destroy(string $id)
    {
        $animal = Animal::find($id);
        $animal->delete();

        return redirect()->route('animals.index')->with('success', 'Animal eliminado correctamente');
    }

    public function create()
    {
        return view('animals.create');
    }

    public function edit($id)
    {
        $animal = Animal::find($id);

        return view('animals.edit', compact('animal'));
    }
}
