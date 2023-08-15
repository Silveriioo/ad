<?php

$nome = $_POST['nome'];
$patrimonio = $_POST['patrimonio'];
$destino = $_POST['destino'];
$pa = $_POST['pa'];
$data_cadastro = $_POST['data_cadastro'];
$usuario = $_POST['usuario'];

include_once("../connection/connection.php");

if ($conn->connect_errno) {
    echo json_encode(['success' => false, 'message' => 'Falha na conexão']);
    return;
}

$consulta = "SELECT * FROM ad.patrimonio WHERE patrimonio = ?";
$statement = $conn->prepare($consulta);
$statement->bind_param("s", $patrimonio);
$statement->execute();
$resultado = $statement->get_result();

if ($resultado->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Patrimonio já cadastrado.']);
    exit;
}

$insercao = "INSERT INTO ad.patrimonio (nome,patrimonio,destino,pa,data_cadastro,usuario) VALUES (?,?,?,?,?,?)";
$statement = $conn->prepare($insercao);
$statement->bind_param("ssssss", $nome, $patrimonio, $destino, $pa, $data_cadastro, $usuario);
$statement->execute();

if ($statement->affected_rows > 0) {
    echo json_encode(['success' => true, 'message' => 'Cadastro realizado com sucesso.', 'redirect' => '../page/tabelaPatrimonio']);
} else {
    echo json_encode(['seccess' => false, 'message' => 'Falha ao inserir informações' . $conn->connect_errno]);
    return;
}

$statement->close();
$conn->close();
