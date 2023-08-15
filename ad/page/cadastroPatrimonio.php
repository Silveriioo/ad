<?php

session_start();
if (isset($_SESSION['id'])) {
  $idUsuario = $_SESSION['id'];
} else {
  $mensagem = "Faça login antes de prosseguir.";
  $url = "../index.html";
  echo "<script>alert('$mensagem'); window.location.href = '$url';</script>";
  exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/cadastroPatrimonio.css" />
  <title>Patrimonio</title>
   <!-- Font Awesome -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
</head>

<body>
  <div class="container1">
    <div class="centered-content1">
      <form method="POST" id="cadastro">
        <!-- NOME -->
        <div class="form-outline mb-4">
          <input type="text" name="nome" id="nome" class="form-control" />
          <label class="form-label" for="form6Example4">Nome do Proprietario</label>
        </div>

        <!-- PATRIMONIO -->
        <div class="form-outline mb-4">
          <input type="number" name="patrimonio" id="patrimonio" class="form-control" />
          <label class="form-label" for="form6Example3">N° Patrimônio</label>
        </div>

        <!-- Destino -->
        <div class="form-outline mb-4">
          <input type="text" name="destino" id="destino" class="form-control" />
          <label class="form-label" for="form6Example4">Destino</label>
        </div>

        <!-- PA -->
        <div class="form-outline mb-4">
          <input type="text" name="pa" id="pa" class="form-control" maxlength="4" />
          <label class="form-label" for="form6Example5">PA</label>
        </div>

        <!-- DATA -->
        <div class="form-outline mb-4">
          <input type="date" name="data" id="data_cadastro" class="form-control"/>
          <label class="form-label" for="form6Example3">Data do cadastro</label>
        </div>

        <!-- USUARIO -->
        <div class="form-outline mb-4">
          <input type="text" name="usuario" id="usuario" class="form-control"/>
          <label class="form-label" for="form6Example6">Usuario Cadastrante</label>
        </div>

        <div class="submit">
          <center>
            <input type="submit" id="cadastrar" value="Cadastrar" />
          </center>
        </div>
      </form>
    </div>
  </div>
</body>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
<!--JQUERY-->
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="../js/cadastroPatrimonio.js"></script>

</html>