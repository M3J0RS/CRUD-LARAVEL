<!-- filepath: c:\xampp\htdocs\laravel\criolloDorado\resources\views\sheds\create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Crear Nueva Lista</h2>

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

        <!-- Formulario para crear un nuevo registro -->
        <form action="{{ route('sheds.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" value="Pollo" class="form-control" id="name" name="name" placeholder="Ingrese el nombre" required>
            </div>
            <div class="mb-3">
                <label for="batch" class="form-label">Lote</label>
                <input type="text" value="Lote"class="form-control" id="batch" name="batch" placeholder="Ingrese el lote" required>
            </div>
            <div class="mb-3">
                <label for="entryDate" class="form-label">Fecha de Entrada</label>
                <input type="date" class="form-control" id="entryDate" name="entryDate" required>
            </div>
            <div class="mb-3">
                <label for="departureDate" class="form-label">Fecha de Salida</label>
                <input type="date" class="form-control" id="departureDate" name="departureDate" required>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('sheds.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection