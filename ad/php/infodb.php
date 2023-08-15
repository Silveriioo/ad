<?php
$nome = "";
$data = "";
$funcao = "";
$pa = "";
$email = "";
$senha = "";
$nivel = "";

if (!empty($_GET['id'])) {
    include_once("../connection/connection.php");
    $id = $_GET['id'];
    $consult = "SELECT * FROM ad.usuario WHERE id = '$id'";
    $result = $conn->query($consult);

    if ($result->num_rows > 0) {
        while ($dados = mysqli_fetch_assoc($result)) {
            $nome = $dados['nome'];
            $data = $dados['data_nascimento'];
            $funcao = $dados['funcao'];
            $pa = $dados['pa'];
            $email = $dados['email'];
            $senha = $dados['senha'];
            $nivel = $dados['nivel'];
            $id = $dados['id'];

        }
    }
    $conn->close();
} else {
    echo "<alert>Usuario não encontrado.</alert>";
}


