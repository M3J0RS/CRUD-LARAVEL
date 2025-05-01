<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shed;

class ShedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtén todos los registros de la tabla 'sheds'
        $sheds = Shed::all();

        // Pasa los datos a la vista
        return view('sheds.index', compact('sheds'))->with('i', 0);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sheds.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'batch' => 'required|string|max:255',
            'entryDate' => 'required|date',
            'departureDate' => 'required|date|after_or_equal:entryDate',
        ]);

        // Crear un nuevo registro en la base de datos
        Shed::create($request->all());

        // Redirigir al índice con un mensaje de éxito
        return redirect()->route('sheds.index')->with('success', 'Lista creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $shed = Shed::findOrFail($id);
        return view('sheds.update', compact('shed'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'batch' => 'required|string|max:255',
            'entryDate' => 'required|date',
            'departureDate' => 'required|date|after_or_equal:entryDate',
        ]);

        $shed = Shed::findOrFail($id);
        $shed->update($request->all());

        return redirect()->route('sheds.index')->with('success', 'Lista actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $shed = Shed::findOrFail($id);
        $shed->delete();

        return redirect()->route('sheds.index')->with('success', 'Lista eliminada con éxito.');
    }
}
