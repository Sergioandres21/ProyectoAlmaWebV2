@extends('layouts.configuracion')

@section('title', 'Editar sucursal')
    
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">          
@endsection

@section('content')

        <header>
            <h3 class='text-center'>Editar una sucursal</h3>
        </header>

        <div class="card">
            <div class="card-body">

                {!! Form::model($sucursale, ['route' => ['admin.sucursales.update', $sucursale], 'method' => 'put']) !!}

                @include('admin.sucursales.partials.form')

                {!! Form::submit('Actualizar Sucursal', ['class' => 'btn btn-primary btn-sm']) !!}

                <a href="{{ route('admin.sucursales.index') }}" class="btn btn-secondary btn-sm">Volver al inicio</a>

                {!! Form::close() !!}
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

