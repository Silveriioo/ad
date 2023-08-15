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
  
  document.getElementById("alterar").addEventListener("submit", processarPAInput);
  
  function validarEmail() {
    var emailInput = document.getElementById("email");
    var emailValue = emailInput.value.trim().toLowerCase();
  
    var dominioPermitido = emailValue.endsWith("@credicucar.com.br");
  
    if (!dominioPermitido) {
      alert('O email deve ser do domínio "credicucar.com.br"');
      emailInput.value = "";
      emailInput.focus();
      return false;
    }
  
    return true;
  }
  
  document.getElementById("alterar").addEventListener("submit", function (event) {
    if (!validarEmail()) {
      event.preventDefault();
    }
  });
  
  $("#alterar").on("submit", function (e) {
    e.preventDefault();
  
    let data = {
      nome: $("#nome").val(),
      data_nascimento: $("#data_nascimento").val(),
      funcao: $("#funcao").val(),
      pa: $("#pa").val(),
      email: $("#email").val(),
      senha: $("#senha").val(),
      id: $("#id").val()
    };
  
    if (
      data.nome == "" ||
      data.data_nascimento == "" ||
      data.funcao == "" ||
      data.pa == "" ||
      data.email == "" ||
      data.senha == ""
    ) {
      alert("Campo vazio, preencha todos os campos.");
      return;
    }
  
    function getRoot() {
      return "http://" + document.location.hostname + "/";
    }
  
    $.ajax({
      type: "POST",
      url: getRoot() + "ad/php/alterarUsuario",
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
  