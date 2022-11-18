<div class="form-row">
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('direccion', 'Direccion') }}
            {{ Form::text('direccion', null, ['class' => 'form-control', 'id' => 'i_direccion']) }}
            @error('direccion')
                {{ $message }}
            @enderror
            <div class="invalid-feedback">
                Error x
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div class="form-group">
            {{ Form::label('ciudad', 'Ciudad') }}
            {{ Form::text('ciudad', null, ['class' => 'form-control', 'id' => 'i_ciudad']) }}
            @error('ciudad')
                {{ $message }}
            @enderror
            <div class="invalid-feedback">
                Error x
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Country *</label> 
            <select name="pais" class="form-control" id="country">
                <option value="NG" selected="selected">Nigeria</option>
                <option value="NU">Niue</option>
                <option value="NF">Norfolk Island</option>
                <option value="KP">North Korea</option>
                <option value="MP">Northern Mariana Islands</option>
                <option value="NO">Norway</option>
            </select>
        </div>
    </div>
</div>