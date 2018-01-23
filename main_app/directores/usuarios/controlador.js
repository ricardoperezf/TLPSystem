  $(document).ready(function () {
      $('#add').click(function () {
          $('#insert').val("Insert");
          $('#insert_form')[0].reset();
      });
      $(document).on('click', '.edit_data', function () {
          var employee_id = $(this).attr("id");
          $.ajax({
              url: "fetch.php?busqueda=editar",
              method: "POST",
              data: {
                  employee_id: employee_id
              },
              dataType: "json",
              success: function (data) {
                  $('#tipoDeUsuario').val(data.Tipo_usuario);
                  $('#nombre').val(data.nombres);
                  $('#usuario').val(data.Usuario);
                  $('#contraseña').val(data.Password);
                  $('#employee_id').val(data.id);
                  $('#insert').val("Update");
                  $('#add_data_Modal').modal('show');
              }
          });
      });
      $('#insert_form').on("submit", function (event) {
          event.preventDefault();
          if ($('#tipoDeUsuario').val() == "") {
              alert("Tipo de usuario is required");
          } else if ($('#nombre').val() == '') {
              alert("Nombre is required");
          } else if ($('#usuario').val() == '') {
              alert("Usuario is required");
          } else if ($('#contraseña').val() == '') {
              alert("Contraseña is required");
          } else {
              $.ajax({
                  url: "insertar.php",
                  method: "POST",
                  data: $('#insert_form').serialize(),
                  beforeSend: function () {
                      $('#insert').val("Ingresando");
                  },
                  success: function (data) {
                      $('#insert_form')[0].reset();
                      $('#add_data_Modal').modal('hide');
                      $('#employee_table').html(data);
                      location.reload(true);
                  }
              });
          }
      });
      $(document).on('click', '.view_data', function () {
          var employee_id = $(this).attr("id");
          if (employee_id != '') {
              $.ajax({
                  url: "detalle.php",
                  method: "POST",
                  data: {
                      employee_id: employee_id
                  },
                  success: function (data) {
                      $('#employee_detail').html(data);
                      $('#dataModal').modal('show');
                  }
              });
          }
      });
  });

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
