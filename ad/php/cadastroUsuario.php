<?php

$nome = $_POST['nome'];
$data_nascimento = $_POST['data_nascimento'];
$funcao = $_POST['funcao'];
$pa = $_POST['pa'];
$email = $_POST['email'];
$senha = $_POST['senha'];
// $nivel =  $_POST['nivel'];

include_once("../connection/connection.php");

if ($conn->connect_errno) {
    echo json_encode(['success' => false, 'message' => 'Flaha na conexão']);
    return;
}

$consulta = "SELECT * FROM ad.usuario WHERE nome = ? OR email = ?";
$statement = $conn->prepare($consulta);
$statement->bind_param("ss", $nome, $email); 
$statement->execute();
$resultado = $statement->get_result();

if ($resultado->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Usuário ou email já cadastrado.']);
    exit;
}

$hash = password_hash($senha, PASSWORD_DEFAULT);
$insercao = "INSERT INTO ad.usuario (nome,data_nascimento,funcao,pa,email,senha) VALUES (?,?,?,?,?,?)";
$statement = $conn->prepare($insercao);
$statement->bind_param("ssssss", $nome, $data_nascimento, $funcao, $pa, $email, $hash);
$statement->execute();

if ($statement->affected_rows > 0) {
    echo json_encode(['success' => true, 'message' => 'Cadastro realizado com sucesso.', 'redirect' => '../page/tabelaUsuario']);
} else {
    echo json_encode(['seccess' => false, 'message' => 'Falha ao inserir informações' . $conn->connect_errno]);
    return;
}

$statement->close();
$conn->close();
