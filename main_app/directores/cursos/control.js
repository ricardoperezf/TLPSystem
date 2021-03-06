  $(document).ready(function () {
      $('#add').click(function () {
          $('#insert').val("Insert");
          $('#insert_form')[0].reset();
      });
      $(document).on('click', '.edit_data', function () {
          var employee_id = $(this).attr("id");
          $.ajax({
              url: "fetch.php",
              method: "POST",
              data: {
                  employee_id: employee_id
              },
              dataType: "json",
              success: function (data) {
                  console.log(data.profid);
                  
                  $('#nombreDelCurso').val(data.nombre);
                  $('#tipoDeProfesor').val(data.profid);
                  $('#tipoDeEstudiante').val(data.estid);
                  $('#tipoDeEquipo').val(data.tipo_equipo);
                  $('#employee_id').val(data.id);
                  $('#insert').val("Update");
                  $('#add_data_Modal').modal('show');
              }
          });
      });
      $('#insert_form').on("submit", function (event) {
          event.preventDefault();
          if ($('#nombreDelCurso').val() == "") {
              alert("Name is required");
          } else if ($('#tipoDeProfesor').val() == '') {
              alert("Profesor is required");
          } else if ($('#tipoDeEstudiante').val() == '') {
              alert("Estudiante is required");
          } else if ($('#tipoDeEquipo').val() == '') {
              alert("Tipo de equipo is required");
          } else {
              $.ajax({
                  url: "insert.php",
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
                  url: "select.php",
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


  function deleteData(str) {
      var id = str;
      $.ajax({
          type: "GET",
          url: "delete.php",
          data: "id=" + id,
          success: function (data) {
                
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
