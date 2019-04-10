<?php
    $errors = "";

    //conectar ao banco
    $db = mysqli_connect('localhost', 'root', '', 'todo');

    if (isset($_POST['submit'])) {
        $task = $_POST['task'];
        if (empty($task)) {
            $errors = "Não pode criar tarefa em branco!";
        } else {
            mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
            header('location: index.php');
        }
    }

    // delete task
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
        mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
        header('location: index.php');
    }

    $tasks = mysqli_query($db, "SELECT * FROM tasks");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>ToDo List - ESIG</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="heading">
    <h2>ToDo List com PHP - Desafio ESIG</h2>
    </div>

    <form method="POST" action="index.php">
    <?php if (isset($errors)) { ?>
        <p><?php echo $errors; ?></p>
    <?php } ?>
    
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
        <?php $i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td class="task"><?php echo $row['task']; ?></td>
                <td></td>   <!-- Não sei o porque, mas sem colocar esse td, o X não fica alinhado  -->
                <td class="delete">
                    <a href="index.php?del_task=<?php echo $row['id']; ?>">X</a>
                </td>
            </tr>
        <?php $i++; } ?>
        </tbody>
    </table>
</body>
</html>
