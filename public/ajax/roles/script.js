$(document).ready(function () {

    listarRoles();

    function listarRoles()
    {
        $.ajax({
            type: "GET",
            url: "/listar-roles",
            dataType: "json",
            success: function (response) {
                    $('tbody').html("");
                    $.each(response.roles, function (key, item) {
                    if(item.estado == 1){
                        $('tbody').append(
                            '<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.nombre+'</td>\
                            <td>'+item.descripcion+'</td>\
                            <td><button type="button" value="'+item.id+'" class="btn btn-outline-success btn-sm" disabled>Activo <i class="icon ion-md-checkbox"></i></button></td>\
                            <td><button type="button" value="'+item.id+'" class="edit_rol btn btn-primary btn-sm">Editar</button></td>\
                            <td><button type="button" value="'+item.id+'" class="eliminar_rol btn btn-danger btn-sm">Eliminar</button></td>\
                        </tr>'
                        );
                    }else{
                        $('tbody').append(
                            '<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.nombre+'</td>\
                            <td>'+item.descripcion+'</td>\
                            <td><button type="button" value="'+item.id+'" class="btn btn-outline-danger btn-sm" disabled>Inactivo <i class="icon ion-md-alert"></i></button></td>\
                            <td><button type="button" value="'+item.id+'" class="edit_rol btn btn-primary btn-sm">Editar</button></td>\
                            <td><button type="button" value="'+item.id+'" class="eliminar_rol btn btn-danger btn-sm">Eliminar</button></td>\
                        </tr>'
                        );
                    }
                });
            tabla();
        }
    });
}


    $('.mi_checkbox').change(function() {
        //Verifico el estado del checkbox, si esta seleccionado sera igual a 1 de lo contrario sera igual a 0
        var estatus = $(this).prop('checked') == true ? 1 : 0; 
        var id = $(this).data('id'); 
            console.log(estatus);
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/estadoRol',
            data: {'estado': estado, 'id': id},
            success: function(data){
                $('#resp' + id).html(data.var); 
                console.log(data.var)
            }
        });
    })

    function tabla()
    {
            $('#roles').DataTable({
                "destroy": true,
                "language": {
                    "url": '/libs/datatables/spanish.json',
                    }
                });
    }

    $(document).on('click', '.eliminar_rol', function (e) {
        e.preventDefault();
        var rol_id = $(this).val();
        $('#eliminar_rol_id').val(rol_id);
        $('#EliminarRolModal').modal('show')
    });
    $(document).on('click', '.eliminar_rol_btn', function (e){
        e.preventDefault();

        $(this).text("Eliminando...");

        var rol_id = $('#eliminar_rol_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "DELETE",
            url: "/eliminar-roles/" + rol_id,
            success: function (response){

                $('#EliminarRolModal').modal('hide');
                $('.eliminar_rol_btn').text("Si eliminar");

                Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Rol eliminado satisfactoriamente',
                        showConfirmButton: false,
                        timer: 2500
                })

                $(document).ajaxStop(function(){
                    window.location.reload();
                });

                listarRoles();
            }
        });
    });

    $(document).on('click', '.edit_rol', function (e) {
        e.preventDefault();
        var rol_id = $(this).val();

        $('#EditRolModal').modal('show');
        $.ajax({
            type: "GET",
            url: "/editar-roles/" + rol_id,
            success: function (response) {

                    if(response.status == 404){
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    }else{
                        $('#edit_nombre').val(response.roles.nombre);
                        $('#edit_descripcion').val(response.roles.descripcion);
                        $('#edit_estado').val(response.roles.estado);
                        $('#edit_rol_id').val(rol_id);
                    }
                }
                
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $(document).on('click', '.editar_rol', function (e) {
        e.preventDefault();

        $(this).text("Actualizando...");

        var rol_id = $('#edit_rol_id').val();
        var data = {
            'nombre' : $('#edit_nombre').val(),
            'descripcion' : $('#edit_descripcion').val(),
            'estado' : $('#edit_estado').val(),
        }

        $.ajax({
            type: "PUT",
            url: "/actualizar-roles/" + rol_id,
            data: data,
            dataType: "json",
            success: function (response) {

                    if(response.status == 400){

                        $('#updateform_errList').html("");
                        $('#updateform_errList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_values) {
                        $('#updateform_errList').append('<li>'+err_values+'</li>');
                    });

                    $('.editar_rol').text("Actualizar");

                    }else if(response.status == 404){
                        $('#updateform_errList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);

                        $('.editar_rol').text("Actualizar");
                    }else{
                        
                        $('#updateform_errList').html("");

                        $('#EditRolModal').modal('hide');
                        $('.editar_rol').text("Actualizar");

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Rol eliminado satisfactoriamente',
                            showConfirmButton: false,
                            timer: 2000
                        })

                        $(document).ajaxStop(function(){
                            window.location.reload();
                        });

                        listarRoles();
                    }
                }
                
            });

    });


    $(document).on('click', '.add_rol', function (e){
        e.preventDefault();
        var data = {
            'nombre': $('#nombre').val(),
            'descripcion': $('#descripcion').val(),
            'estado': $('#estado').val(),
        }


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/registrar-rol",
            data: data,
            dataType: "json",
            success: function (response) {

                if(response.status == 500) {
                    console.log(response.errors.name);
                }
                if(response.status == 400)
                {
                    $('#saveform_errList').html("");
                    $('#saveform_errList').addClass('alert alert-danger');
                    $.each(response.errors, function (key, err_values) {
                        $('#saveform_errList').append('<li>'+err_values+'</li>');
                    });
                }
                else{
                    $('#saveform_errList').html("");
                    $('#RegistrarRoles').modal('hide');
                    $('#RegistrarRoles').find('input').val("");

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Rol registrado satisfactoriamente',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    $(document).ajaxStop(function(){
                        window.location.reload();
                    });
                    listarRoles();
                }
            }
        })

    });

});