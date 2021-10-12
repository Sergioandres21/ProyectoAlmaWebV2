@extends('layouts.configuracion')

@section('title', 'Crear Proveedor')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">          
@endsection

@section('content')

        <header>
            <h3 class='text-center'>Crear nueva Proveedor</h3>
        </header>

        <div class="card">
            <div class="card-body">

                {!! Form::open(['route' => 'admin.proveedores.store']) !!}

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
                        <Option value="">Seleccionar...</Option>
                        <option value="CC">C.C</option>
                        <option value="CE">C.E</option>
                        <option value="TI">T.I</option>
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
                    {!! Form::label('telefono', 'Teléfono:') !!}
                    {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => 'ingrese el teléfono']) !!}
                
                    @error('telefono')
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
                        <option value="">Seleccionar...</option>
                        <option value="1">Activo</option>
                    </select>
                
                    @error('estado')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                    @enderror
                </div>

                    {!! Form::submit('Crear Proveedor', ['class' => 'btn btn-primary btn-sm']) !!}

                    <a href="{{ route('admin.proveedores.index') }}" class="btn btn-secondary btn-sm">Volver al inicio</a>

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