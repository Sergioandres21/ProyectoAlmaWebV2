<div class="form-group">
    {!! Form::label('nombreSucursal', 'Nombre Sucursal:') !!}
    {!! Form::text('nombreSucursal', null, ['class' => 'form-control', 'placeholder' => 'ingrese el nombre de la sucursal']) !!}

    @error('nombreSucursal')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('id_municipio', 'Municipio:', ['class' => 'form-label']) !!}
    {!! Form::select('id_municipio', $municipio, null, ['class' => 'form-control']) !!}

    @error('id_municipio')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('direccion', 'Dirección:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'ingrese el nombre de la sucursal']) !!}

    @error('direccion')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>