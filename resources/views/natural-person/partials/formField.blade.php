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
                        <div class="invalid-feedback">
                            Error x
                        </div>
                    </div>
                </th>
                <td>
                    <div class="col-md-12">
                        <div id="visor_f_cedulaFront"></div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>