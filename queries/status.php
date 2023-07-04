<?php

require "../php/_connection-Bdd.php";
session_start();

// dans le header : ajouté un paramètre msg='' avec un ternaire about isok
// dans la page index : faire un if array key exists 'msg', $_GET

if (
    !array_key_exists('token', $_SESSION) ||
    !array_key_exists('token', $_REQUEST) ||
    $_SESSION['token'] !== $_REQUEST['token']
) {
    echo 'error CSRF';
} else {
    if (array_key_exists('id_task', $_REQUEST) && array_key_exists('pos', $_REQUEST)) {
        $queryInsert = $dbCo->prepare("UPDATE task SET status = 1 WHERE id_task = :id");
        $isOkStatus = $queryInsert->execute([
            'id' => intval(strip_tags($_REQUEST["id_task"]))
        ]);
        // echo '<p>' . ($isOk ? 'la tâche a été validée':'erreur') . '</p>';
        
        $queryPos = $dbCo->prepare('UPDATE task SET position = 0 WHERE id_task = :id');
        $isOkStatus = $queryPos->execute([
            'id' => (int)strip_tags($_REQUEST["id_task"])
        ]);

        $queryPosition = $dbCo->prepare('UPDATE task SET position = position - 1 WHERE position > :position');
        $queryPosition->execute([
            'position' => $_REQUEST['pos']
        ]);
        header('location: ../index.php');
    }
    else {
        echo 'id or position error';
    }
}

?>




<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Me Not</title>
    <link rel="stylesheet" href="Css/style.css">
</head> <body class="body_background">
    <H1 class="title">My Task</H1>-->





<!-- if (array_key_exists('id_task', $_GET)) {
         $queryInsert = $dbCo->prepare("UPDATE task SET status = 1 WHERE id_task = :id");
         $isOk = $queryInsert->execute([
             'id' => intval(strip_tags($_GET["id_task"]))
         ]);
         echo '<p>' . ($isOk ? 'la tâche a été validée' : 'erreur') . '</p>';
     } -->

<!-- <a class="button_return" href ="index.php">Return to my tasks</a>

</body>
<script src="script.js"></script>

</html> -->