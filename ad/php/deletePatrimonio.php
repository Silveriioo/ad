<?php

if (isset($_POST['delete_id'])) {
    include_once("../connection/connection.php");

    $consulta = "SELECT * FROM ad.patrimonio WHERE id = '" . $_POST['delete_id'] . "' LIMIT 1 ";
    $resultado_patrimonio = mysqli_query($conn, $consulta);
    $row_patrimonio = mysqli_fetch_assoc($resultado_patrimonio);

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
          <form method="POST" id="deletar">
          <input type="hidden" name="id" id="id" value="' . $row_patrimonio["id"] . '"/>
          <h4>Você tem certeza que deseja deletar o patrimônio '. $row_patrimonio['patrimonio'] .'?</h4>
            <div class="submit">
              <center><input type="submit" id="cadastrar" value="Deletar" /></center>
            </div>
          </form>
        </div>
      </div>
    </body>
    
    <script src="../js/deletarPatrimonio.js"></script>
    
    </html>
    ';

    echo $html;
}
