<?php

namespace App\Http\Controllers;

use App\Models\artista;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArtistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $artistas = artista::where('NombreArt', 'LIKE', "%{$search}%")
                            ->orWhere('Descripcion', 'LIKE', "%{$search}%")
                            ->get();
        } else {
            $artistas = artista::all();
        }
    
        return view('artistas.index', compact('artistas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('artistas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar datos 
        $request->validate([
            'Nombre' => 'required|string|max:255',
            'NombreArt' => 'required|string|max:255',
            'Descripcion' => 'required|string|max:255',
            'Foto' => ' nullable|image|mimes:jpeg,png,jpg',
        ]);

        $artista = $request->all();

        if($foto = $request->file('Foto')){
            $rutaGuardarImg = 'portada/';
            $portadaArtista = date('YmdHis'). "." . $foto->getClientOriginalExtension();
            $foto->move($rutaGuardarImg, $portadaArtista);
            $artista['Foto'] = "$portadaArtista";
        }
        

        // Crear el nuevo genero con los datos 
       artista::create([
            'Nombre' => $request->input('Nombre'),
            'NombreArt' => $request->input('NombreArt'),
            'Descripcion' => $request->input('Descripcion'),
            'Foto' =>  $portadaArtista
        ]);



        
        return redirect()->route('artistas.index')
            ->withSuccess('Género creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $artistas = artista::find($id);
        return view('artistas.show', compact('artistas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $artistas = artista::find($id);
        return view('artistas.edit', compact('artistas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
                // Validar datos
                $request->validate([
                    'Nombre' => 'required|string|max:255',
                    'NombreArt' => 'required|string|max:255',
                    'Descripcion' => 'required|string|max:255',
                    'Foto' => ' nullable|image|mimes:jpeg,png,jpg',
                ]);
        
        
                $artista = $request->all();

                if($foto = $request->file('Foto')){
                    $rutaGuardarImg = 'portada/';
                    $portadaArtista = date('YmdHis'). "." . $foto->getClientOriginalExtension();
                    $foto->move($rutaGuardarImg, $portadaArtista);
                    $artista['Foto'] = "$portadaArtista";
                }
                // Busca cancion que queremos actualizar
                $artista = artista::findOrFail($id);
        
                // Actualizar los datos de la cancion
                $artista->Nombre = $request->input('Nombre');
                $artista->NombreArt = $request->input('NombreArt');
                $artista->Descripcion = $request->input('Descripcion');
                $artista->Foto = $portadaArtista;
        
                // Guarda los cambios en la bd
                $artista->save();
        
                // Redirigir a alguna vista después de actualizar la cancion
                return redirect()->route('artistas.index')->with('success', 'Artista actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Busca la cancion por su ID
        $artista = artista::findOrFail($id);

        // Elimina la cancion
        $artista->delete();

        return redirect()->route('artistas.index')
            ->with('success', 'El artista ha sido eliminado correctamente.');
    }
}
