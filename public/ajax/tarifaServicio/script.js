$(document).ready(function () {

    listarTarifaservicios();

    function listarTarifaservicios()
    {
        $.ajax({
            type: "GET",
            url: "/listar-tarifaservicios",
            dataType: "json",
            success: function (response) {
                    $('tbody').html("")
                    $.each(response.tarifaServicio, function (key, item) {
                        $('tbody').append(
                            '<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.anoTarifa+'</td>\
                            <td>'+item.resolucion+'</td>\
                            <td><button type="button" value="'+item.id+'" class="editar_tarifaservicio btn btn-primary btn-sm">Editar</button></td>\
                            <td><button type="button" value="'+item.id+'" class="eliminar_tarifaservicio btn btn-danger btn-sm">Eliminar</button></td>\
                        </tr>'
                        );
                    });
                    tabla();
                }
            });
    }

    function tabla()
    {
            $('#tb-tarifaservicio').DataTable({
                "destroy": true,
                "language": {
                    "url": '/libs/datatables/spanish.json',
                }
            });
    } 

    $(document).on('click', '.eliminar_tarifaservicio', function (e) {
        e.preventDefault();
        var tarifa_id = $(this).val();
        $('#eliminar_tarifaservicio_id').val(tarifa_id);
        $('#EliminarTarifaservicioModal').modal('show')
    });

    $(document).on('click', '.eliminar_tarifaservicio_btn', function (e){
        e.preventDefault();

        $(this).text("Eliminando...");

        var tarifa_id = $('#eliminar_tarifaservicio_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "DELETE",
            url: "/eliminar-tarifaservicios/" + tarifa_id,
            success: function (response){

                $('#EliminarTarifaservicioModal').modal('hide');
                $('.eliminar_tarifaservicio_btn').text("Si eliminar");
                Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Tarifa de servicio eliminado satisfactoriamente',
                        showConfirmButton: false,
                        timer: 2000
                })

                $(document).ajaxStop(function(){
                    window.location.reload();
                });

                listarTarifaservicios();
            }
        });
    });

    $(document).on('click', '.editar_tarifaservicio', function (e) {
        e.preventDefault();
        var tarifa_id = $(this).val();

        $('#EditTarifaservicioModal').modal('show');
        $.ajax({
            type: "GET",
            url: "/editar-tarifaservicios/" + tarifa_id,
            success: function (response) {
                    if(response.status == 404){
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    }else{
                        $('#edit_anotarifa').val(response.tarifaServicio.anoTarifa);
                        $('#edit_resolucion').val(response.tarifaServicio.resolucion);
                        $('#edit_tarifaservicio_id').val(tarifa_id);
                    }
                }
                
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $(document).on('click', '.editar_tarifaservicio_btn', function (e) {
        e.preventDefault();

        $(this).text("Actualizando...");

        var tarifa_id = $('#edit_tarifaservicio_id').val();
        var data = {
            'anoTarifa' : $('#edit_anotarifa').val(),
            'resolucion' : $('#edit_resolucion').val()
        }

        $.ajax({
            type: "PUT",
            url: "/actualizar-tarifaservicios/" + tarifa_id,
            data: data,
            dataType: "json",
            success: function (response) {
                    if(response.status == 400){

                        $('#updateform_errList').html("");
                        $('#updateform_errList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_values) {
                        $('#updateform_errList').append('<li>'+err_values+'</li>');
                    });

                    $('.editar_tarifaservicio_btn').text("Actualizar");

                    }else if(response.status == 404){
                        $('#updateform_errList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);

                        $('.editar_tarifaservicio_btn').text("Actualizar");
                    }else{
                        
                        $('#updateform_errList').html("");

                        $('#EditTarifaservicioModal').modal('hide');
                        $('.editar_tarifaservicio_btn').text("Actualizar");
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Tarifa de servicio Actualizado exitosamente',
                            showConfirmButton: false,
                            timer: 2000
                        })

                        $(document).ajaxStop(function(){
                            window.location.reload();
                        });

                        listarTarifaservicios();
                    }
                }
                
            });

    });


    $(document).on('click', '.add_tarifaservicio', function (e){
        e.preventDefault();
        var data = {
            'anotarifa': $('.anotarifa').val(),
            'resolucion': $('#resolucion').val(),
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: '/registrar-tarifaservicios',
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
                    $('#RegistrarTarifaServicioModal').modal('hide');
                    $('#RegistrarTarifaServicioModal').find('input').val("");
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Tarifa de servicio Registrado exitosamente',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    $(document).ajaxStop(function(){
                        window.location.reload();
                    });
                    listarTarifaservicios();
                }
            }
        })
    });
});