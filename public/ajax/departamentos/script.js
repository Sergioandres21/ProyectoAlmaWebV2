$(document).ready(function () {

    listarDepartamento();

    function listarDepartamento()
    {
        $.ajax({
            type: "GET",
            url: "/listar-departamentos",
            dataType: "json",
            success: function (response) {
                    $('tbody').html("")
                    $.each(response.departamentos, function (key, item) {
                        $('tbody').append(
                            '<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.nombre+'</td>\
                            <td><button type="button" value="'+item.id+'" class="edit_departamento btn btn-primary btn-sm">Editar</button></td>\
                            <td><button type="button" value="'+item.id+'" class="eliminar_departamento btn btn-danger btn-sm">Eliminar</button></td>\
                        </tr>'
                        );
                    });
                    tabla();
                }
            });
    }

    function tabla()
    {
            $('#tb-departamento').DataTable({
                "destroy": true,
                "language": {
                    "url": '/libs/datatables/spanish.json',
                    }
                });
    } 

    $(document).on('click', '.eliminar_departamento', function (e) {
        e.preventDefault();
        var dpt_id = $(this).val();
        $('#eliminar_departamento_id').val(dpt_id);
        $('#EliminarDepartamentoModal').modal('show')
    });
    $(document).on('click', '.eliminar_departamento_btn', function (e){
        e.preventDefault();

        $(this).text("Eliminando...");

        var dpt_id = $('#eliminar_departamento_id').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "DELETE",
            url: "/eliminar-departamentos/" + dpt_id,
            success: function (response){

                $('#EliminarDepartamentoModal').modal('hide');
                $('.eliminar_departamento_btn').text("Si eliminar");
                Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Departamento eliminado satisfactoriamente',
                        showConfirmButton: false,
                        timer: 2000
                })

                $(document).ajaxStop(function(){
                    window.location.reload();
                });

                listarDepartamento();
            }
        });
    });

    $(document).on('click', '.edit_departamento', function (e) {
        e.preventDefault();
        var dpt_id = $(this).val();
        //console.log(est_id);
        $('#EditDepartamentoModal').modal('show');
        $.ajax({
            type: "GET",
            url: "/editar-departamentos/" + dpt_id,
            success: function (response) {
                    if(response.status == 404){
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    }else{
                        $('#edit_nombre').val(response.departamento.nombre);
                        $('#edit_departamento_id').val(dpt_id);
                    }
                }
                
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $(document).on('click', '.editar_departamento', function (e) {
        e.preventDefault();

        $(this).text("Actualizando...");

        var dpt_id = $('#edit_departamento_id').val();
        var data = {
            'nombre' : $('#edit_nombre').val(),
        }

        $.ajax({
            type: "PUT",
            url: "/actualizar-departamentos/" + dpt_id,
            data: data,
            dataType: "json",
            success: function (response) {
                    if(response.status == 400){

                        $('#updateform_errList').html("");
                        $('#updateform_errList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_values) {
                        $('#updateform_errList').append('<li>'+err_values+'</li>');
                    });

                    $('.editar_departamento').text("Actualizar");

                    }else if(response.status == 404){
                        $('#updateform_errList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);

                        $('.editar_departamento').text("Actualizar");
                    }else{
                        
                        $('#updateform_errList').html("");

                        $('#EditDepartamentoModal').modal('hide');
                        $('.editar_departamento').text("Actualizar");
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Departamento Actualizado exitosamente',
                            showConfirmButton: false,
                            timer: 2000
                        })

                        $(document).ajaxStop(function(){
                            window.location.reload();
                        });
                        listarDepartamento();
                    }
                }
                
            });

    });


    $(document).on('click', '.add_departamento', function (e){
        e.preventDefault();
        var data = {
            'nombre': $('.nombre').val(),
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: '/registrar-departamento',
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
                    $('#RegistrarDepartamentoModal').modal('hide');
                    $('#RegistrarDepartamentoModal').find('input').val("");
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Departamento Registrado exitosamente',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    $(document).ajaxStop(function(){
                        window.location.reload();
                    });
                    listarDepartamento();
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