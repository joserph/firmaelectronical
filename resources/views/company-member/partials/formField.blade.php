<div class="form-row">
    <div class="col-md-12 text-warning">
        (<i class="fab fa-diaspora text-warning"></i>) <em>Campo Obligatorio</em> 
    </div>
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>
                    <div class="col-md-12">
                        {{ Form::label('f_cedulaFront', 'Foto Cédula Frontal (Formato .jpg)') }} <i class="fab fa-diaspora text-warning"></i>
                        <div class="custom-file">
                            <input type="file" name="f_cedulaFront" class="custom-file-input" accept=".jpg,.jpeg" id="f_cedulaFront" required onchange="validateInputFileImg('f_cedulaFront')">
                            <label class="custom-file-label" for="f_cedulaFront" data-browse="Elegir">Seleccionar Imagen</label>
                          </div>
                        @error('f_cedulaFront')
                            {{ $message }}
                        @enderror
                        <div class="nvalid-feedback2" id="error_f_cedulaFront">
                            
                        </div>
                    </div>
                </th>
                <td>
                    <div class="col-md-12">
                        <div id="visor_f_cedulaFront"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <div class="col-md-12">
                        {{ Form::label('f_cedulaBack', 'Foto Cédula Posterior (Formato .jpg)') }} <i class="fab fa-diaspora text-warning"></i>
                        <div class="custom-file">
                            <input type="file" name="f_cedulaBack" class="custom-file-input" accept=".jpg,.jpeg" id="f_cedulaBack" required onchange="validateInputFileImg('f_cedulaBack')">
                            <label class="custom-file-label" for="f_cedulaBack" data-browse="Elegir">Seleccionar Imagen</label>
                          </div>
                        @error('f_cedulaBack')
                            {{ $message }}
                        @enderror
                        <div class="nvalid-feedback2" id="error_f_cedulaBack">
                            
                        </div>
                    </div>
                </th>
                <td>
                    <div class="col-md-12">
                        <div id="visor_f_cedulaBack"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <div class="col-md-12">
                        {{ Form::label('f_selfie', 'Foto Tipo Selfie (Formato .jpg)') }} <i class="fab fa-diaspora text-warning"></i>
                        <div class="custom-file">
                            <input type="file" name="f_selfie" class="custom-file-input" accept=".jpg,.jpeg" id="f_selfie" required onchange="validateInputFileImg('f_selfie')">
                            <label class="custom-file-label" for="f_selfie" data-browse="Elegir">Seleccionar Imagen</label>
                          </div>
                        @error('f_selfie')
                            {{ $message }}
                        @enderror
                        <div class="nvalid-feedback2" id="error_f_selfie">
                            
                        </div>
                    </div>
                </th>
                <td>
                    <div class="col-md-12">
                        <div id="visor_f_selfie"></div>
                    </div>
                </td>
            </tr>
            <tr id="g_f_copiaruc">
                <th>
                    <div class="col-md-12">
                        {{ Form::label('f_copiaruc', 'Copia RUC (Formato .pdf)') }} <i class="fab fa-diaspora text-warning"></i>
                        <div class="custom-file">
                            <input type="file" name="f_copiaruc" class="custom-file-input" accept=".pdf" id="f_copiaruc" required onchange="validateInputFilePdf('f_copiaruc')">
                            <label class="custom-file-label" for="f_copiaruc" data-browse="Elegir">Seleccionar PDF</label>
                          </div>
                        @error('f_copiaruc')
                            {{ $message }}
                        @enderror
                        <div class="nvalid-feedback2" id="error_f_copiaruc">
                            
                        </div>
                    </div>
                </th>
                <td>
                    <div class="col-md-12">
                        <div id="visor_f_copiaruc"></div>
                    </div>
                </td>
            </tr>
            <tr id="g_f_nombramiento">
                <th>
                    <div class="col-md-12">
                        {{ Form::label('f_nombramiento', 'Acta de Nombramiento (Carta aceptación) (Formato .pdf)') }} <i class="fab fa-diaspora text-warning"></i>
                        <div class="custom-file">
                            <input type="file" name="f_nombramiento" class="custom-file-input" accept=".pdf" id="f_nombramiento" required onchange="validateInputFilePdf('f_nombramiento')">
                            <label class="custom-file-label" for="f_nombramiento" data-browse="Elegir">Seleccionar PDF</label>
                          </div>
                        @error('f_nombramiento')
                            {{ $message }}
                        @enderror
                        <div class="nvalid-feedback2" id="error_f_nombramiento">
                            
                        </div>
                    </div>
                </th>
                <td>
                    <div class="col-md-12">
                        <div id="visor_f_nombramiento"></div>
                    </div>
                </td>
            </tr>
            <tr id="g_f_nombramiento2">
                <th>
                    <div class="col-md-12">
                        {{ Form::label('f_nombramiento2', 'Acta de Nombramiento (Registro Mercantil o ente regulador) – (No obligatorio si está en un solo archivo en el campo anterior) (Formato .pdf)') }} 
                        <div class="custom-file">
                            <input type="file" name="f_nombramiento2" class="custom-file-input" accept=".pdf" id="f_nombramiento2" onchange="validateInputFilePdf('f_nombramiento2')">
                            <label class="custom-file-label" for="f_nombramiento2" data-browse="Elegir">Seleccionar PDF</label>
                          </div>
                        @error('f_nombramiento2')
                            {{ $message }}
                        @enderror
                        <div class="nvalid-feedback2" id="error_f_nombramiento2">
                            
                        </div>
                    </div>
                </th>
                <td>
                    <div class="col-md-12">
                        <div id="visor_f_nombramiento2"></div>
                    </div>
                </td>
            </tr>
            <tr id="g_f_constitucion">
                <th>
                    <div class="col-md-12">
                        {{ Form::label('f_constitucion', 'Acta Constitución (Formato .pdf)') }} <i class="fab fa-diaspora text-warning"></i>
                        <div class="custom-file">
                            <input type="file" name="f_constitucion" class="custom-file-input" accept=".pdf" id="f_constitucion" required onchange="validateInputFilePdf('f_constitucion')">
                            <label class="custom-file-label" for="f_constitucion" data-browse="Elegir">Seleccionar PDF</label>
                          </div>
                        @error('f_constitucion')
                            {{ $message }}
                        @enderror
                        <div class="nvalid-feedback2" id="error_f_constitucion">
                            
                        </div>
                    </div>
                </th>
                <td>
                    <div class="col-md-12">
                        <div id="visor_f_constitucion"></div>
                    </div>
                </td>
            </tr>
            <tr id="g_f_documentoRL">
                <th>
                    <div class="col-md-12">
                        {{ Form::label('f_documentoRL', 'Documento RL (Formato .pdf)') }} <i class="fab fa-diaspora text-warning"></i>
                        <div class="custom-file">
                            <input type="file" name="f_documentoRL" class="custom-file-input" accept=".pdf" id="f_documentoRL" required onchange="validateInputFilePdf('f_documentoRL')">
                            <label class="custom-file-label" for="f_documentoRL" data-browse="Elegir">Seleccionar PDF</label>
                          </div>
                        @error('f_documentoRL')
                            {{ $message }}
                        @enderror
                        <div class="nvalid-feedback2" id="error_f_documentoRL">
                            
                        </div>
                    </div>
                </th>
                <td>
                    <div class="col-md-12">
                        <div id="visor_f_documentoRL"></div>
                    </div>
                </td>
            </tr>
            <tr id="g_f_autreprelegal">
                <th>
                    <div class="col-md-12">
                        {{ Form::label('f_autreprelegal', 'Autorización RL (Formato .pdf)') }} <i class="fab fa-diaspora text-warning"></i>
                        <div class="custom-file">
                            <input type="file" name="f_autreprelegal" class="custom-file-input" accept=".pdf" id="f_autreprelegal" required onchange="validateInputFilePdf('f_autreprelegal')">
                            <label class="custom-file-label" for="f_autreprelegal" data-browse="Elegir">Seleccionar PDF</label>
                          </div>
                        @error('f_autreprelegal')
                            {{ $message }}
                        @enderror
                        <div class="nvalid-feedback2" id="error_f_autreprelegal">
                            
                        </div>
                    </div>
                </th>
                <td>
                    <div class="col-md-12">
                        <div id="visor_f_autreprelegal"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>
                    <div class="col-md-12">
                        {{ Form::label('f_adicional1', 'Documento Opcional Autorización Partner (Formato .pdf)') }}
                        <div class="custom-file">
                            <input type="file" name="f_adicional1" class="custom-file-input" accept=".pdf" id="f_adicional1" onchange="validateInputFilePdf('f_adicional1')">
                            <label class="custom-file-label" for="f_adicional1" data-browse="Elegir">Seleccionar PDF</label>
                          </div>
                        @error('f_adicional1')
                            {{ $message }}
                        @enderror
                        <div class="nvalid-feedback2" id="error_f_adicional1">
                            
                        </div>
                    </div>
                </th>
                <td>
                    <div class="col-md-12">
                        <div id="visor_f_adicional1"></div>
                    </div>
                </td>
            </tr>
            
        </tbody>
    </table>
    <hr>
    <!-- Datos para la Factura -->
    <h2>Datos para la Factura</h2>
    <hr>
    <div class="col-md-12">
        <div class="form-group" id="g_mismos_datos_factu">
            {{ Form::label('mismos_datos_factu', '¿Desea su Factura Electrónica con los mismo datos ingresados?') }}
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" onclick="factElec(0)" type="radio" name="mismos_datos_factu" id="i_mismos_datos_factu_no" value="No">
                <label class="form-check-label" for="i_mismos_datos_factu_no">No</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" onclick="factElec(1)" type="radio" name="mismos_datos_factu" id="i_mismos_datos_factu_si" value="Si" checked>
                <label class="form-check-label" for="i_mismos_datos_factu_si">Si</label>
            </div>
            @error('mismos_datos_factu')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_mismos_datos_factu">
                
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group b-hidden" id="g_ruc_cedula_factura">
            {{ Form::label('ruc_cedula_factura', 'RUC / Cédula') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::text('ruc_cedula_factura', null, ['class' => 'form-control form-control-sm', 'maxlength' => '13', 'onblur' => 'validarDocumento("ruc_cedula_factura")', 'id' => 'i_ruc_cedula_factura', 'placeholder' => '0102698867']) }}
            @error('ruc_cedula_factura')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_ruc_cedula_factura">
                El campo es obligatorio
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group b-hidden" id="g_nombres_factura">
            {{ Form::label('nombres_factura', 'Nombres Completos') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::text('nombres_factura', null, ['class' => 'form-control form-control-sm', 'id' => 'i_nombres_factura', 'placeholder' => 'Calos Andres', 'autocomplete' => 'off']) }}
            @error('nombres_factura')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_nombres_factura">
                El campo es requerido y No acepta números ni caracteres especiales
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group b-hidden" id="g_correo_factura">
            {{ Form::label('correo_factura', 'Correo (si desea puede modificarse)') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::email('correo_factura', null, ['class' => 'form-control form-control-sm', 'id' => 'i_correo_factura', 'placeholder' => 'correo@correo.com']) }}
            @error('correo_factura')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_correo_factura">
                Debe ingresar un correo valido
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="form-group b-hidden" id="g_direccion_factura">
            {{ Form::label('direccion_factura', 'Dirección') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::text('direccion_factura', null, ['class' => 'form-control form-control-sm', 'id' => 'i_direccion_factura', 'placeholder' => 'Av. 10 DE AGOSTO N45-12 Y SELVA ALEGRE']) }}
            @error('direccion_factura')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_direccion_factura">
                
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group b-hidden" id="g_telefono_factura">
            {{ Form::label('telefono_factura', 'Teléfono Fíjo') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::text('telefono_factura', null, ['class' => 'form-control form-control-sm', 'id' => 'i_telefono_factura', 'placeholder' => '0912345678']) }}
            @error('telefono_factura')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_telefono_factura">
                No acepta letras ni caracteres especiales
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="form-group b-hidden" id="g_comentarios_factura">
            {{ Form::label('comentarios_factura', 'Comentarios') }}
            {{ Form::textarea('comentarios_factura', null, ['class' => 'form-control form-control-sm', 'id' => 'i_comentarios_factura']) }}
            @error('comentarios_factura')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_comentarios_factura">
                No acepta letras ni caracteres especiales
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
    <div class="form-group row col-md-8 offset-md-2" id="g_cm5">
        <div class="col">
           <p class="lead">Realizar su depósito o transferencia a:</p>
           <p>
              <strong>Banco Guayaquil</strong>
           </p>
           <p>Cuenta Corriente No. 33824998</p>
           <p>Titular: EC593 DATA SAS</p>
           <p>RUC: 1793199100001</p>
           <p><strong>Banco Pichincha</strong></p>
           <p>Cuenta de Ahorros No. 5706249200</p>
           <p>Titular: Virginia Rosario</p>
           <p>Correo: info@593firmas.com</p>
           
        </div>
        <div class="col">
            {{ Form::label('fecha_deposito', 'Fecha') }}
            {{ Form::date('fecha_deposito', null, ['class' => 'form-control', 'id' => 'i_fecha_deposito']) }}
            {{ Form::label('num_deposito', 'Número de Depósito') }}
            {{ Form::text('num_deposito', null, ['class' => 'form-control', 'id' => 'i_num_deposito']) }}
            {{ Form::label('nombre_banco', 'Nombre de la institución financiera') }}
            {{ Form::text('nombre_banco', null, ['class' => 'form-control', 'id' => 'i_nombre_banco']) }}
            {{ Form::label('nombre_depositante', 'Nombre del titular') }}
            {{ Form::text('nombre_depositante', null, ['class' => 'form-control', 'id' => 'i_nombre_depositante']) }}
        </div>
        <div class="col-md-12">
           <p></p><h3><strong>NOTA:</strong></h3><p></p>
           <p>* En el concepto del depósito o transferencia coloque el NOMBRE DEL BENEFICIARIO DE LA FIRMA ELECTRONICA</p>
           <p>* Para Validar su pago, deberá llenar los campos fecha, numero de comprobante, nombre de la institución financiera, nombre del titular</p>
           <hr>
        </div>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
    @isset($legal_representative)
    <div class="col-md-3">
        <div class="form-group" id="g_estatus_pago">
            {{ Form::label('estatus_pago', 'Estatus de Pago') }}
            {{ Form::select('estatus_pago', [
                'Abundancia' => 'Abundancia',
                'Exito' => 'Éxito',
                'Oficina' => 'Oficina',
                'Pagado' => 'Pagado',
                'Pendiente' => 'Pendiente', 
                'Redes' => 'Redes',
                'Ricardo' => 'Ricardo',
                'Virginia' => 'Virginia'],
                null, ['class' => 'custom-select custom-select-sm', 'id' => 'i_estatus_pago', 'placeholder' => 'Seleccione Estatus']) }}
            @error('estatus_pago')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_estatus_pago">
                Debe seleccionar Tipo de Servicio
            </div>
        </div>
    </div>
    @endisset
    
    <div class="col-md-4">
        <div class="form-group" id="g_express">
            {{ Form::label('express', 'Servicio flash Costo $20 mas iva adicionales (Entrega 15 Minutos)') }} <i class="fab fa-diaspora text-warning"></i>
            {{ Form::select('express', [
                'Si' => 'Si', 
                'No' => 'No'],
                null, ['class' => 'custom-select custom-select-sm', 'required', 'id' => 'i_express', 'placeholder' => 'Seleccione Servicio']) }}
            @error('express')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_express">
                Debe seleccionar Tipo de Servicio
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group" id="g_nombre_partner">
            {{ Form::label('nombre_partner', 'Campo opcional Nombre y Apellido del Partner') }}
            {{ Form::text('nombre_partner', null, ['class' => 'form-control form-control-sm', 'id' => 'i_nombre_partner', 'placeholder' => 'Calos Andres', 'autocomplete' => 'off']) }}
            @error('nombre_partner')
                {{ $message }}
            @enderror
            <div class="invalid-feedback2" id="error_nombre_partner">
                No acepta números ni caracteres especiales
            </div>
        </div>
    </div>
</div>