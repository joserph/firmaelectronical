<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            {{ Form::label('titulo', 'Titulo') }}
            {{ Form::text('titulo', null, ['class' => 'form-control']) }}
        </div>
    </div>
    
    <div class="col-sm-12">
        <div class="form-group">
            {{ Form::label('contenido', 'Contenido') }}
            {{ Form::textarea('contenido', null, ['class' => 'form-control']) }}
        </div>
    </div>
    @isset($test)
        <div class="col-sm-12">
            <img src="{{ asset('storage/img/' . $test->archivo) }}" class="img-fluid" alt="...">
        </div>
    @endisset
    
    <div class="col-sm-12">
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control-file" name="archivo" id="exampleFormControlFile1">
        </div>
    </div>
    
</div>