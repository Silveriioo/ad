<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {

    include_once("../connection/connection.php");

    if ($conn->connect_errno) {
        echo json_encode(['success' => false, 'message' => 'Falha na conexão com o banco']);
        exit;
    } else {
        $nome = $_POST['nome'];
        $data = $_POST['data_nascimento'];
        $funcao = $_POST['funcao'];
        $pa = $_POST['pa'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        } else {
            echo json_encode(['success' => false, 'message' => 'ID do usuário não fornecido']);
            return;
        }

        $hash = password_hash($senha, PASSWORD_DEFAULT);

        $update = "UPDATE ad.usuario SET nome=?, data_nascimento=?, funcao=?, pa=?, email=?, senha=? WHERE id=?";

        $state = $conn->prepare($update);
        $state->bind_param("ssssssi", $nome, $data, $funcao, $pa, $email, $hash, $id);

        $state->execute();

        if ($state->affected_rows > 0) {
            echo json_encode(['success' => true, 'redirect' => "../page/tabelaUsuario"]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Falha ao alterar as informações']);
            return;
        }
    }
}
