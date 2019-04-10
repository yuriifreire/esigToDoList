<?php
    //conectar ao banco
    $db = mysqli_connect('localhost', 'root', '', 'todo');

    if (isset($_POST['submit'])) {
        $task = $_POST['task'];

        mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo List - ESIG</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="heading">
    <h2>ToDo List com PHP - Desafio ESIG</h2>
    </div>

    <form method="POST" action="index.php">
        <input type="text" name="task" class="task_input">
        <button type="submit" class="task_button" name="submit">Adicionar Tarefa</button>
    </form>

    <table>
        <thead>
        <tr>
            <th>N<th>
            <th>Tarefa</th>
            <th>Ação</th>
        </tr>
        </thead>

        <tbody>
            <tr>
                <td>1</td>
                <td class="task">Primeira tarefa</td>
                <td></td>   <!-- Não sei o porque, mas sem colocar esse td, o X não fica alinhado  -->
                <td class="delete">
                    <a href="#">X</a>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>