@extends('layouts.configuracion')

@section('title', 'Crear Municipio')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">          
@endsection

@section('content')

        <header>
            <h3 class='text-center'>Crear nuevo municipio</h3>
        </header>

        <div class="card">
            <div class="card-body">

                {!! Form::open(['route' => 'admin.municipios.store']) !!}

                    @include('admin.municipios.partials.form')

                    {!! Form::submit('Crear Municipio', ['class' => 'btn btn-primary']) !!}
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