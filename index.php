<?php

require "php/_connection-Bdd.php";
include "php/_function.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Me Not</title>
    <link rel="stylesheet" href="Css/style.css">
</head>
<?php
require "SQLqueries.php"
?>

<body>
    <H1 class="title">My Task</H1>
    <?php
    $query = $dbCo->prepare('SELECT id_task, date_creation, status, description FROM task WHERE status = 0 ORDER BY date_creation;');
    $query->execute();
    $result = $query->fetchAll();
    echo getList($result);

    ?>

    <div class="background-form">
        <form action="SQLqueries.php" method="post" class="add-task">
            <input type="text" name="description" id="description" placeholder="Enter your task:" required>
            <input class="add-task_button" type="submit" value="Add task">
        </form>
    </div>


    <img class="img_add" src="img/+.png" alt="">
</body>
<script src="script.js"></script>

</html>