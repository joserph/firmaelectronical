<div class="form-row">
    <div class="col-md-6">
        <div class="form-group" id="g_contenido">
            {{ Form::label('contenido', 'Contenido') }}
            {{ Form::text('contenido', null, ['class' => 'form-control', 'required', 'id' => 'i_contenido']) }}
            @error('contenido')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_contenido">
                Error x
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('telefono', 'Telefono') }}
            {{ Form::text('telefono', null, ['class' => 'form-control', 'required', 'id' => 'i_telefono']) }}
            @error('telefono')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_telefono">
                Error x
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null, ['class' => 'form-control', 'required', 'id' => 'i_email']) }}
            @error('email')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_email">
                Error x
            </div>
        </div>
    </div>
</div>