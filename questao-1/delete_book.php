<?php
require 'database.php';
if (isset($_GET['id'])) {
  $stmt = $db->prepare("delete from livros where id = :id");
  $stmt->execute([':id' => $_GET['id']]);
}
header('location: index.php');
exit;
?>