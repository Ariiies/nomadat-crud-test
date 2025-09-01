{{-- 1. Le decimos a Blade que esta vista extiende la plantilla 'layouts.app' --}}
@extends('layouts.app')

{{-- 2. Definimos el contenido para la sección 'title' que está en la plantilla --}}
@section('title', 'Bienvenida')

{{-- 3. Definimos el contenido para la sección 'content' de la plantilla. --}}
{{-- Todo lo que pongas aquí se insertará en el @yield('content') de la plantilla base. --}}
@section('content')
    <div class="relative min-h-screen flex flex-col items-center justify-center -mt-16"> {{-- -mt-16 es un ajuste opcional para centrar mejor verticalmente --}}
        <div class="max-w-2xl mx-auto text-center p-6">
            <h1 class="text-4xl font-bold text-blue-400 mb-4 sm:text-5xl">
                Prueba tecnica de Luis Aries Meza Castillo
            </h1>
            <p class="text-lg text-white mb-8">
                Esta es una aplicación CRUD simple para gestionar productos, creada con Laravel y Livewire.
            </p>
            <a href="{-{ route('products') }}" 
               class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg text-lg transition duration-300 ease-in-out transform hover:scale-105">
                Ir al CRUD de Productos
            </a>
            
        </div>
    </div>
@endsection