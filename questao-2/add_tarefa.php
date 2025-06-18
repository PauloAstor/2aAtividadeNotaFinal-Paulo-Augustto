<?php
include 'database.php';

if (!empty($_POST['descricao'])) {
    $descricao = $_POST['descricao'];
    $data = $_POST['data'] ?? null;

    $stmt = $db->prepare("INSERT INTO tarefas (descricao, data_vencimento) VALUES (?, ?)");
    $stmt->execute([$descricao, $data]);
}

header("Location: index.php");
exit();
?>