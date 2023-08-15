$(document).ready(function () {
  $("#myTable").DataTable();
});

function buttonredirect() {
  const buttonredirect = document.getElementById("button");

  buttonredirect.addEventListener("click", function () {
    window.location.href = "cadastroUsuario";
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
    var user_id = $(this).attr("id");
    // alert(user_id);
    if (user_id !== "") {
      var dados = {
        user_id: user_id,
      };
      $.post("../php/vizualizarUsuario.php", dados, function (retorna) {
        $('#visual_usuario').html(retorna);
        $('#visualizarUsuarioModal').modal('show');
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
      $.post("../php/deleteUsuario.php", dados, function (retorna) {
        $('#delete_usuario').html(retorna);
        $('#deleteUsuarioModal').modal('show');
    });
    }
  });
});