<?php

namespace App\Http\Controllers;

use App\Models\canciones;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CancionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $canciones = canciones::all();
        return view('canciones.index', compact('canciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('canciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validar datos 
         $request->validate([
            'nombre' => 'required|string|max:255',
            'artista' => 'required|string|max:255',
            'duracion' => 'required|integer',
        ]);

        // Crear la nueva cancion con los datos 
        canciones::create([
            'nombre' => $request->input('nombre'),
            'artista' => $request->input('artista'),
            'duracion' => $request->input('duracion'),
            
        ]);

        
        return redirect()->route('canciones.index')
            ->withSuccess('Cancion creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cancion = canciones::find($id);
        return view('canciones.show', compact('cancion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cancion = canciones::find($id);
        return view('canciones.edit', compact('cancion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'artista' => 'required|string|max:255' . $id,
            'duracion' => 'required|integer|unique:canciones,duracion,' . $id,
            
        ]);

        // Busca cancion que queremos actualizar
        $cancion = canciones::findOrFail($id);

        // Actualizar los datos de la cancion
        $cancion->nombre = $request->input('nombre');
        $cancion->artista = $request->input('artista');
        $cancion->duracion = $request->input('duracion');
        

        // Guarda los cambios en la bd
        $cancion->save();

        // Redirigir a alguna vista después de actualizar el usuario
        return redirect()->route('canciones.index')->with('success', 'Cancion actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Busca la cancion por su ID
        $cancion = canciones::findOrFail($id);

        // Elimina la cancion
        $cancion->delete();

        return redirect()->route('canciones.index')
            ->with('success', 'La cancion ha sido eliminado correctamente.');
    }
}
