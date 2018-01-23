jQuery(document).on('submit', '#formlg', function (event) {
    event.preventDefault();
    jQuery.ajax({
            url: 'main_app/login.php',
            type: 'POST',
            dataType: 'json',
            data: $(this).serialize(),
            beforeSend: function () {
                $('.botonlg').val('Validando...');
            }
        })
        .done(function (respuesta) {
            console.log(respuesta);
            if (!respuesta.error) {
                if (respuesta.tipo == 'Director') {
                    location.href = 'main_app/directores';
                } else if (respuesta.tipo == 'Subdirector') {
                    location.href = 'main_app/sub-directores';
                } else if (respuesta.tipo == 'Profesor') {
                    location.href = 'main_app/profesores';
                } else if (respuesta.tipo == 'Estudiante') {
                    location.href = 'main_app/estudiantes';
                }
            } else {
                $('.error').slideDown('slow');
                setTimeout(function () {
                    $('.error').slideUp('slow');
                    $('.botonlg').val('Iniciar sesión');

                }, 2000);
            }
        })
        .fail(function (resp) {
            console.log(resp.responseText);
        })
        .always(function () {
            console.log("complete");
        });
});
