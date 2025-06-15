<?php
require 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $db->prepare("INSERT INTO livros (titulo, autor, ano) VALUES (:titulo, :autor, :ano)");
    $stmt->execute([
        'titulo' => $_POST['titulo'],
        'autor' => $_POST['autor'],
        'ano' => $_POST['ano'],
    ]);

    header('Location: index.php');
    exit;
}
?>