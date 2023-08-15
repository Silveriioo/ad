  $("#deletar").on("submit", function (e) {
    e.preventDefault();
  
    let data = {
      id: $("#id").val()
    };
  
    if (
      data.id == ""
    ) {
      alert("ID não encontrado, não a como deleter o usuário sem ID.");
      return;
    }
  
    function getRoot() {
      return "http://" + document.location.hostname + "/";
    }
  
    $.ajax({
      type: "POST",
      url: getRoot() + "ad/php/apagarUsuario",
      data: data,
      dataType: "json",
      success: function (response) {
        if (response.success) {
          document.location.href = response.redirect;
        } else {
          alert(response.message);
        }
      },
      error: function (xhr, status, error) {
        alert("Falha não identificado, contate o administrador.");
      },
    });
  });
  