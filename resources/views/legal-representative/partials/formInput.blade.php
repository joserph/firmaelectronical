<div class="form-row">
    @php
        date_default_timezone_set('America/Guayaquil');
    @endphp
    {{ Form::hidden('tipo_solicitud', 1) }}
    {{ Form::hidden('fecha_ingreso', date("Y-m-d H:i:s")) }}
    {{ Form::hidden('fecha_envio', date("Y-m-d H:i:s")) }}
    {{ Form::hidden('estatus_pago', null) }}
    <div class="col-md-12 text-warning">
    (<i class="fab fa-diaspora text-warning"></i>) <em>Campo Obligatorio</em> 
    </div>
    <br>
    <div class="col-md-3">
        <div class="form-group" id="g_contenedor">
            {{ Form::label('contenedor', 'Tipo de Certificado') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::select('contenedor', [
                '0' => 'ARCHIVO .P12', 
                '1' => 'TOKEN', 
                '2' => 'NUBE'], 
                null, ['class' => 'custom-select custom-select-sm', 'id' => 'i_contenedor', 'required', 'placeholder' => 'Seleccione Certificado']) }}
            @error('contenedor')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_contenedor">
                Debe seleccionar un tipo de Certificado
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group" id="g_nombres">
            {{ Form::label('nombres', 'Nombres') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::text('nombres', null, ['class' => 'form-control form-control-sm', 'required', 'id' => 'i_nombres', 'placeholder' => 'Calos Andres', 'autocomplete' => 'off']) }}
            @error('nombres')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_nombres">
                El campo es requerido y No acepta números ni caracteres especiales
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group" id="g_apellido1">
            {{ Form::label('apellido1', 'Primer Apellido') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::text('apellido1', null, ['class' => 'form-control form-control-sm', 'required', 'id' => 'i_apellido1', 'placeholder' => 'Cardenas']) }}
            @error('apellido1')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_apellido1">
                El campo es requerido y No acepta números ni caracteres especiales
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group" id="g_apellido2">
            {{ Form::label('apellido2', 'Segundo Apellido') }}
            {{ Form::text('apellido2', null, ['class' => 'form-control form-control-sm', 'id' => 'i_apellido2', 'placeholder' => 'Pasquel']) }}
            @error('apellido2')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_apellido2">
                No acepta números ni caracteres especiales
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group" id="g_tipodocumento">
            {{ Form::label('tipodocumento', 'Documento de Identidad') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::select('tipodocumento', [
                'CEDULA' => 'CEDULA', 
                'PASAPORTE' => 'PASAPORTE'],
                null, ['class' => 'custom-select custom-select-sm', 'required', 'id' => 'i_tipodocumento', 'placeholder' => 'Seleccione Tipo Documento']) }}
            @error('tipodocumento')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_tipodocumento">
                Debe seleccionar un Documento de Identidad
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group" id="g_numerodocumento">
            {{ Form::label('numerodocumento', 'Número de Documento') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::text('numerodocumento', null, ['class' => 'form-control form-control-sm', 'maxlength' => '13', 'onblur' => 'validarDocumento("numerodocumento")', 'required', 'id' => 'i_numerodocumento', 'placeholder' => '0102698867']) }}
            @error('numerodocumento')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_numerodocumento">
                El campo es obligatorio
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group" id="g_coddactilar">
            {{ Form::label('coddactilar', 'Código Dactilar') }} 
            {{ Form::text('coddactilar', null, ['class' => 'form-control form-control-sm', 'id' => 'i_coddactilar', 'placeholder' => 'EXXXXEXXXX']) }}
            @error('coddactilar')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_coddactilar">
                No acepta caracteres especiales
            </div>
        </div>
    </div>
    {{-- <div class="col-md-3">
        <div class="form-group" id="g_con_ruc">
            {{ Form::label('con_ruc', 'Con RUC') }}
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" onclick="ruc(0)" type="radio" name="con_ruc" id="i_con_ruc_no" value="No" checked>
                <label class="form-check-label" for="i_con_ruc_no">No</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" onclick="ruc(1)" type="radio" name="con_ruc" id="i_con_ruc_si" value="Si">
                <label class="form-check-label" for="i_con_ruc_si">Si</label>
            </div>
            @error('con_ruc')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_con_ruc">
                
            </div>
        </div>
    </div> --}}
    {{-- <div class="col-md-3 b-hidden" id="b_ruc_personal">
        <div class="form-group " id="g_ruc_personal">
            {{ Form::label('ruc_personal', 'RUC Personal') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::text('ruc_personal', null, ['class' => 'form-control form-control-sm', 'maxlength' => '13', 'onblur' => 'validarDocumento("ruc_personal")', 'id' => 'i_ruc_personal', 'placeholder' => '0102698867001', 'maxlength' => '13']) }}
            @error('ruc_personal')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_ruc_personal">
                No acepta caracteres especiales
            </div>
        </div>
    </div> --}}
    <div class="col-md-3">
        <div class="form-group" id="g_sexo">
            {{ Form::label('sexo', 'Sexo') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::select('sexo', [
                'HOMBRE' => 'HOMBRE', 
                'MUJER' => 'MUJER'],
                null, ['class' => 'custom-select custom-select-sm', 'required', 'id' => 'i_sexo', 'placeholder' => 'Seleccione Sexo']) }}
            @error('sexo')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_sexo">
                Debe seleccionar Sexo
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group" id="g_fecha_nacimiento">
            {{ Form::label('fecha_nacimiento', 'Fecha de Nacimiento') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::date('fecha_nacimiento', null, ['class' => 'form-control form-control-sm', 'required', 'id' => 'i_fecha_nacimiento']) }}
            @error('fecha_nacimiento')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_fecha_nacimiento">
                
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group " id="g_nacionalidad">
            {{ Form::label('nacionalidad', 'Nacionalidad') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::text('nacionalidad', null, ['class' => 'form-control form-control-sm', 'required', 'id' => 'i_nacionalidad', 'placeholder' => 'ECUATORIANA']) }}
            @error('nacionalidad')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_nacionalidad">
                No acepta números ni caracteres especiales
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group " id="g_telfCelular">
            {{ Form::label('telfCelular', 'Teléfono Celular') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::text('telfCelular', null, ['class' => 'form-control form-control-sm', 'required', 'id' => 'i_telfCelular', 'placeholder' => '0912345678']) }}
            @error('telfCelular')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_telfCelular">
                No acepta letras ni caracteres especiales
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group " id="g_telfCelular2">
            {{ Form::label('telfCelular2', 'Teléfono Celular 2') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::text('telfCelular2', null, ['class' => 'form-control form-control-sm', 'required', 'id' => 'i_telfCelular2', 'placeholder' => '0912345678']) }}
            @error('telfCelular2')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_telfCelular2">
                No acepta letras ni caracteres especiales
            </div>
        </div>
    </div>
    {{ Form::hidden('telfFijo', '') }}
    <div class="col-md-3">
        <div class="form-group " id="g_eMail">
            {{ Form::label('eMail', 'Correo') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::email('eMail', null, ['class' => 'form-control form-control-sm', 'required', 'id' => 'i_eMail', 'placeholder' => 'correo@correo.com']) }}
            @error('eMail')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_eMail">
                Debe ingresar un correo valido
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group " id="g_eMail2">
            {{ Form::label('eMail2', 'Correo 2') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::email('eMail2', null, ['class' => 'form-control form-control-sm', 'required', 'id' => 'i_eMail2', 'placeholder' => 'correo@correo.com']) }}
            @error('eMail2')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_eMail2">
                Debe ingresar un correo valido
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group " id="g_empresa">
            {{ Form::label('empresa', 'Empresa') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::text('empresa', null, ['class' => 'form-control form-control-sm', 'required', 'id' => 'i_empresa', 'placeholder' => 'Procter & Gamble']) }}
            @error('empresa')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_empresa">
                No acepta letras ni caracteres especiales
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group " id="g_ruc_empresa">
            {{ Form::label('ruc_empresa', 'RUC Empresa') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::text('ruc_empresa', null, ['class' => 'form-control form-control-sm', 'required', 'onblur' => 'validarDocumento("ruc_empresa")', 'id' => 'i_ruc_empresa', 'placeholder' => '0102698867001']) }}
            @error('ruc_empresa')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_ruc_empresa">
                No acepta caracteres especiales
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group " id="g_cargo">
            {{ Form::label('cargo', 'Cargo') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::text('cargo', null, ['class' => 'form-control form-control-sm', 'required', 'id' => 'i_cargo', 'placeholder' => 'GERENTE GENERAL']) }}
            @error('cargo')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_cargo">
                No acepta letras ni caracteres especiales
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group" id="g_provincia">
            {{ Form::label('provincia', 'Provincia') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::select('provincia', [
                'Azuay' => 'Azuay',
                'Cañar' => 'Cañar',
                'Loja' => 'Loja',
                'Carchi' => 'Carchi',
                'Imbabura' => 'Imbabura',
                'Pichincha' => 'Pichincha',
                'Cotopaxi' => 'Cotopaxi',
                'Tungurahua' => 'Tungurahua',
                'Bolívar' => 'Bolívar',
                'Chimborazo' => 'Chimborazo',
                'Sto. Domingo de los Tsachilas' => 'Sto. Domingo de los Tsachilas',
                'Esmeraldas' => 'Esmeraldas',
                'Manabí' => 'Manabí',
                'Guayas' => 'Guayas',
                'Los Ríos' => 'Los Ríos',
                'El Oro' => 'El Oro',
                'Santa Elena' => 'Santa Elena',
                'Sucumbíos' => 'Sucumbíos',
                'Napo' => 'Napo',
                'Pastaza' => 'Pastaza',
                'Orellana' => 'Orellana',
                'Morona Santiago' => 'Morona Santiago',
                'Zamora Chinchipe' => 'Zamora Chinchipe',
                'Galápagos' => 'Galápagos',
                'Antártida Ecuatoriana' => 'Antártida Ecuatoriana'],
                null, ['class' => 'custom-select custom-select-sm', 'required', 'id' => 'i_provincia', 'placeholder' => 'Seleccione Provincia']) }}
            @error('provincia')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_provincia">
                Debe seleccionar una Provincia
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group " id="g_ciudad">
            {{ Form::label('ciudad', 'Ciudad') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::text('ciudad', null, ['class' => 'form-control form-control-sm', 'required', 'id' => 'i_ciudad', 'placeholder' => 'QUITO']) }}
            @error('ciudad')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_ciudad">
                No acepta números ni caracteres especiales
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="form-group " id="g_direccion">
            {{ Form::label('direccion', 'Dirección') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::text('direccion', null, ['class' => 'form-control form-control-sm', 'required', 'id' => 'i_direccion', 'placeholder' => 'Av. 10 DE AGOSTO N45-12 Y SELVA ALEGRE']) }}
            @error('direccion')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_direccion">
                
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group" id="g_vigenciafirma">
            {{ Form::label('vigenciafirma', 'Vigencia o Duración') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::select('vigenciafirma', [
                '1 año' => '1 año', 
                '2 años' => '2 años',
                '3 años' => '3 años', 
                '4 años' => '4 años',
                '5 años' => '5 años', 
                '7 días' => '7 días'],
                null, ['class' => 'custom-select custom-select-sm', 'required', 'id' => 'i_vigenciafirma', 'placeholder' => 'Seleccione Vigencia']) }}
            @error('vigenciafirma')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_vigenciafirma">
                Debe seleccionar la Vigencia de la Firma
            </div>
        </div>
    </div>
</div>