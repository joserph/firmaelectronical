@extends('layouts.app')
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/mystyle.css') }}">
@endsection
@section('content')
<div class="container-fluid">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('natural-person.index') }}">Firmas Persona Natural</a></li>
          <li class="breadcrumb-item active" aria-current="page">Crear Firma Persona Natural</li>
        </ol>
    </nav>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pernosa Natural</h1>
    
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
                                    <h4 class="text-center">Step 1</h4>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {{ Form::label('contenido', 'Contenido') }}
                                                {{ Form::text('contenido', null, ['class' => 'form-control is-valid', 'required', 'id' => 'g_contenido']) }}
                                                @error('contenido')
                                                    <div class="invalid-feedback">
                                                        Error x
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Number  *</label> 
                                                <input class="form-control" type="text" name="name" placeholder=""> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Address *</label> 
                                                <input class="form-control" type="email" name="name" placeholder=""> 
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Password *</label> 
                                                <input class="form-control" type="password" name="name" placeholder=""> 
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" id="next-step" class="btn btn-primary">Siguiente</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="step2">
                                    <h4 class="text-center">Step 2</h4>
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Address 1 *</label> 
                                            <input class="form-control" type="text" name="name" placeholder=""> 
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City / Town *</label> 
                                            <input class="form-control" type="text" name="name" placeholder=""> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Country *</label> 
                                            <select name="country" class="form-control" id="country">
                                                <option value="NG" selected="selected">Nigeria</option>
                                                <option value="NU">Niue</option>
                                                <option value="NF">Norfolk Island</option>
                                                <option value="KP">North Korea</option>
                                                <option value="MP">Northern Mariana Islands</option>
                                                <option value="NO">Norway</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Registration No.</label> 
                                            <input class="form-control" type="text" name="name" placeholder=""> 
                                        </div>
                                    </div>
                                   </div>
                                    
                                    
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
@endsection
@endsection


