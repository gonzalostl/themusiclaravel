<?php

namespace App\Http\Controllers;

use App\Models\generos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenerosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $generos = generos::where('genero', 'LIKE', "%{$search}%")
                            ->orWhere('descripcion', 'LIKE', "%{$search}%")
                            ->get();
        } else {
            $generos = generos::all();
        }
    
        return view('generos.index', compact('generos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('generos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                 // Validar datos 
                 $request->validate([
                    'genero' => 'required|string|max:255',
                    'descripcion' => 'required|string|max:255',
                    'portada' => ' nullable|image|mimes:jpeg,png,jpg',
                ]);
        
                $genero = $request->all();

                if($portada = $request->file('portada')){
                    $rutaGuardarImg = 'portada/';
                    $portadaGenero = date('YmdHis'). "." . $portada->getClientOriginalExtension();
                    $portada->move($rutaGuardarImg, $portadaGenero);
                    $genero['portada'] = "$portadaGenero";
                }
                

                // Crear el nuevo genero con los datos 
               generos::create([
                    'genero' => $request->input('genero'),
                    'descripcion' => $request->input('descripcion'),
                    'portada' =>  $portadaGenero
                ]);
        
       
 
                
                return redirect()->route('generos.index')
                    ->withSuccess('Género creada con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $genero = generos::find($id);
        return view('generos.show', compact('genero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $genero = generos::find($id);
        return view('generos.edit', compact('genero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar datos
        $request->validate([
            'genero' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255' . $id,
            'portada' => ' nullable|image|mimes:jpeg,png,jpg' . $id,
            
        ]);
                
        $genr = $request->all();

        if($portada = $request->file('portada')){
            $rutaGuardarImg = 'portada/';
            $portadaGenero = date('YmdHis'). "." . $portada->getClientOriginalExtension();
            $portada->move($rutaGuardarImg, $portadaGenero);
            $genr['portada'] = "$portadaGenero";
        }
        
        // Busca genero que queremos actualizar
        $genero = generos::findOrFail($id);

        // Actualizar los datos del genero
        $genero->genero = $request->input('genero');
        $genero->descripcion = $request->input('descripcion');
        $genero->portada = $request->input('portada');

        // Guarda los cambios en la bd
        $genero->save();

        // Redirigir a alguna vista después de actualizar la genero
        return redirect()->route('generos.index')->with('success', 'genero actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Busca la cancion por su ID
        $genero = generos::findOrFail($id);

        // Elimina la cancion
        $genero->delete();

        return redirect()->route('generos.index')
            ->with('success', 'El género ha sido eliminado correctamente.');
    }
}
