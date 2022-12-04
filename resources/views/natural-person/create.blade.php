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

                {{ Form::open(['route' => 'natural-person.store', 'method' => 'POST', 'id' => 'natural__person__form', 'enctype' => 'multipart/form-data']) }}
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
                                <li><button type="button" id="prev-step" class="btn btn-secondary"><i class="fas fa-arrow-circle-left"></i> Atras</button></li>
                                {{ Form::button('Guardar <i class="far fa-save"></i>', ['type' => 'submit', 'class' => 'btn btn-success']) }}
                            </ul>
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@section('page_js')
    <script src="{{ asset('assets/js/myjs.js') }}"></script>
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


