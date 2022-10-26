<div class="row">
    <div class="col-sm-6">
        <div class="form-group ">
            {{ Form::label('name', 'Nombre') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            {{ Form::label('email', 'E-mail') }}
            {{ Form::email('email', null, ['class' => 'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {{ Form::label('password', 'Contraseña') }}
            {{ Form::password('password', ['class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            {{ Form::label('confirm-password', 'Confirmar Contraseña') }}
            {{ Form::password('confirm-password', ['class' => 'form-control']) }}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            {{ Form::label('roles', 'Roles') }}
            {{ Form::select('roles', $roles, null, ['class' => 'form-control', 'placeholder' => 'Seleccione rol']) }}
        </div>
    </div>
    <div class="col-sm-6">
        
    </div>
</div>