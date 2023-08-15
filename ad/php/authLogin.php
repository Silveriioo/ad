<?php
include_once("../connection/connection.php");

$ipCliente = $_SERVER['REMOTE_ADDR'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "INSERT INTO ad.usuarios_acessos (ip,email) VALUES (?,?)";
$state = $conn->prepare($sql);
$state->bind_param("ss", $ipCliente, $email);
$state->execute();


if ($conn->connect_errno) {
    echo json_encode(['success' => false, 'message' => 'Flaha na conexão']);
    return;
}

$consulta = "SELECT * FROM ad.usuario WHERE email = ?";
$statement = $conn->prepare($consulta);
$statement->bind_param("s", $email);
$statement->execute();
$result = $statement->get_result();

if (mysqli_num_rows($result) < 1) {
    echo json_encode(['success' => false, 'message' => 'Usuário não cadastrado.']);
    exit;
} else {
    $row = $result->fetch_assoc();
    $hash = $row['senha'];
    $id = $row['id'];
    $NivelAcesso = $row['nivel'];

    if (password_verify($senha, $hash)) {
        session_start();
        $_SESSION['id'] = $id;
        $_SESSION['nivel'] = $NivelAcesso;

        echo json_encode(['success' => true, 'message' => 'Login realizado com sucesso.', 'redirect' => "page/home"]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Senha incorreta']);
        return;
    }
}
