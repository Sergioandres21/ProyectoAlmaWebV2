@extends('layouts.configuracion')

@section('title', 'Editar Profesional')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">          
@endsection

@section('content')

        <header>
            <h3 class='text-center'>Editar Profesional</h3>
        </header>

        <div class="card">
            <div class="card-body">

                {!! Form::model($profesionale, ['route' => ['admin.profesionales.update', $profesionale], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! Form::label('numeroIdentificacion', 'Número identificación:') !!}
                    {!! Form::text('numeroIdentificacion', null, ['class' => 'form-control', 'placeholder' => 'ingrese el número de identificación']) !!}
                
                    @error('numeroIdentificacion')
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
                    <label for="tipoDocumento" class="col-form-label">Tipo de identificación:</label>
                    <select class="form-control" id="tipoDocumento" name="tipoDocumento">
                        <option value="CC" {{ $profesionale->tipoDocumento == "CC" ? 'selected' : '' }}>C.C</option>
                        <option value="CE" {{ $profesionale->tipoDocumento == "CE" ? 'selected' : '' }}>C.E</option>
                        <option value="TI" {{ $profesionale->tipoDocumento == "TI" ? 'selected' : '' }}>T.I</option>
                    </select>
                
                    @error('tipoDocumento')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                    @enderror
                </div>
                
                <div class="form-group">
                    {!! Form::label('nombres', 'Nombres:') !!}
                    {!! Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Ingrese los nombres']) !!}
                
                    @error('nombres')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('apellidos', 'Apellidos:') !!}
                    {!! Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Ingrese los apellidos']) !!}
                
                    @error('apellidos')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Correo:') !!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'ingrese el correo']) !!}
                
                    @error('email')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('celular', 'Celular:') !!}
                    {!! Form::text('celular', null, ['class' => 'form-control', 'placeholder' => 'ingrese el celular']) !!}
                
                    @error('celular')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('direccionResidencia', 'Dirección de residencia:') !!}
                    {!! Form::text('direccionResidencia', null, ['class' => 'form-control', 'placeholder' => 'ingrese la dirección de residencia']) !!}
                
                    @error('direccionResidencia')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="estado" class="col-form-label">Estado:</label>
                    <select class="form-control" name="estado" id="estado">
                        <option value="1" {{ $profesionale->estado == "1" ? 'selected' : '' }}>Activo</option>
                        <option value="0" {{ $profesionale->estado == "0" ? 'selected' : '' }}>Inactivo</option>
                    </select>
                
                    @error('estado')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                    @enderror
                </div>

                    {!! Form::submit('Actualizar Profesional', ['class' => 'btn btn-primary btn-sm']) !!}

                    <a href="{{ route('admin.profesionales.index') }}" class="btn btn-secondary btn-sm">Volver al inicio</a>

                {!! Form::close() !!}

                </div>
            </div>
        </div>

@endsection

@section('scripts')  

<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
            
<script>
    $(document).ready(function(){
        $('#usuarios').DataTable({
            "language": {
                    "url": '/libs/datatables/spanish.json',
            }
        });
    });
</script>

@endsection