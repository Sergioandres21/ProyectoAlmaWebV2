@extends('layouts.configuracion')

@section('title', 'Asignación de rol')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">          
@endsection

@section('content')

        <header>
            <h3 class='text-center'>Asignar un rol</h3>
        </header>

        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{session('info')}}</strong>
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <p class="h5">Nombre</p>
                <p class="form-control">{{$user->name}}</p>

                <h2 class="h5">Listado de roles</h2>
                {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                    @foreach ($roles as $role)
                        <div>
                            <label>
                                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                                {{$role->name}}
                            </label>
                        </div>
                    @endforeach

                    {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary btn-sm mt-2']) !!}

                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-sm mt-2">Volver al inicio</a>

                {!! Form::close() !!}
            </div>
        </div>

       

@endsection

@section('scripts')

@endsection