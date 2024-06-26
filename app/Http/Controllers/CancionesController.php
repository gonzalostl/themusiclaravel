<?php

namespace App\Http\Controllers;

use App\Models\canciones;
use App\Models\artista;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CancionesController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->input('search');

        if ($search) {
            $canciones = canciones::where('nombre', 'LIKE', "%{$search}%")
                            ->orWhere('artista', 'LIKE', "%{$search}%")
                            ->get();
        } else {
            $canciones = canciones::all();
        }
    
        return view('canciones.index', compact('canciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    
    public function create()
    {

        $artistas = artista::all(); // Asegúrate de tener un modelo Artista
        return view('canciones.create', compact('artistas'));
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
            'artista_id' => 'required|exists:artistas,id',
        /**/'imagen' => ' nullable|image|mimes:jpeg,png,jpg',

        ]);

       /**/ $cancion = $request->all();

       $portadaCancion = null;
       if($imagen = $request->file('imagen')){
            $rutaGuardarImg = 'portada/';
            $portadaCancion = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $portadaCancion);
            $cancion['imagen'] = "$portadaCancion";
        }

        // Crear la nueva cancion con los datos 
        canciones::create([
            'nombre' => $request->input('nombre'),
            'artista' => $request->input('artista'),
            'duracion' => $request->input('duracion'),
            'artista_id' => $request->input('artista_id'),
     /**/   'imagen' =>  $portadaCancion
            
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
            'imagen' => ' nullable|image|mimes:jpeg,png,jpg' . $id,
            
        ]);

        $cancion = $request->all();

       $portadaCancion = null;
       if($imagen = $request->file('imagen')){
            $rutaGuardarImg = 'portada/';
            $portadaCancion = date('YmdHis'). "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $portadaCancion);
            $cancion['imagen'] = "$portadaCancion";
        }
        // Busca cancion que queremos actualizar
        $cancion = canciones::findOrFail($id);

        // Actualizar los datos de la cancion
        $cancion->nombre = $request->input('nombre');
        $cancion->artista = $request->input('artista');
        $cancion->duracion = $request->input('duracion');
        $cancion->imagen = $portadaCancion;

        // Guarda los cambios en la bd
        $cancion->save();

        // Redirigir a alguna vista después de actualizar la cancion
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
