@extends('layouts.configuracion')

@section('title', 'Editar municipio')
    
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">          
@endsection

@section('content')

        <header>
            <h3 class='text-center'>Editar un municipio</h3>
        </header>

        <div class="card">
            <div class="card-body">

                {!! Form::model($municipio, ['route' => ['admin.municipios.update', $municipio], 'method' => 'put']) !!}

                @include('admin.municipios.partials.form')

                {!! Form::submit('Actualizar Municipio', ['class' => 'btn btn-primary']) !!}
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

