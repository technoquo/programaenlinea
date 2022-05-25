@extends('layouts.app')

@section('content')

    <div class="container">  
        <div id="actualizar" class="row justify-content-center">
            <div class="col-md-8">
                <h2 class="text-center">Actualizar</h2>
                <div class="card p-5">
                    <div class="p-2"><a class="btn btn-secondary" href="/home">Volver</a></div>
                    <div class="card-body fondo_rojo">
                        <form action="/semanas/{{ $plan->id_semana }}" method="POST">
                            @csrf
                             @method('PUT')
                            <p>
                                <select class="form-select fw-bold selectProgram" name="numero_semana">
                                    <option value="1"  @if ($plan->semana == 1) selected @endif >Semana 1</option>
                                    <option value="2"  @if ($plan->semana == 2) selected @endif >Semana 2</option>
                                    <option value="3"  @if ($plan->semana == 3) selected @endif>Semana 3</option>
                                    <option value="4"  @if ($plan->semana == 4) selected @endif>Semana 4</option>
                                    <option value="5"  @if ($plan->semana == 5) selected @endif>Semana 5</option>
                                    <option value="6"  @if ($plan->semana == 6) selected @endif>Semana 6</option>
                                    <option value="7"  @if ($plan->semana == 7) selected @endif>Semana 7</option>
                                    <option value="8"  @if ($plan->semana == 8) selected @endif>Semana 8</option>
                                    <option value="9"  @if ($plan->semana == 9) selected @endif>Semana 9</option>
                                    <option value="10" @if ($plan->semana == 10) selected @endif>Semana 10</option>
                                    <option value="11" @if ($plan->semana == 11) selected @endif>Semana 11</option>
                                    <option value="11" @if ($plan->semana == 12) selected @endif>Semana 12</option>
                                </select>
                            </p>
                            <div class="form-group">
                                <label for="introduccion" class="text-white fw-bold">Nuevo plan</label>
                                <textarea class="ckeditor form-control" id="contenido" name="wysiwyg-editor">{{ $plan->contenido }}</textarea>
                            </div>
                            <div class="form-group p-4">
                                <label for="introduccion" class="text-white fw-bold">Video sobre las instrúcciones para los profesores de Hands On</label>
                                <input type="text" class="form-control" name="codigo" placeholder="Código Youtube"
                                 value="{{ $plan->codigo_video }}" autocomplete="off">
                            </div>
                            <div class=" text-center mt-2">
                                <button type="submit"
                                    class="btn btn-primary text-white fw-bold">Actualizar</button>
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
    @endsection
