<?php

if (isset($_POST['user_id'])) {
    include_once("../connection/connection.php");

    $consulta = "SELECT * FROM ad.usuario WHERE id = '" . $_POST['user_id'] . "' LIMIT 1 ";
    $resultado_user = mysqli_query($conn, $consulta);
    $row_user = mysqli_fetch_assoc($resultado_user);

    $html = '
    <!DOCTYPE html>
    <html lang="pt-BR">
    
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link rel="stylesheet" href="../css/cadastroUsuario.css" />
      <!-- Font Awesome -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
      <!-- MDB -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
      <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
    <!--JQUERY-->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    </head>
    
    <body>
      <div class="container1">
        <div class="centered-content1">
          <form method="POST" id="alterar">
          <input type="hidden" name="id" id="id" value="' . $row_user["id"] . '"/>
            <!-- NOME -->
            <div class="form-outline mb-4">
              <input type="text" name="nome" id="nome" class="form-control" value="' . $row_user["nome"] . '"/>
              <label class="form-label" for="form6Example4">Nome Completo</label>
            </div>
    
            <!-- DATA -->
            <div class="form-outline mb-4">
              <input type="date" name="data" id="data_nascimento" class="form-control" value="' . $row_user["data_nascimento"] . '"/>
              <label class="form-label" for="form6Example3">Data de Nascimento</label>
            </div>
    
            <!-- FUNCAO -->
            <div class="form-outline mb-4">
              <input type="text" name="funcao" id="funcao" class="form-control" value="' . $row_user["funcao"] . '"/>
              <label class="form-label" for="form6Example4">Função</label>
            </div>
    
            <!-- PA -->
            <div class="form-outline mb-4">
              <input type="text" name="pa" id="pa" class="form-control" maxlength="4" value="' . $row_user["pa"] . '"/>
              <label class="form-label" for="form6Example5">PA</label>
            </div>
    
            <!-- EMAIL -->
            <div class="form-outline mb-4">
              <input type="email" name="email" id="email" class="form-control" value="' . $row_user["email"] . '"/>
              <label class="form-label" for="form6Example6">Email</label>
            </div>
    
            <!-- SENHA -->
            <div class="form-outline mb-4">
              <input type="password" id="senha" placeholder="Digite sua senha" class="form-control" maxlength="20" minlength="8" value="' . $row_user["senha"] . '"/>
              <label class="form-label" for="form6Example5">Senha</label>
            </div>
    
            <div class="submit">
              <center><input type="submit" id="cadastrar" value="Alterar" /></center>
            </div>
          </form>
        </div>
      </div>
    </body>
    
    <script src="../js/alterarUsuario.js"></script>
    
    </html>
    ';

    echo $html;
}
