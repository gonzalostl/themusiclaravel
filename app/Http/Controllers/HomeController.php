<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\canciones;
use App\Models\generos;
use App\Http\Controllers\Controller;
use App\Models\playlist;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $canciones = canciones::count();
        $generos = generos::count();
        $users = User::count();
        $playlists = playlist::count();
        return view('home', ['canciones' => $canciones, 'generos' => $generos, 'users' => $users, 'playlists' => $playlists]);
    } 

}
