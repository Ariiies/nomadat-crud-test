@extends('layouts.app')

@section('title', 'Prueba Técnica')

@section('content')
    <div class="max-w-2xl mx-auto text-center p-6">
        <h1 class="text-4xl font-bold text-blue-400 mb-4 sm:text-5xl">
            Prueba tecnica de Luis Aries Meza Castillo
        </h1>
        <p class="text-lg text-white mb-8">
            Esta es una aplicación CRUD simple para gestionar productos, creada con Laravel y Livewire.
        </p>
        <a href="{{ route('products.index') }}" 
           class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-lg transition duration-300 ease-in-out transform hover:scale-105">
            Ir al CRUD de Productos
        </a>
    </div>
@endsection