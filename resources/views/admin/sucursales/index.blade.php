@extends('layouts.configuracion')

@section('title', 'Listado de sucursales')
    
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/configuracion/style.css') }}" rel="stylesheet">          
@endsection

@section('content')

            <header>
                <h3 class='text-center'></h3>
            </header>

            <div class="text-center">
                <h2>Lista de sucursales</h2>
            </div>

            <div class="container caja"> 

            @if (session('info'))
            <div class="alert alert-success">
                {{session('info')}}
            </div>
            @endif
    
            <div class="table-responsive">
                <table id="sucursales" class="table table-striped">
                    <a class="btn btn-secondary btn-sm mb-3" href="{{route('admin.sucursales.create')}}">Nueva sucursal</a>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre de la sucursal</th>
                            <th>Nombre del municipio</th>
                            <th>Dirección</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>

                    <tbody>
                      @foreach ($sucursales as $sucursal)
                           <tr>
                               <td>{{$sucursal->id}}</td>
                               <td>{{$sucursal->nombreSucursal}}</td>
                               <td>{{$sucursal->municipios->nombreMunicipio}}</td>
                               <td>{{$sucursal->direccion}}</td>

                               <td width="10px">
                                <a href="{{route('admin.sucursales.edit', $sucursal)}}" class="btn btn-sm btn-primary">Editar</a>
                            </td>

                            <td width="10px">
                                <form action="{{route('admin.sucursales.destroy', $sucursal)}}" method="POST" class="d-inline formulario-eliminar">
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
            </div>

        </body>
                
@endsection

@section('scripts')
                    
            
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
            
        <script>
            $(document).ready(function(){
                $('#sucursales').DataTable({
                    "lengthMenu": [[5,10,50, -1], [5, 10, 50, "Todos"]],
                    "language": {
                    "url": '/libs/datatables/spanish.json',
                    }
                });
            });
        </script>


@if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '¡Eliminado!',
                'La sucursal se eliminó con éxito.',
                'success'
            )
        </script>
        @endif

        <script>
            $('.formulario-eliminar').submit(function(e){
                e.preventDefault();

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡Esta sucursal se eliminará definitivamente!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, ¡Eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {

                    this.submit();
                }
                })
            });

        </script>

</html>
@endsection