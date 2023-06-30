<?php

require "../php/_connection-Bdd.php";




// dans le header : ajouté un paramètre msg='' avec un ternaire about isok
// dans la page index : faire un if array key exists 'msg', $_GET

if (array_key_exists('id_task', $_GET)) {
    $queryInsert = $dbCo->prepare("UPDATE task SET status = 1 WHERE id_task = :id");
    $isOkStatus = $queryInsert->execute([
        'id' => intval(strip_tags($_GET["id_task"]))
    ]);
    // echo '<p>' . ($isOk ? 'la tâche a été validée':'erreur') . '</p>';
    header('location: ../index.php');
};





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