$(document).ready(function () {
    $('#insert_form').on("submit", function (event) {
        event.preventDefault();
        if ($('#primerNombre').val() == "") {
            alert("Primer nombre is required");
        } else if ($('#segundoNombre').val() == "") {
            alert("Segundo nombre is required");
        } else if ($('#primerApellido').val() == "") {
            alert("Primer apellido is required");
        } else if ($('#segundoApellido').val() == "") {
            alert("Segundo apellido is required");
        } else {
            $.ajax({
                url: "insertar.php",
                method: "POST",
                data: $('#insert_form').serialize(),
                beforeSend: function () {
                    $('#insert').val("Insertando...");
                },
                success: function (data) {
                    $('#insert_form')[0].reset();
                    $('#add_data_Modal').modal('hide');
                    viewData();
                },
                error: function (jqXHR, exception) {
                    error(jqXHR, exception, "INSERTAR");
                }
            });
        }
    });
});

function detail(str) {
    var id = str;
    $.ajax({
        type: "POST",
        url: "select.php",
        data: "id=" + id,
        success: function (data) {
            $('#employee_detail').html(data);
            $('#dataModal').modal('show');
        },
        error: function (jqXHR, exception) {
            error(jqXHR, exception, "DETAIL");
        }
    });
}

function updateData(str) {
    var id = str;
    var primerNombre = $('#primerNombre-' + str).val();
    var segundoNombre = $('#segundoNombre-' + str).val();
    var primerApellido = $('#primerApellido-' + str).val();
    var segundoApellido = $('#segundoApellido-' + str).val();
    var tipoDocumento = $('#tipoDocumento-' + str).val();
    var cedula = $('#cedula-' + str).val();
    var direccion = $('#direccion-' + str).val();
    var telefono = $('#telefono-' + str).val();
    var correo = $('#email-' + str).val();
    var tipoDeEquipo = $('#tipoEquipo-' + str).val();

    $.ajax({
        type: "POST",
        url: "editar.php",
        data: "primerNombre=" + primerNombre + "&segundoNombre=" + segundoNombre + "&primerApellido=" + primerApellido + "&segundoApellido=" + segundoApellido + "&tipoDocumento=" + tipoDocumento + "&cedula=" + cedula + "&direccion=" + direccion + "&telefono=" + telefono + "&email=" + correo + "&tipoEquipo=" + tipoDeEquipo + "&id=" + id,
        success: function () {
            viewData();
        },
        //        error: function (jqXHR, exception) {
        //            error(jqXHR, exception, "EDITAR");
        //        }
    });
}

function viewData() {
    $.ajax({
        type: "GET",
        url: "despliegue.php",
        success: function (data) {
            $('tbody').html(data);
        },
        error: function (jqXHR, exception) {
            error(jqXHR, exception, "DESPLIEGUE");
        }
    });
}

function deleteData(str) {
    var id = str;
    $.ajax({
        type: "GET",
        url: "eliminar.php",
        data: "id=" + id,
        success: function (data) {
            viewData();
        },
        error: function (jqXHR, exception) {
            error(jqXHR, exception, "ELIMINAR");
        }
    });
}

function error(jqXHR, exception, tipo) {
    var msg = '';
    if (jqXHR.status === 0) {
        msg = 'Not connect.\n Verify Network.';
    } else if (jqXHR.status == 404) {
        msg = 'Requested page not found. [404]';
    } else if (jqXHR.status == 500) {
        msg = 'Internal Server Error [500].';
    } else if (exception === 'parsererror') {
        msg = 'Requested JSON parse failed.';
    } else if (exception === 'timeout') {
        msg = 'Time out error.';
    } else if (exception === 'abort') {
        msg = 'Ajax request aborted.';
    } else {
        msg = 'Uncaught Error.\n' + jqXHR.responseText;
    }
    alert('ERROR: in ' + '[' + tipo + '] ' + msg);
    $('#add_data_Modal').modal('hide');
}
