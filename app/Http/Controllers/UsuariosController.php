<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Validar datos 
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]);

        // Crear el nuevo usuario con los datos 
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            
        ]);

        
        return redirect()->route('users.index')
            ->withSuccess('Usuario creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email' . $id,
            'password' => 'required|string|max:255' . $id,
            
        ]);

        // Busca el usuario que queremos actualizar
        $user = User::findOrFail($id);

        // Actualizar los datos del usuario
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        

        // Guarda los cambios en la bd
        $user->save();

        // Redirigir a alguna vista después de actualizar el usuario
        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Busca el usuario por su ID
        $user = User::findOrFail($id);

        // Elimina el usuario
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'El usuario ha sido eliminado correctamente.');
    }
}
