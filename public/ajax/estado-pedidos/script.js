$(document).ready(function () {

    listarEstados();

    function listarEstados()
    {
        $.ajax({
            type: "GET",
            url: "/listar-estados",
            dataType: "json",
            success: function (response) {
                    $('tbody').html("")
                    $.each(response.estadoPedidos, function (key, item) {
                        if(item.estadoPedido == 1){
                        $('tbody').append(
                            '<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.NombreEstado+'</td>\
                            <td><button type="button" value="'+item.id+'" class="btn btn-outline-success btn-sm" disabled>Activo <i class="icon ion-md-checkbox"></i></button></td>\
                            <td><button type="button" value="'+item.id+'" class="edit_estado btn btn-primary btn-sm">Editar</button></td>\
                            <td><button type="button" value="'+item.id+'" class="eliminar_estado btn btn-danger btn-sm">Eliminar</button></td>\
                        </tr>'
                        );
                        }else{
                            $('tbody').append(
                                '<tr>\
                                <td>'+item.id+'</td>\
                                <td>'+item.NombreEstado+'</td>\
                                <td><button type="button" value="'+item.id+'" class="btn btn-outline-danger btn-sm" disabled>Inactivo <i class="icon ion-md-alert"></i></button></td>\
                                <td><button type="button" value="'+item.id+'" class="edit_estado btn btn-primary btn-sm">Editar</button></td>\
                                <td><button type="button" value="'+item.id+'" class="eliminar_estado btn btn-danger btn-sm">Eliminar</button></td>\
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
            url: '/estadoPedido',
            data: {'estado': estado, 'id': id},
            success: function(data){
                $('#resp' + id).html(data.var); 
                console.log(data.var)
            }
        });
    })

    function tabla()
    {
            $('#estadoP').DataTable({
                "destroy": true,
                "language": {
                    "url": '/libs/datatables/spanish.json',
                    }
                });
    }

    $(document).on('click', '.eliminar_estado', function (e) {
        e.preventDefault();
        var est_id = $(this).val();
        $('#eliminar_esta_id').val(est_id);
        $('#EliminarEstadoModal').modal('show')
    });
    $(document).on('click', '.eliminar_estado_btn', function (e){
        e.preventDefault();

        $(this).text("Eliminando...");

        var stud_id = $('#eliminar_esta_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "DELETE",
            url: "/eliminar-estado/" + stud_id,
            success: function (response){

                $('#EliminarEstadoModal').modal('hide');
                $('.eliminar_estado_btn').text("Si eliminar");

                Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Estado eliminado satisfactoriamente',
                        showConfirmButton: false,
                        timer: 2000
                })

                $(document).ajaxStop(function(){
                    window.location.reload();
                });

                listarEstados();
            }
        });
    });

    $(document).on('click', '.edit_estado', function (e) {
        e.preventDefault();
        var est_id = $(this).val();
        //console.log(est_id);
        $('#EditEstadoModal').modal('show');
        $.ajax({
            type: "GET",
            url: "/editar-estado/" + est_id,
            success: function (response) {
                    if(response.status == 404){
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    }else{
                        $('#edit_nombre').val(response.estado.NombreEstado);
                        $('#edit_estadoPedido').val(response.estado.estadoPedido);
                        $('#edit_esta_id').val(est_id);
                    }
                }
                
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $(document).on('click', '.editar_estado', function (e) {
        e.preventDefault();

        $(this).text("Actualizando...");

        var est_id = $('#edit_esta_id').val();
        var data = {
            'nombre' : $('#edit_nombre').val(),
            'estadoPedido' : $('#edit_estadoPedido').val()
        }

        $.ajax({
            type: "PUT",
            url: "/actualizar-estado/" + est_id,
            data: data,
            dataType: "json",
            success: function (response) {
                    if(response.status == 400){

                        $('#updateform_errList').html("");
                        $('#updateform_errList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_values) {
                        $('#updateform_errList').append('<li>'+err_values+'</li>');
                    });

                    $('.editar_estado').text("Actualizar");

                    }else if(response.status == 404){
                        $('#updateform_errList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);

                        $('.editar_estado').text("Actualizar");
                    }else{
                        
                        $('#updateform_errList').html("");

                        $('#EditEstadoModal').modal('hide');
                        $('.editar_estado').text("Actualizar");
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Estado de pedido actualizado exitosamente',
                            showConfirmButton: false,
                            timer: 2000
                        })

                        $(document).ajaxStop(function(){
                            window.location.reload();
                        });

                        listarEstados();
                    }
                }
                
            });

    });


    $(document).on('click', '.add_estado', function (e){
        e.preventDefault();
        var data = {
            'nombre': $('.nombre').val(),
            'estadoPedido': $('.estadoPedido').val()
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/estadoPedidos",
            data: data,
            dataType: "json",
            success: function (response) {
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
                    $('#RegistrarEstadoModal').modal('hide');
                    $('#RegistrarEstadoModal').find('input').val("");
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Estado de pedido Registrado exitosamente',
                        showConfirmButton: false,
                        timer: 2000
                    })

                    $(document).ajaxStop(function(){
                            window.location.reload();
                    });

                    listarEstados();
                }
            }
        })

    });

});