<!-- filepath: c:\xampp\htdocs\laravel\criolloDorado\resources\views\sheds\update.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Editar Lista</h2>

        <!-- Mostrar errores de validación -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario para editar un registro -->
        <form action="{{ route('sheds.update', $shed->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Método PUT para actualizar -->
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $shed->name }}" required>
            </div>
            <div class="mb-3">
                <label for="batch" class="form-label">Lote</label>
                <input type="text" class="form-control" id="batch" name="batch" value="{{ $shed->batch }}" required>
            </div>
            <div class="mb-3">
                <label for="entryDate" class="form-label">Fecha de Entrada</label>
                <input type="date" class="form-control" id="entryDate" name="entryDate" value="{{ $shed->entryDate }}" required>
            </div>
            <div class="mb-3">
                <label for="departureDate" class="form-label">Fecha de Salida</label>
                <input type="date" class="form-control" id="departureDate" name="departureDate" value="{{ $shed->departureDate }}" required>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('sheds.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection