@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tabla con Bootstrap</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container mt-5">
            <!-- Botón para crear una nueva lista -->
            <div class="mb-3">
                <a href="{{ route('sheds.create') }}" class="btn btn-primary">Crear Nueva Lista</a>
            </div>

            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Batch</th>
                        <th scope="col">EntryDate</th>
                        <th scope="col">DepartureDate</th>
                        <th scope="col">Acciones</th> <!-- Nueva columna para botones -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sheds as $shed)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $shed->name }}</td>
                            <td>{{ $shed->batch }}</td>
                            <td>{{ $shed->entryDate }}</td>
                            <td>{{ $shed->departureDate }}</td>
                            <td>
                                <!-- Botón para editar -->
                                <a href="{{ route('sheds.edit', $shed->id) }}" class="btn btn-warning btn-sm">Editar</a>

                                <!-- Botón para eliminar -->
                                <form action="{{ route('sheds.destroy', $shed->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
@endsection
