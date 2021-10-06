$(document).ready(function () {

    listarContacto();

    function listarContacto()
    {
        $.ajax({
            type: "GET",
            url: "/listar-contactos",
            dataType: "json",
            success: function (response) {
                    $('tbody').html("");
                    $.each(response.contacto, function (key, item) {
                        $('tbody').append(
                            '<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.whatsapp+'</td>\
                            <td>'+item.email+'</td>\
                            <td>'+item.instagram+'</td>\
                            <td>'+item.descripcion+'</td>\
                            <td><button type="button" value="'+item.id+'" class="edit_contacto btn btn-secondary btn-sm">Editar</button></td>\
                        </tr>'
                        );
                });
            tabla();
        }
    });
}


    function tabla()
    {
            $('#tabla').DataTable({
                "destroy": true,
                "language": {
                    "url": '/libs/datatables/spanish.json',
                    }
                });
    }


$(document).on('click', '.edit_contacto', function (e) {
        e.preventDefault();
        var registro = $(this).val();

        $('#EditModal').modal('show');
        $.ajax({
            type: "GET",
            url: "/editar-contacto/" + registro,
            success: function (response) {

                    if(response.status == 404){
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    }else{
                        $('#edit_whatsapp').val(response.contacto.whatsapp);
                        $('#edit_email').val(response.contacto.email);
                        $('#edit_instagram').val(response.contacto.instagram);
                        $('#edit_descripcion').val(response.contacto.descripcion);
                        $('#registro_id').val(registro);
                    }
                }
                
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $(document).on('click', '.editar_contacto', function (e) {
        e.preventDefault();

        $(this).text("Actualizando...");

        var registro = $('#registro_id').val();
        var data = {
            'whatsapp' : $('#edit_whatsapp').val(),
            'email' : $('#edit_email').val(),
            'instagram' : $('#edit_instagram').val(),
            'descripcion' : $('#edit_descripcion').val()
        }

        $.ajax({
            type: "PUT",
            url: "/actualizar-contacto/" + registro,
            data: data,
            dataType: "json",
            success: function (response) {

                    if(response.status == 400){

                        $('#updateform_errList').html("");
                        $('#updateform_errList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_values) {
                        $('#updateform_errList').append('<li>'+err_values+'</li>');
                    });

                    $('.editar_contacto').text("Actualizar");

                    }else if(response.status == 404){
                        $('#updateform_errList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);

                        $('.editar_contacto').text("Actualizar");
                    }else{
                        
                        $('#updateform_errList').html("");

                        $('#EditModal').modal('hide');
                        $('.editar_contacto').text("Actualizar");

                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Registro actualizado satisfactoriamente',
                            showConfirmButton: false,
                            timer: 2000
                        })

                        $(document).ajaxStop(function(){
                            window.location.reload();
                        });

                        listarContacto();
                    }
                }
                
            });

    });

}); 