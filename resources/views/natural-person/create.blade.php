@extends('layouts.app')
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/mystyle.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
@endsection
@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Crear Firma Persona Natural</li>
        </ol>
    </nav>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Persona Natural</h1>
    
    <!-- //////////////// -->
    <br>
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="wizard">
                <div class="wizard-inner">
                    <div class="connecting-line"></div>
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" id="li_step_1" class="active">
                            <a href="#step1" data-toggle="tab" id="step_1" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1</span> <i>Datos Personales</i></a>
                        </li>
                        <li role="presentation" id="li_step_2" class="disabled">
                            <a href="#step2" data-toggle="tab" id="step_2" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span> <i>Archivos Adjuntos</i></a>
                        </li>
                    </ul>
                </div>

                {{ Form::open(['route' => 'blogs.store', 'method' => 'POST', 'id' => 'natural__person__form']) }}
                    <div class="tab-content" id="main_form">
                        <div class="tab-pane active" role="tabpanel" id="step1">
                            @include('natural-person.partials.formInput')
                            <ul class="list-inline pull-right">
                                <li><button type="button" id="next-step" class="btn btn-primary">Siguiente <i class="fas fa-arrow-circle-right"></i></button></li>
                            </ul>
                        </div>
                        <div class="tab-pane" role="tabpanel" id="step2">
                            @include('natural-person.partials.formField')
                            <ul class="list-inline pull-right">
                                <li><button type="button" id="prev-step" class="btn btn-secondary">Atras</button></li>
                                <li><button type="submit" class="btn btn-success">Guardar</button></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@section('page_js')
    <script src="{{ asset('assets/js/myjs.js') }}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                theme: 'bootstrap'
            });
        });
    </script>
@endsection
@endsection


