$(document).ready(function () {

    listarTiposervicios();

    function listarTiposervicios()
    {
        $.ajax({
            type: "GET",
            url: "/listar-tiposervicios",
            dataType: "json",
            success: function (response) {
                    $('tbody').html("")
                    $.each(response.tipoServicio, function (key, item) {
                        if(item.estado == 1){
                        $('tbody').append(
                            '<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.nombreTiposervicio+'</td>\
                            <td><button type="button" value="'+item.id+'" class="btn btn-outline-success btn-sm" disabled>Activo <i class="icon ion-md-checkbox"></i></button></td>\
                            <td><button type="button" value="'+item.id+'" class="editar_tiposervicio btn btn-primary btn-sm">Editar</button></td>\
                            <td><button type="button" value="'+item.id+'" class="eliminar_tiposervicio btn btn-danger btn-sm">Eliminar</button></td>\
                        </tr>'
                        );
                        }else{
                        $('tbody').append(
                            '<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.nombreTiposervicio+'</td>\
                            <td><button type="button" value="'+item.id+'" class="btn btn-outline-danger btn-sm" disabled>Inactivo <i class="icon ion-md-alert"></i></button></td>\
                            <td><button type="button" value="'+item.id+'" class="editar_tiposervicio btn btn-primary btn-sm">Editar</button></td>\
                            <td><button type="button" value="'+item.id+'" class="eliminar_tiposervicio btn btn-danger btn-sm">Eliminar</button></td>\
                            </tr>'
                        );
                        }
                    });
                    tabla();
                }
            });
    }

    function tabla()
    {
            $('#tb-tiposervicio').DataTable({
                "destroy": true,
                "language": {
                    "url": '/libs/datatables/spanish.json',
                }
            });
    } 

    $(document).on('click', '.eliminar_tiposervicio', function (e) {
        e.preventDefault();
        var tipo_id = $(this).val();
        $('#eliminar_tiposervicio_id').val(tipo_id);
        $('#EliminarTiposervicioModal').modal('show')
    });

    $(document).on('click', '.eliminar_tiposervicio_btn', function (e){
        e.preventDefault();

        $(this).text("Eliminando...");

        var tipo_id = $('#eliminar_tiposervicio_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "DELETE",
            url: "/eliminar-tiposervicios/" + tipo_id,
            success: function (response){

                $('#EliminarTiposervicioModal').modal('hide');
                $('.eliminar_tiposervicio_btn').text("Si eliminar");
                Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Tipo de servicio eliminado satisfactoriamente',
                        showConfirmButton: false,
                        timer: 2000
                })

                $(document).ajaxStop(function(){
                    window.location.reload();
                });

                listarTiposervicios();
            }
        });
    });

    $(document).on('click', '.editar_tiposervicio', function (e) {
        e.preventDefault();
        var tipo_id = $(this).val();
        //console.log(est_id);
        $('#EditTiposervicioModal').modal('show');
        $.ajax({
            type: "GET",
            url: "/editar-tiposervicios/" + tipo_id,
            success: function (response) {
                    if(response.status == 404){
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    }else{
                        $('#edit_nombre').val(response.tipoServicio.nombreTiposervicio);
                        $('#edit_estado').val(response.tipoServicio.estado);
                        $('#edit_tiposervicio_id').val(tipo_id);
                    }
                }
                
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $(document).on('click', '.editar_tiposervicio_btn', function (e) {
        e.preventDefault();

        $(this).text("Actualizando...");

        var tipo_id = $('#edit_tiposervicio_id').val();
        var data = {
            'nombre' : $('#edit_nombre').val(),
            'estado' : $('#edit_estado').val()
        }

        $.ajax({
            type: "PUT",
            url: "/actualizar-tiposervicios/" + tipo_id,
            data: data,
            dataType: "json",
            success: function (response) {
                    if(response.status == 400){

                        $('#updateform_errList').html("");
                        $('#updateform_errList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_values) {
                        $('#updateform_errList').append('<li>'+err_values+'</li>');
                    });

                    $('.editar_tiposervicio_btn').text("Actualizar");

                    }else if(response.status == 404){
                        $('#updateform_errList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);

                        $('.editar_tiposervicio_btn').text("Actualizar");
                    }else{
                        
                        $('#updateform_errList').html("");

                        $('#EditTiposervicioModal').modal('hide');
                        $('.editar_tiposervicio_btn').text("Actualizar");
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Tipo de servicio Actualizado exitosamente',
                            showConfirmButton: false,
                            timer: 2000
                        })

                        $(document).ajaxStop(function(){
                            window.location.reload();
                        });

                        listarTiposervicios();
                    }
                }
                
            });

    });


    $(document).on('click', '.add_tiposervicio', function (e){
        e.preventDefault();
        var data = {
            'nombre': $('.nombre').val(),
            'estado': $('.estadoTipo').val(),
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: '/registrar-tiposervicios',
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
                    $('#RegistrarTipoServicioModal').modal('hide');
                    $('#RegistrarTipoServicioModal').find('input').val("");
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Tipo de servicio Registrado exitosamente',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    $(document).ajaxStop(function(){
                        window.location.reload();
                    });
                    listarTiposervicios();
                }
            }
        })
    });
});

$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});