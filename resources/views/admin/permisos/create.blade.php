@extends('layouts.configuracion')

@section('title', 'Crear permisos')
    
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">          
@endsection

@section('content')

        <header>
            <h3 class='text-center'>Crear nuevo permiso</h3>
        </header>

        <div class="card">
            <div class="card-body">

                @if (session('info'))
                    <div class="alert alert-success">
                        <strong>{{session('info')}}</strong>
                    </div>
                @endif
                
                <form action="{{ route('admin.permisos.store') }}" method="POST">
                    
                    @csrf

                    <div class="col">
                    <label>Nombre:</label>
                        <input type="text" class="form-control" name="name" placeholder="Ingrese el nombre del permiso" autofocus>
                        @if ($errors->has('name'))
                        <span class="error text-danger mt-2" for="input-name">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="col">
                        <label>Descripción:</label>
                            <input type="text" class="form-control" name="description" placeholder="Ingrese la descripción del permiso" autofocus>
                            @if ($errors->has('description'))
                                <span class="error text-danger" for="input-description">{{ $errors->first('description') }}</span>
                            @endif
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
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

