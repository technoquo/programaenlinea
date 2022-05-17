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
                <div class=" p-3">
                    @if (Auth::user()->permission == 1)
                        <a class="btn btn-primary d-none" id="create_week">Crear contenido</a>
                    @endif
                    <div class="d-flex align-items-start d-none">
                        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">Semana 1</button>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                                aria-selected="false">Semana 2</button>
                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages"
                                aria-selected="false">Semana 3</button>
                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings"
                                aria-selected="false">Semana 4</button>
                        </div>
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <div class="form-group">
                                    <textarea class="ckeditor form-control" name="wysiwyg-editor"></textarea>
                                </div>



                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab">fasdfadsf</div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                aria-labelledby="v-pills-messages-tab">fadsfdsa</div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                aria-labelledby="v-pills-settings-tab">fasdfsa</div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <div id="creacion" class="row justify-content-center d-none">
            <div class="col-md-8">
                <h2 class="text-center" id="nombre_nivel"></h2>
                <div class="card p-5">
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
                                    <option value="11">Semana 12</option>
                                </select>
                            </p>
                            <div class="form-group">
                                <textarea class="ckeditor form-control" id="contenido" name="wysiwyg-editor"></textarea>
                            </div>
                            <div class="form-group p-4">
                                <input type="text" class="form-control" name="codigo" placeholder="Código Youtube"
                                    autocomplete="off">
                            </div>
                            <div class=" text-center mt-2">
                                <button type="button" id="crear" class="btn btn-primary text-white fw-bold">CREAR</button>
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
    </div>
@endsection
