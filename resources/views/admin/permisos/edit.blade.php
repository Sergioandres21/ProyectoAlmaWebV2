@extends('layouts.configuracion')

@section('title', 'Editar permisos')
    
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">          
@endsection

@section('content')

        <header>
            <h3 class='text-center'>Editar un permiso</h3>
        </header>

        <div class="card">
            <div class="card-body">

                @if (session('info'))
                    <div class="alert alert-success">
                        <strong>{{session('info')}}</strong>
                    </div>
                @endif
                
                <form action="{{ route('admin.permisos.update', $permission->id) }}" method="POST">
                    
                    @csrf
                    @method('PUT')

                    <div class="col">
                    <label>Nombre:</label>
                        <input type="text" class="form-control" name="name" placeholder="Ingrese el nombre del permiso" value="{{ old('name', $permission->name) }}" autofocus>
                        @if ($errors->has('name'))
                        <span class="error text-danger mt-2" for="input-name">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="col">
                        <label>Descripción:</label>
                            <input type="text" class="form-control" name="description" placeholder="Ingrese la descripción del permiso" value="{{ old('permission', $permission->description) }}" autofocus>
                            @if ($errors->has('description'))
                                <span class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                            @endif
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
                    </div>    
                </form>
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

