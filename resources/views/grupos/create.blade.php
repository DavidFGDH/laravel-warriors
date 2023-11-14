@extends('layouts.app')

@section('title')
    Grupos - Crear
@endsection

@section('content')
            <div class="row">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="display-6 fw-bold mb-4">Crear un nuevo <span class="underline">grupo</span></h2>
                    <p class="text-muted">Escribe los datos del nuevo grupo.</p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                    <div>
                        <form action="{{ route("grupos.store") }}" class="p-3 p-xl-4" method="post" data-bs-theme="light">
                            @csrf

                            <div class="mb-3">
                                <input class="shadow form-control @error('semestre') is-invalid @enderror" type="number"
                                       id="semestre" name="semestre" placeholder="Semestre" value="{{ old('semestre') }}">
                                @error('semestre')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <input class="shadow form-control @error('grupo') is-invalid @enderror" type="text" id="grupo"
                                       name="grupo" placeholder="Codigo de grupo: A" value="{{ old('grupo') }}">
                                @error('grupo')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <select class="shadow form-control form-select @error('turno') is-invalid @enderror"
                                        aria-label="turno" name="turno" id="turno">
                                    <option selected>Selecciona el turno del grupo</option>
                                    <option value="Matutino">Matutino</option>
                                    <option value="Vespertino">Vespertino</option>
                                    <option value="Nocturno">Nocturno</option>
                                </select>
                                @error('turno')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div>
                                <button class="btn btn-primary shadow d-block w-100" type="submit">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

@endsection
