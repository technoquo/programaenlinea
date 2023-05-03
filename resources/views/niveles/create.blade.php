@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-hands p-5">
                <form action="/niveles" method="POST">
                     @csrf                           
                    <div class="mb-3">
                        <label for="nombre_nivel" class="form-label text-white fw-bold">Nuevo Nivel</label>
                        <input type="text" class="form-control" name="nombre_nivel" aria-describedby="crearNivel" autocomplete="off">                     
                    </div>               
                    <button type="submit" class="btn btn-primary">Crear</button>
                </form>
                </div>
                <div class="p-3"></div>
                 @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
               
        </div>
    </div>
@endsection
