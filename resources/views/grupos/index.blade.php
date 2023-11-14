@extends('layouts.app')

@section('title')
    Grupos - Lista
@endsection

@section("content")
    <div class="row">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2 class="display-6 fw-bold mb-4">Lista de <span class="underline">grupos</span></h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                </div>
                <div class="col-md-3">
                    <div class="clearfix mb-3">
                        <a href="{{ route('grupos.create') }}" class="btn btn-success float-right">Crear Nuevo Grupo</a>
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
                <th>Semestre</th>
                <th>Grupo</th>
                <th>Turno</th>
                <th>Estudiantes</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($grupos as $grupo)
                <tr>
                    <td>{{ $grupo->semestre }}</td>
                    <td>{{ $grupo->grupo }}</td>
                    <td>{{ $grupo->turno }}</td>
                    <td>{{ $grupo->estudiantes->count() }}</td>

                    <td>
                        <a href="{{ route('grupos.edit', $grupo->id) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ route('grupos.show', $grupo->id) }}" class="btn btn-info">Ver</a>
                        <form action="{{ route('grupos.destroy',$grupo->id ) }}" method="POST" style="display: inline;">
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
            {{ $grupos->links() }}
        </div>

        <script>
            setTimeout(function() {
                document.getElementById('alert').style.display = 'none';
            }, 5000);
        </script>
    </div>
@endsection
