<div class="box box-info padding-1">
    <div class="box-body" style="max-width: 80%; margin:auto">
        
        <div class="form-group">
            {{ Form::label('Nombre Completo') }}
            {{ Form::text('nombre', $empleado->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Completo']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Correo electrónico') }}
            {{ Form::text('email', $empleado->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Correo electrónico']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sexo') }}
            {{ Form::select('sexo', ['M' => 'Masculino', 'F' => 'Femenino'] , $empleado->sexo, ['class' => 'form-control' . ($errors->has('sexo') ? ' is-invalid' : ''), 'placeholder' => 'Sexo']) }}
            {!! $errors->first('sexo', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Área') }}
            <select name="area_id" class="form-control" id="area_id">
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}" {{$area->id == $areaid ? 'selected': '' }}>{{ $area->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $empleado->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <br>    
        <div class="form-group">
            {{ Form::label('boletin') }}
            {{ Form::checkbox('boletin' , '1', $empleado->boletin) }}
            {!! $errors->first('boletin', '<div class="invalid-feedback">:message</p>') !!}
        </div>
        <br>
                   
        <div class="form-group">
        <label for="">roles:</label>
        <br>
        @foreach ($roles as $rol)
            <input type="checkbox" name="roles[]" value="{{$rol->id}}" {{in_array($rol->id, $roles_user) ? 'checked': '' }}>{{$rol->nombre}}<br/>
        @endforeach
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>