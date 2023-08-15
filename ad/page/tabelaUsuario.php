<?php
session_start();
if (!isset($_SESSION['id'])) {
    $mensagem = "Faça login antes de prosseguir.";
    $url = "../index.html";
    echo "<script>alert('$mensagem'); window.location.href = '$url';</script>";
    exit;
}


?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tabelaUsuario.css">

    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!--JQUERY-->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!--DATATABLE-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.js"></script>
    <!--JS-->
    <script src="../js/tabelaUsuario.js"></script>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />


    <title>Usuario</title>


</head>

<body>

    <div class="container">
        <input type="submit" value="Voltar" id="buttonvoltar" onclick="buttonvoltar()">
        <input type="submit" value="Cadastrar" id="button" onclick="buttonredirect()">
        <div class="content">
            <table id="myTable" class="display ">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Data de Nascimento</th>
                        <th>Função</th>
                        <th>PA</th>
                        <th>Email</th>
                        <th>Senha</th>
                        <th>Nivel</th>
                        <th>Ações</th>

                    </tr>

                </thead>

                <tbody>

                    <?php
                    include_once("../php/graph.php");

                    while ($infodb = mysqli_fetch_assoc($resultado)) {

                        $senha = '';

                    ?>

                        <tr>
                            <th><?php echo $infodb['id'] ?></th>
                            <td><?php echo $infodb['nome'] ?></td>
                            <td><?php echo $infodb['data_nascimento'] ?></td>
                            <td><?php echo $infodb['funcao'] ?></td>
                            <td><?php echo $infodb['pa'] ?></td>
                            <td><?php echo $infodb['email'] ?></td>
                            <td><?php echo $senha ?></td>
                            <td><?php echo $infodb['nivel'] ?></td>
                            <td>
                                <div class="button-container">
                                    <button type="button" class="btn btn-outline view_data" id="<?php echo $infodb['id'] ?>"><i class='bi bi-eye-fill'></i></button>
                                    <button type="button" class="btn btn-outline delete_data" id="<?php echo $infodb['id'] ?>"> <i class='bi bi-trash' d='trash'></i></button>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }

                    $conn->close();
                    ?>

                </tbody>

            </table>
            <div id="visualizarUsuarioModal" class="modal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Alterar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="reloadpage()"></button>
                        </div>
                        <div class="modal-body">
                            <span id="visual_usuario"></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="deleteUsuarioModal" class="modal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Deletar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="reloadpage()"></button>
                        </div>
                        <div class="modal-body">
                            <span id="delete_usuario"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>

<!--OLHO<i class='bi bi-eye-fill' id='eye'></i>-->
<!--LIXEIRA    <i class='bi bi-trash' id='trash'></i>-->