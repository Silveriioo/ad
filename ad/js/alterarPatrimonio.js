function processarPAInput() {
    var paInput = document.getElementById("pa");
    var paValue = paInput.value.trim().toUpperCase();
  
    var padraoValido = /^(PA00|PA01|PA02|PA03|PA97|PA99)$/.test(paValue);
  
    if (padraoValido) {
      paInput.value = paValue;
    } else {
      alert(
        "Padrão de entrada inválido para o campo PA. Utilize PA00, PA01, PA02, PA03, PA97 ou PA99."
      );
      paInput.value = "";
    }
  }
  
  document
    .getElementById("alterar")
    .addEventListener("submit", processarPAInput);
  
  $("#alterar").on("submit", function (e) {
    e.preventDefault();
  
    let data = {
      nome: $("#nome").val(),
      patrimonio: $("#patrimonio").val(),
      destino: $("#destino").val(),
      pa: $("#pa").val(),
      data_cadastro: $("#data_cadastro").val(),
      usuario: $("#usuario").val(),
      id: $("#id").val()
    };
  
    if (
      data.nome == "" ||
      data.patrimonio == "" ||
      data.destino == "" ||
      data.pa == "" ||
      data.data_cadastro == "" ||
      data.usuario == ""
    ) {
      alert("Campo vazio, preencha todos os campos.");
      return;
    }
  
    function getRoot() {
      return "http://" + document.location.hostname + "/";
    }
  
    $.ajax({
      type: "POST",
      url: getRoot() + "ad/php/alterarPatrimonio.php",
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
  