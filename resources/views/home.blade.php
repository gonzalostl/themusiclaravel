@extends('layouts.app2')

<link rel="stylesheet" href="/css/home.css">
<body>
<aside id="sidebar">

    <ul>
        <li>
            <img src="/imagen/logothemusic.png" class="logo" width="40%">
        </li>
        <li><a href="{{ route('home') }}" class="menu-item active"><i class="fas fa-home"></i> Inicio</a></li>          
            <li><a href="{{ route('canciones.index') }}" class="menu-item"><i class="fas fa-music"></i> Canciones</a></li>
            <li><a href="{{route('generos.index')}}" class="menu-item"><i class="fas fa-list"></i> Géneros</a></li>
            <li><a href="{{ route('playlists.index') }}" class="menu-item"><i class="fas fa-list"></i> Playlists</a></li>
            <li><a href="{{route('users.index')}}" class="menu-item"><i class="fas fa-user"></i> Usuarios</a></li>
    </ul>
    <ul>
        <li>    <a href="{{route('logout')}}">
            <i class="fas fa-sign-out-alt"></i> Cerrar sesión
        </a></li>
    </ul>


</aside>


<div class="main-content">
    <header>
        <h1>CISUM</h1>
<!-- <div class="profile">
            <img src="/imagen/bg.jpg" class="profile-pic">
        </div>-->
    </header>

    <div class="info-box-container">
        <div class="info-box">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-music"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Canciones</span>
                <span class="info-box-number">
                {{ $canciones }}
                </span>
            </div>
        </div>

        <div class="info-box">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-list"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Generos</span>
                <span class="info-box-number">
                {{ $generos }}
                </span>
            </div>
        </div>

        <div class="info-box">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-list"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Playlists</span>
                <span class="info-box-number">
                {{ $playlists }}
                </span>
            </div>
        </div>

        <div class="info-box">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Usuarios</span>
                <span class="info-box-number">
                {{ $users }}
                </span>
            </div>
        </div>
    </div>

</div>
</body>