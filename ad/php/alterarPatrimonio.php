<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {

    include_once("../connection/connection.php");

    if ($conn->connect_errno) {
        echo json_encode(['success' => false, 'message' => 'Falha na conexão com o banco']);
        exit;
    } else {
        $nome = $_POST['nome'];
        $patrimonio = $_POST['patrimonio'];
        $destino = $_POST['destino'];
        $pa = $_POST['pa'];
        $data_cadastro = $_POST['data_cadastro'];
        $usuario = $_POST['usuario'];
        $id = $_POST['id'];

        // Verifique se a chave "id" está definida no array $_POST
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        } else {
            echo json_encode(['success' => false, 'message' => 'ID do usuário não fornecido']);
            return;
        }

        // Correção da consulta SQL usando a cláusula "SET"
        $update = "UPDATE ad.patrimonio SET nome=?, patrimonio=?, destino=?, pa=?, data_cadastro=?, usuario=? WHERE id=?";

        $state = $conn->prepare($update);
        $state->bind_param("ssssssi", $nome, $patrimonio, $destino, $pa, $data_cadastro, $usuario, $id);

        $state->execute();

        if ($state->affected_rows > 0) {
            echo json_encode(['success' => true, 'redirect' => "../page/tabelaPatrimonio"]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Falha ao alterar as informações']);
            return;
        }
    }
}
