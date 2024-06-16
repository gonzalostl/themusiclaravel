<?php

namespace App\Http\Controllers;

use App\Models\playlist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlists = playlist::all();
        return view('playlists.index', compact('playlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('playlists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                         // Validar datos 
                         $request->validate([
                            'nombre' => 'required|string|max:255',
                            'descripcion' => 'required|string|max:255',
                            'portada' => ' required|string|max:255'
                        ]);
                
                        // Crear el nuevo genero con los datos 
                       playlist::create([
                            'nombre' => $request->input('nombre'),
                            'descripcion' => $request->input('descripcion'),
                            'portada' => $request->input('portada'),
                        ]);
                
                        
                        return redirect()->route('playlist.index')
                            ->withSuccess('Playlist creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $playlist = playlist::find($id);
        return view('playlist.show', compact('playlist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $playlist = playlist::find($id);
        return view('playlist.edit', compact('playlist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
                // Validar datos
                $request->validate([
                    'nombre' => 'required|string|max:255',
                    'descripcion' => 'required|string|max:255' . $id,
                    'portada' => 'required|string|max:255' . $id,
                    
                ]);
        
                // Busca genero que queremos actualizar
                $playlist = playlist::findOrFail($id);
        
                // Actualizar los datos del genero
                $playlist->nombre = $request->input('nombre');
                $playlist->descripcion = $request->input('descripcion');
                $playlist->portada = $request->input('portada');
        
                // Guarda los cambios en la bd
                $playlist->save();
        
                // Redirigir a alguna vista después de actualizar la genero
                return redirect()->route('playlists.index')->with('success', 'playlist actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
                // Busca la cancion por su ID
                $playlist = playlist::findOrFail($id);

                // Elimina la cancion
                $playlist->delete();
        
                return redirect()->route('playlists.index')
                    ->with('success', 'La playlist ha sido eliminado correctamente.');
    }
}
