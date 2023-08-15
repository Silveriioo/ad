<?php

$quantidade = array();

include_once("../connection/connection.php");
$sql = "SELECT count(*) as qtd
FROM ad.patrimonio
WHERE pa = 'pa00'";

$consulta = mysqli_query($conn, $sql);

while ($dados = mysqli_fetch_array($consulta)) {
    $quantidade["pa00"] = $dados['qtd'];
}

$sql = "SELECT count(*) as qtd
FROM ad.patrimonio
WHERE pa = 'pa00'";

$consulta = mysqli_query($conn, $sql);

while ($dados = mysqli_fetch_array($consulta)) {
    $quantidade["pa00"] = $dados['qtd'];
}

$sql = "SELECT count(*) as qtd
FROM ad.patrimonio
WHERE pa = 'pa01'";

$consulta = mysqli_query($conn, $sql);

while ($dados = mysqli_fetch_array($consulta)) {
    $quantidade["pa01"] = $dados['qtd'];
}

$sql = "SELECT count(*) as qtd
FROM ad.patrimonio
WHERE pa = 'pa02'";

$consulta = mysqli_query($conn, $sql);

while ($dados = mysqli_fetch_array($consulta)) {
    $quantidade["pa02"] = $dados['qtd'];
}

$sql = "SELECT count(*) as qtd
FROM ad.patrimonio
WHERE pa = 'pa03'";

$consulta = mysqli_query($conn, $sql);

while ($dados = mysqli_fetch_array($consulta)) {
    $quantidade["pa03"] = $dados['qtd'];
}

$sql = "SELECT count(*) as qtd
FROM ad.patrimonio
WHERE pa = 'pa97'";

$consulta = mysqli_query($conn, $sql);

while ($dados = mysqli_fetch_array($consulta)) {
    $quantidade["pa97"] = $dados['qtd'];
}

$sql = "SELECT count(*) as qtd
FROM ad.patrimonio
WHERE pa = 'pa99'";

$consulta = mysqli_query($conn, $sql);

while ($dados = mysqli_fetch_array($consulta)) {
    $quantidade["pa99"] = $dados['qtd'];
}

$dados_patrimonio = array();

$sql = "SELECT nome, pa, patrimonio FROM ad.patrimonio"; 
$consulta = mysqli_query($conn, $sql);

while ($dados = mysqli_fetch_array($consulta)) {
    $dados_patrimonio[] = array(
        'nome' => $dados['nome'],
        'pa' => $dados['pa'],
        'patrimonio' => $dados['patrimonio']
    ); 
}

include_once("../connection/connection.php");

$sql = "SELECT * FROM ad.usuario ORDER BY id DESC";
$resultado = $conn->query($sql);

$sqlpatrimonio = "SELECT * FROM ad.patrimonio ORDER BY id DESC";
$resultadopatrimonio = $conn->query($sqlpatrimonio);
