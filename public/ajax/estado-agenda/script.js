$(document).ready(function () {

    listarEstadoAgenda();

    function listarEstadoAgenda()
    {
        $.ajax({
            type: "GET",
            url: "/listar-estadoagenda",
            dataType: "json",
            success: function (response) {
                    $('tbody').html("")
                    $.each(response.estadoAgenda, function (key, item) {
                        if(item.estadoAgenda == 1){
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
            url: '/estadoAgendas',
            data: {'estado': estado, 'id': id},
            success: function(data){
                $('#resp' + id).html(data.var); 
                console.log(data.var)
            }
        });
    })

    function tabla()
    {
            $('#estadoA').DataTable({
                "destroy": true,
                "language": {
                    "url": '/libs/datatables/spanish.json',
                    }
                });
    }

    $(document).on('click', '.eliminar_estado', function (e) {
        e.preventDefault();
        var est_id = $(this).val();
        $('#eliminar_estado_id').val(est_id);
        $('#EliminarEstadoAgendaModal').modal('show')
    });
    $(document).on('click', '.eliminar_estadoagenda_btn', function (e){
        e.preventDefault();

        $(this).text("Eliminando...");

        var est_id = $('#eliminar_estado_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "DELETE",
            url: "/eliminar-estadoagenda/" + est_id,
            success: function (response){

                $('#EliminarEstadoModal').modal('hide');
                $('.eliminar_estadoagenda_btn').text("Si eliminar");

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

                listarEstadoAgenda();
            }
        });
    });

    $(document).on('click', '.edit_estado', function (e) {
        e.preventDefault();
        var est_id = $(this).val();
        //console.log(est_id);
        $('#EditEstadoAgendaModal').modal('show');
        $.ajax({
            type: "GET",
            url: "/editar-estadoagenda/" + est_id,
            success: function (response) {
                    if(response.status == 404){
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    }else{
                        $('#edit_nombre').val(response.estado.NombreEstado);
                        $('#edit_estadoAgenda').val(response.estado.estadoAgenda);
                        $('#edit_estado_id').val(est_id);
                    }
                }
                
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $(document).on('click', '.editar_estadoAgenda', function (e) {
        e.preventDefault();

        $(this).text("Actualizando...");

        var est_id = $('#edit_estado_id').val();
        var data = {
            'nombre' : $('#edit_nombre').val(),
            'estadoAgenda' : $('#edit_estadoAgenda').val()
        }

        $.ajax({
            type: "PUT",
            url: "/actualizar-estadoagenda/" + est_id,
            data: data,
            dataType: "json",
            success: function (response) {
                    if(response.status == 400){

                        $('#updateform_errList').html("");
                        $('#updateform_errList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_values) {
                        $('#updateform_errList').append('<li>'+err_values+'</li>');
                    });

                    $('.editar_estadoAgenda').text("Actualizar");

                    }else if(response.status == 404){
                        $('#updateform_errList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);

                        $('.editar_estadoAgenda').text("Actualizar");
                    }else{
                        
                        $('#updateform_errList').html("");

                        $('#EditEstadoAgendaModal').modal('hide');

                        $('.editar_estadoAgenda').text("Actualizar");
                        
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Estado de agenda actualizado exitosamente',
                            showConfirmButton: false,
                            timer: 2000
                        })

                        $(document).ajaxStop(function(){
                            window.location.reload();
                        });

                        listarEstadoAgenda();
                    }
                }
                
            });

    });


    $(document).on('click', '.add_estadoagenda', function (e){
        e.preventDefault();
        var data = {
            'nombre': $('.nombre').val(),
            'estadoAgenda': $('.estadoAgenda').val()
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/estadoAgenda",
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
                    $('#RegistrarEstadoAgendaModal').modal('hide');
                    $('#RegistrarEstadoAgendaModal').find('input').val("");
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Estado de agenda Registrado exitosamente',
                        showConfirmButton: false,
                        timer: 2000
                    })

                    $(document).ajaxStop(function(){
                            window.location.reload();
                    });

                    listarEstadoAgenda();
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