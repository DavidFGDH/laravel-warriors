@extends('layouts.app')

@section('title')
    Grupos - Editar
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2 class="display-6 fw-bold mb-4">Editar <span class="underline">grupo</span></h2>
            <p class="text-muted">Modifica los datos del grupo.</p>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div>
                <form action="{{ route('grupos.update', $grupo->id) }}" class="p-3 p-xl-4" method="post" data-bs-theme="light">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <input class="shadow form-control @error('semestre') is-invalid @enderror" type="number"
                               id="semestre" name="semestre" placeholder="Semestre" value="{{ old('semestre', $grupo->semestre) }}">
                        @error('semestre')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <input class="shadow form-control @error('grupo') is-invalid @enderror" type="text" id="grupo"
                               name="grupo" placeholder="Codigo de grupo: A" value="{{ old('grupo', $grupo->grupo) }}">
                        @error('grupo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <select class="shadow form-control form-select @error('turno') is-invalid @enderror"
                                aria-label="turno" name="turno" id="turno">
                            <option disabled>Selecciona el turno del grupo</option>
                            <option value="Matutino" {{ old('turno', $grupo->turno) == 'Matutino' ? 'selected' : '' }}>Matutino</option>
                            <option value="Vespertino" {{ old('turno', $grupo->turno) == 'Vespertino' ? 'selected' : '' }}>Vespertino</option>
                            <option value="Nocturno" {{ old('turno', $grupo->turno) == 'Nocturno' ? 'selected' : '' }}>Nocturno</option>
                        </select>
                        @error('turno')
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
