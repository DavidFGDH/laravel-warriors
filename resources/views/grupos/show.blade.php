@extends('layouts.app')

@section('title')
    Detalles del Grupo
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2 class="display-6 fw-bold mb-4">Detalles del <span class="underline">grupo</span></h2>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card p-3 p-xl-4">
                <p><strong>Semestre:</strong> {{ $grupo->semestre }}</p>
                <p><strong>Código de Grupo:</strong> {{ $grupo->grupo }}</p>
                <p><strong>Turno:</strong> {{ $grupo->turno }}</p>

                <div class="mt-4">
                    <h4 class="mb-3">Estudiantes del Grupo</h4>
                    @if($grupo->estudiantes->count() > 0)
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Email</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($grupo->estudiantes as $estudiante)
                                <tr>
                                    <td>{{ $estudiante->nombre }}</td>
                                    <td>{{ $estudiante->apellidos }}</td>
                                    <td>{{ $estudiante->email }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No hay estudiantes en este grupo.</p>
                    @endif
                </div>

                <div class="mt-3">
                    <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Volver a la lista</a>
                </div>
            </div>
        </div>
    </div>
@endsection
