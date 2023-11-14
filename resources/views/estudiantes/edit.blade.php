@extends('layouts.app')

@section('title')
    Editar Estudiante
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2 class="display-6 fw-bold mb-4">Editar <span class="underline">estudiante</span></h2>
            <p class="text-muted">Modifica los datos del estudiante.</p>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div>
                <form action="{{ route('estudiantes.update', $estudiante->id) }}" class="p-3 p-xl-4" method="post" data-bs-theme="light">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input class="shadow form-control @error('nombre') is-invalid @enderror" type="text"
                               id="nombre" name="nombre" placeholder="Nombre" value="{{ old('nombre', $estudiante->nombre) }}">
                        @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input class="shadow form-control @error('apellidos') is-invalid @enderror" type="text"
                               id="apellidos" name="apellidos" placeholder="Apellidos" value="{{ old('apellidos', $estudiante->apellidos) }}">
                        @error('apellidos')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input class="shadow form-control @error('email') is-invalid @enderror" type="email"
                               id="email" name="email" placeholder="Correo Electrónico" value="{{ old('email', $estudiante->email) }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input class="shadow form-control @error('telefono') is-invalid @enderror" type="tel"
                               id="telefono" name="telefono" placeholder="Teléfono" value="{{ old('telefono', $estudiante->telefono) }}">
                        @error('telefono')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input class="shadow form-control @error('edad') is-invalid @enderror" type="number"
                               id="edad" name="edad" placeholder="Edad" value="{{ old('edad', $estudiante->edad) }}">
                        @error('edad')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="grupo_id" class="form-label">Grupo</label>
                        <select class="shadow form-control form-select @error('grupo_id') is-invalid @enderror"
                                aria-label="grupo_id" name="grupo_id" id="grupo_id">
                            <option>Selecciona el grupo</option>
                            @foreach($grupos as $grupo)
                                <option value="{{ $grupo->id }}" {{ old('grupo_id', $estudiante->grupo_id) == $grupo->id ? 'selected' : '' }}>
                                    {{ $grupo->semestre }}{{ $grupo->grupo }}/{{$grupo->turno}}
                                </option>
                            @endforeach
                        </select>
                        @error('grupo_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <button class="btn btn-primary shadow d-block w-100" type="submit">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
