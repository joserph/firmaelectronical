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
          <li class="breadcrumb-item active" aria-current="page">Crear Firma Miembro de Empresa</li>
        </ol>
    </nav>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Miembro de Empresa</h1>
    
    <!-- //////////////// -->
    <br>
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                    <strong>¡Revise los campos!</strong>
                    @foreach ($errors->all() as $error)
                        <span class="badge badge-danger">{{ $error }}</span>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="wizard">
                <div class="stepwizard">
                    <div class="stepwizard-row setup-panel">
                        <div class="stepwizard-step">
                            <a href="#step-1" type="button" class="btn btn-primary">Datos Personales</a>
                        </div>
                        <div class="stepwizard-step">
                            <a href="#step-2" type="button" class="btn btn-secondary step-2 disabled" disabled="disabled">Adjuntos</a>
                        </div>
                    </div>
                </div>
                {{ Form::open(['route' => 'company-member.store', 'method' => 'POST', 'id' => 'natural__person__form', 'enctype' => 'multipart/form-data']) }}
                    <div class="row setup-content" id="step-1">
                        <div class="col-xs-6 col-md-offset-3">
                            <div class="col-md-12">
                                @include('company-member.partials.formInput')
                                <ul class="list-inline pull-right">
                                    <button class="btn btn-primary nextBtn pull-right" id="nextBtm" type="button">Siguiente <i class="fas fa-arrow-circle-right"></i></button>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-2">
                        <div class="col-xs-6 col-md-offset-3">
                            <div class="col-md-12">
                                @include('company-member.partials.formField')
                                <ul class="list-inline pull-right">
                                    <button class="btn btn-secondary prevBtn pull-left" type="button"><i class="fas fa-arrow-circle-left"></i> Atras</button>
                                    {{-- <button class="btn btn-primary nextBtn pull-right" type="button">Next</button> --}}
                                    {{ Form::button('Guardar <i class="far fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-success nextBtn']) }}
                                </ul>
                            </div>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@section('page_js')
    <script src="{{ asset('assets/js/myjs.js') }}"></script>
    <script src="{{ asset('assets/js/stepwizard.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('save') == 'true')
        <script>
            Swal.fire({
                title: '¡Tu tramite fue subido con éxito!',
                html: 'Si necesitas saber el estado de tu tramite o enviar el pago da click <a href=\"https://wa.me/message/X6UL7Y5D6MS4F1\" target=\"_blank\">AQUÍ</a> ',
                icon: 'success',
                allowOutsideClick: false,
                imageUrl: 'web/public/img/working.png',
                imageWidth: '100px',
                imageAlt: 'Estamos trabajando',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
                }).then((result) => {
                if (result.isConfirmed) {
                    
                }
            });
        </script>
    @endif
@endsection
@endsection


