$(document).ready(function () {

    listarQuienes();

    function listarQuienes()
    {
        $.ajax({
            type: "GET",
            url: "/listar-quienes",
            dataType: "json",
            success: function (response) {
                    $('tbody').html("");
                    $.each(response.quienes, function (key, item) {
                        $('tbody').append(
                            '<tr>\
                            <td>'+item.id+'</td>\
                            <td>'+item.mision+'</td>\
                            <td>'+item.vision+'</td>\
                            <td>'+item.quienes+'</td>\
                            <td><button type="button" value="'+item.id+'" class="edit_registro btn btn-secondary btn-sm">Editar</button></td>\
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


    $(document).on('click', '.edit_registro', function (e) {
        e.preventDefault();
        var registro = $(this).val();

        $('#EditModal').modal('show');
        $.ajax({
            type: "GET",
            url: "/editar-quienes/" + registro,
            success: function (response) {

                    if(response.status == 404){
                        $('#success_message').html("");
                        $('#success_message').addClass('alert alert-danger');
                        $('#success_message').text(response.message);
                    }else{
                        $('#quienes').val(response.quienes.quienes);
                        $('#mision').val(response.quienes.mision);
                        $('#vision').val(response.quienes.vision);
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

    $(document).on('click', '.editar_quienes', function (e) {
        e.preventDefault();

        $(this).text("Actualizando...");

        var registro = $('#registro_id').val();
        var data = {
            'quienes' : $('#quienes').val(),
            'mision' : $('#mision').val(),
            'vision' : $('#vision').val(),
        }

        $.ajax({
            type: "PUT",
            url: "/actualizar-quienes/" + registro,
            data: data,
            dataType: "json",
            success: function (response) {

                    if(response.status == 400){

                        $('#updateform_errList').html("");
                        $('#updateform_errList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_values) {
                        $('#updateform_errList').append('<li>'+err_values+'</li>');
                    });

                    $('.editar_quienes').text("Actualizar");

                    }else if(response.status == 404){
                        $('#updateform_errList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.message);

                        $('.editar_quienes').text("Actualizar");
                    }else{
                        
                        $('#updateform_errList').html("");

                        $('#EditModal').modal('hide');
                        $('.editar_quienes').text("Actualizar");

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

                        listarQuienes();
                    }
                }
                
            });

    });

});