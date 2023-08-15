<?php
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {

    include_once("../connection/connection.php");

    if ($conn->connect_errno) {
        echo json_encode(['success' => false, 'message' => 'Falha na conexão com o banco']);
        exit;
    } else {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        
            $sql = "DELETE FROM ad.patrimonio WHERE id = ?";
            $state = $conn->prepare($sql);
            $state->bind_param("i", $id);
            $state->execute();

        if ($state->affected_rows > 0) {
            echo json_encode(['success' => true, 'redirect' => "../page/tabelaPatrimonio"]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Falha ao alterar as informações']);
            return;
        }
    }
}
}