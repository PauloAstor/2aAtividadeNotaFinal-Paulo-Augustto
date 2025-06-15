<?php require 'database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Livraria</title>
    <style>
        body {
            font-family: sans-serif;
            background: #e0f7fa;
            padding: 40px;
        }

        h1 {
            color: #00bcd4;
        }

        form input, form button {
            margin: 5px;
            padding: 10px 14px;
            border-radius: 7px;
            border: 2px solid #5F9EA0;
            font-size: 16px;
        }

        form button {
            background: linear-gradient(45deg, #00bcd4, #009688);
            color: white;
            border: none;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        form button:hover {
            background: linear-gradient(45deg, #009688, #00796B);
            transform: scale(1.05);
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #bbb;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #b2ebf2;
        }

        h2 {
            font-family: 'Lucida Sans', Geneva, Verdana, sans-serif;
            color: #191970;
        }

        .delete-btn {
            display: inline-block;
            padding: 6px 12px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .delete-btn:hover {
            background-color: #c62828;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <h1>cadastro de livros</h1>
    <form method="POST" action="add_book.php">
        <input type="text" name="titulo" placeholder="Título" required>
        <input type="text" name="autor" placeholder="Autor" required>
        <input type="number" name="ano" placeholder="Ano de Publicação" required>
        <button type="submit">➕ Adicionar Livro</button>
    </form>

    <h2>Livros cadastrados</h2>
    <table>
        <tr>
            <th>ID</th><th>Título</th><th>Autor</th><th>Ano</th><th>Ação</th>
        </tr>
        <?php
        $livros = $db->query("SELECT * FROM livros ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($livros as $livro):
        ?>
        <tr>
            <td><?= $livro['id'] ?></td>
            <td><?= htmlspecialchars($livro['titulo']) ?></td>
            <td><?= htmlspecialchars($livro['autor']) ?></td>
            <td><?= $livro['ano'] ?></td>
            <td>
                <a class="delete-btn" href="delete_book.php?id=<?= $livro['id'] ?>" onclick="return confirm('Deletar este livro?')">🗑️ Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
