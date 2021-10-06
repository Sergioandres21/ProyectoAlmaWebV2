<div class="form-group">
    {!! Form::label('nombreMunicipio', 'Nombre Muninipio') !!}
    {!! Form::text('nombreMunicipio', null, ['class' => 'form-control', 'placeholder' => 'ingrese el nombre del municipio']) !!}

    @error('nombreMunicipio')
        <small class="text-danger">
            {{$message}}
        </small>
    @enderror
</div>

<div class="form-group">
        {!! Form::label('id_departamento', 'Departamento:', ['class' => 'form-label']) !!}
        {!! Form::select('id_departamento', $departamentos, null, ['class' => 'form-control']) !!}
</div>