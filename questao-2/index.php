<?php include 'database.php'; ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>gerenciador de tarefas 💼</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #0e1a1f;
            color: #e0f7fa;
            margin: 40px auto;
            max-width: 700px;
        }

        h1, h2 {
            color: #00e5ff;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            margin-bottom: 33px;
            background-color: #132a33;
            padding: 26px;
            border-radius: 10px;
        }

        input[type="text"], input[type="date"] {
            padding: 12px;
            margin-bottom: 14px;
            border: none;
            border-radius: 7px;
            outline: none;
            background-color: #1e3a44;
            color: #e0f7fa;
        }

        button {
            background-color: #00e5ff;
            color: #00363a;
            border: none;
            padding: 13px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #fcfcfc;
            transform: scale(1.05);
        }

        ul {
            list-style: none;
            padding-left: 0;
        }

        li {
            background-color: #132a33;
            margin-bottom: 13px;
            padding: 15px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        li.concluida {
            text-decoration: line-through;
            color: #80deea;
        }

        a {
            margin-left: 10px;
            color: #00e5ff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #18ffff;
        }

        .data {
            display: flex;
            gap: 8px;
        }
    </style>
</head>
<body>
    <h1> Lista de tarefas </h1>

    <form method="POST" action="add_tarefa.php">
        <input type="text" name="descricao" placeholder="Descrição da tarefa" required>
        <input type="date" name="data">
        <button type="submit">➕ Adicionar Tarefa</button>
    </form>

    <h2>⏳ tarefas pendentes</h2>
    <ul>
    <?php
        $res = $db->query("SELECT * FROM tarefas WHERE concluida = 0 ORDER BY data_vencimento");
        foreach ($res as $tarefa) {
            echo "<li>
                <span>{$tarefa['descricao']} - {$tarefa['data_vencimento']}</span>
                <div class='data'>
                    <a href='update_tarefa.php?id={$tarefa['id']}'>✅</a>
                    <a href='delete_tarefa.php?id={$tarefa['id']}'>🗑️</a>
                </div>
            </li>";
        }
    ?>
    </ul>

    <h2>✔️ tarefas concluidas</h2>
    <ul>
    <?php
        $res = $db->query("SELECT * FROM tarefas WHERE concluida = 1 ORDER BY data_vencimento");
        foreach ($res as $tarefa) {
            echo "<li class='concluida'>
                <span>{$tarefa['descricao']} - {$tarefa['data_vencimento']}</span>
                <div class='data'>
                    <a href='delete_tarefa.php?id={$tarefa['id']}'>🗑️</a>
                </div>
            </li>";
        }
    ?>
    </ul>
</body>
</html>