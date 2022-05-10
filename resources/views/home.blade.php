@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div><a href="{{ route('nivel.create') }}">Crear nuevo nivel</a></div>
                <div class="card">
                    <div class="card-header bg-hands">Programa de Hands On</div>

                    <div class="card-body">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Seleccione programa</option>
                             @foreach ($niveles as $nivel)
                                <option value="{{ $nivel->id }}">{{ $nivel->nivel }}</option>                        
                            @endforeach
                          
                        </select>
                    </div>
                </div>
                <div class="text-center">PENDIENTE CONSTRUIR EL CONTENIDO DE CADA CURSO</div>
            </div>
            

        </div>
    </div>
@endsection
