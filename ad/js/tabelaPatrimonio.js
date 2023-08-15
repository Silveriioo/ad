$(document).ready(function () {
    $("#myTable").DataTable();
  });
  
  function buttonredirect() {
    const buttonredirect = document.getElementById("button");
  
    buttonredirect.addEventListener("click", function () {
      window.location.href = "cadastroPatrimonio";
    });
  }
  function buttonvoltar() {
    const buttonredirect = document.getElementById("buttonvoltar");
  
    buttonredirect.addEventListener("click", function () {
      window.location.href = "home";
    });
  }
  function reloadpage() {
    location.reload();
  }
  $(document).ready(function () {
    $(document).on("click", ".view_data", function () {
      var patrimonio_id = $(this).attr("id");
      // alert(patrimonio_id);
      if (patrimonio_id !== "") {
        var dados = {
          patrimonio_id: patrimonio_id,
        };
        $.post("../php/vizualizarpatrimonio.php", dados, function (retorna) {
          $('#visual_patrimonio').html(retorna);
          $('#visualizarPatrimonioModal').modal('show');
      });
      }
    });
  });
  $(document).ready(function () {
    $(document).on("click", ".delete_data", function () {
      var delete_id = $(this).attr("id");
      // alert(delete_id);
      if (delete_id !== "") {
        var dados = {
          delete_id: delete_id,
        };
        $.post("../php/deletePatrimonio.php", dados, function (retorna) {
          $('#delete_patrimonio').html(retorna);
          $('#deletePatrimonioModal').modal('show');
      });
      }
    });
  });