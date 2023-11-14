@extends('layouts.app')

@section('title')
    Detalles del Estudiante
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-xl-8 text-center mx-auto">
            <h2 class="display-6 fw-bold mb-4">Detalles de <span class="underline">estudiante</span></h2>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $estudiante->nombre }} {{ $estudiante->apellidos }}</h5>
                    <p class="card-text"><strong>Correo Electrónico:</strong> {{ $estudiante->email }}</p>
                    <p class="card-text"><strong>Teléfono:</strong> {{ $estudiante->telefono }}</p>
                    <p class="card-text"><strong>Edad:</strong> {{ $estudiante->edad }}</p>
                    <p class="card-text">
                        <strong>Grupo:</strong>
                        @if($estudiante->grupo)
                            {{ $estudiante->grupo->semestre }}{{ $estudiante->grupo->grupo }} {{ $estudiante->grupo->turno }}
                        @else
                            Sin grupo asignado
                        @endif
                    </p>
                    <div class="mt-3 d-flex">
                        <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary mx-2">Volver a la Lista</a>

                        <!-- Nuevo botón para ver detalles del grupo -->
                        @if($estudiante->grupo)
                            <a href="{{ route('grupos.show', $estudiante->grupo->id) }}" class="btn btn-info">Detalles del Grupo</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
