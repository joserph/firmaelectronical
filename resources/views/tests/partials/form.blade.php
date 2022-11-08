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
            <textarea name="contenido" class="form-control" style="height: 100px"></textarea>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="form-group">
            <label for="exampleFormControlFile1">Example file input</label>
            <input type="file" class="form-control-file" name="archivo" id="exampleFormControlFile1">
        </div>
    </div>
    
</div>