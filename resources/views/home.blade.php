@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (Auth::user()->permission == 1)
                    <div><a href="{{ route('nivel.create') }}">Crear nuevo nivel</a></div>
                @endif


                <div class="card">
                    <div class="card-header bg-primary text-white">Programa de Hands On</div>

                    <div class="card-body">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Seleccione programa</option>
                            @foreach ($niveles as $nivel)
                                <option value="{{ $nivel->id }}">{{ $nivel->nivel }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class=" p-3">
                    @if (Auth::user()->permission == 1)
                    <button class="btn btn-primary">Crear Semanas</button>
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
    </div>
@endsection
