@extends('layouts.app')

@section('content')
    <div class="container">

        <div id="seleccion" class="row justify-content-center">
            <div class="col-md-8">

                @if (Auth::user()->permission == 1)
                    <div><a href="{{ route('nivel.create') }}">Crear nuevo nivel</a></div>
                @endif


                <div class="card">

                    <div class="card-header bg-primary text-white">Programa de Hands On</div>
                    @if (session()->has('message'))
                        <div class="text-center">
                            <p class="alert-info">
                                {{ session()->get('message') }}
                            </p>
                        </div>
                    @endif
                    <div class="card-body">
                        <select id="selectNivel" class="form-select" aria-label="Default select example"
                            onchange="selectProgram()">
                            <option value="0">Seleccione programa</option>
                            @foreach ($niveles as $nivel)
                                <option value="{{ $nivel->id_nivel }}">{{ $nivel->nivel }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <input name="permiso" id="permiso" type="hidden" value="{{ Auth::user()->permission }}" />
                <div class=" p-3">
                    @if (Auth::user()->permission == 1)
                        <a class="btn btn-primary d-none" id="create_week">Crear contenido</a>
                    @endif
                    <div class="d-flex align-items-start p-5">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical"></div>
                        <div class="tab-content" id="v-pills-tabContent"></div>

                    </div>
                </div>


            </div>


        </div>
        <div id="creacion" class="row justify-content-center d-none">
            <div class="col-md-8">
                <h2 class="text-center" id="nombre_nivel"></h2>
                <div class="card p-5">
                    <div class="p-2"><a class="btn btn-secondary" href="/home">Volver</a></div>
                    <div class="card-body fondo_rojo">
                        <form>

                            <p>
                                <select class="form-select fw-bold selectProgram" name="numero_semana">
                                    <option value="1">Semana 1</option>
                                    <option value="2">Semana 2</option>
                                    <option value="3">Semana 3</option>
                                    <option value="4">Semana 4</option>
                                    <option value="5">Semana 5</option>
                                    <option value="6">Semana 6</option>
                                    <option value="7">Semana 7</option>
                                    <option value="8">Semana 8</option>
                                    <option value="9">Semana 9</option>
                                    <option value="10">Semana 10</option>
                                    <option value="11">Semana 11</option>
                                    <option value="12">Semana 12</option>
                                    <option value="13">Semana 13</option>
                                    <option value="14">Semana 14</option>
                                    <option value="15">Semana 15</option>
                                </select>
                            </p>
                            <div class="form-group">
                                <label for="introduccion" class="text-white fw-bold">Nuevo plan</label>
                                <textarea class="ckeditor form-control" id="contenido" name="wysiwyg-editor"></textarea>
                            </div>
                            <div class="form-group p-4">
                                <label for="introduccion" class="text-white fw-bold">Video sobre las instrúcciones para los
                                    profesores de Hands On</label>
                                <input type="text" class="form-control" name="codigo" placeholder="Código Youtube"
                                    autocomplete="off">
                            </div>
                            <div class=" text-center mt-2">
                                <button type="button" id="crear"
                                    class="btn btn-primary text-white fw-bold">CREAR</button>
                            </div>

                        </form>
                    </div>
                    <div class="p-3"></div>

                    <div class="alert alert-danger d-none">
                        <ul>

                            <li class="mensaje_error"></li>

                        </ul>
                    </div>

                </div>

            </div>


        </div>
        @if (Auth::user()->permission == 0)
            <style>
                .boton_editar {
                    display: none;
                }
            </style>
        @endif
    @endsection
