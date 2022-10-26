@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Crear Permiso</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
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

                            {{ Form::open(['route' => 'permissions.store', 'method' => 'POST']) }}
                                @include('permission.partials.form')
                                <div class="row">
                                    <div class="col-sm-12">
                                        {{ Form::button('<i class="far fa-save"></i> Guardar', ['type' => 'submit', 'class' => 'btn btn-primary']) }}
                                    </div>
                                </div>
                                
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

