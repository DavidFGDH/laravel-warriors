@extends('layouts.app')

@section('title')
    Estudiantes - Lista
@endsection

@section("content")
    <div class="row">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2 class="display-6 fw-bold mb-4">Lista de <span class="underline">estudiantes</span></h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                </div>
                <div class="col-md-3">
                    <div class="clearfix mb-3">
                        <a href="{{ route('estudiantes.create') }}" class="btn btn-success float-right">Crear Nuevo Estudiante</a>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success mt-3" id="alert">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger mt-3" id="alert">
                {{ session('error') }}
            </div>
        @endif

        <table class="table">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Edad</th>
                <th>Grupo</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->apellidos }}</td>
                    <td>{{ $estudiante->email }}</td>
                    <td>{{ $estudiante->telefono }}</td>
                    <td>{{ $estudiante->edad }}</td>
                    <td>
                        @if($estudiante->grupo)
                            {{ $estudiante->grupo->semestre }}{{ $estudiante->grupo->grupo }} {{ $estudiante->grupo->turno }}
                        @else
                            Sin grupo asignado
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ route('estudiantes.show', $estudiante->id) }}" class="btn btn-info">Ver</a>
                        <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $estudiantes->links() }}
        </div>

        <script>
            setTimeout(function() {
                document.getElementById('alert').style.display = 'none';
            }, 5000);
        </script>
    </div>
@endsection
