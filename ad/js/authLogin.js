$("#login").on("submit", function (e) {
  e.preventDefault();

  let data = {
    email: $("#email").val(),
    senha: $("#senha").val(),
  };

  if (data.email == "" || data.senha == "") {
    alert("Campo vazio, preencha todos os campos.");
    return;
  }

  function getRoot() {
    return "http://" + document.location.hostname + "/";
  }

  $.ajax({
    type: "POST",
    url: getRoot() + "ad/php/authLogin.php",
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

//senha
function togglePasswordVisibility() {
  const passwordInput = document.getElementById("senha");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}
