@extends('layouts.configuracion')

@section('title', 'Listado de roles')
    
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">          
@endsection

@section('content')

        <header>
            <h3 class='text-center'></h3>
        </header>

        <div class="container caja">   

            <div class="text-center">
                <h2>Lista de roles</h2>
            </div>

            @if (session('info'))
            <div class="alert alert-success">
                {{session('info')}}
            </div>
            @endif
    
            <div class="table-responsive">
                <table id="roles" class="table table-striped">
                    <a class="btn btn-secondary btn-sm mb-3" href="{{route('admin.roles.create')}}">Nuevo rol</a>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Rol</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>

                    <tbody>
                       @foreach ($roles as $role)
                           <tr>
                               <td>{{$role->id}}</td>
                               <td>{{$role->name}}</td>
                               <td width="10px">
                                   <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-sm btn-primary">Editar</a>
                               </td>

                               <td width="10px">
                                   <form action="{{route('admin.roles.destroy', $role)}}" method="POST" class="d-inline formulario-eliminar">
                                    @csrf
                                    @method('DELETE')
                                       <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                   </form>
                               </td>
                           </tr>
                       @endforeach
                    </tbody>
                </table>

            </div>

@endsection

@section('scripts')
        

<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
            
<script>
    $(document).ready(function(){
        $('#roles').DataTable({
            "language": {
                    "url": '/libs/datatables/spanish.json',
            }
        });
    });
</script>

@if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '??Eliminado!',
                'El rol se elimin?? con ??xito.',
                'success'
            )
        </script>
        @endif

        <script>
            $('.formulario-eliminar').submit(function(e){
                e.preventDefault();

                Swal.fire({
                    title: '??Est??s seguro?',
                    text: "??Este rol se eliminar?? definitivamente!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'S??, ??Eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {

                    this.submit();
                }
                })
            });

        </script>

@endsection