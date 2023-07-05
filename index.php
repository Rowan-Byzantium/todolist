<?php

require "php/_connection-bdd.php";
include "php/_function.php";

session_start();

$_SESSION['token'] = md5(uniqid(mt_rand(), true));

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
// require "queries/status.php"
?>

<body>
    <H1 class="title">My Tasks</H1>
    <?php
    if (array_key_exists('okMsg', $_GET)) {
        $Message = $_GET['okMsg'];
    };

    echo displayLists(0)
    ?>
    <div class="img_add-container">
        <img class="img_add" src="img/+.png" alt="">
    </div>
    <hr>
    <div class="accord">
        <h2 class="title">My finished tasks</h2><button type="button" class="btn-accord" data-open="false"><img class="plusMinus" src="img/plus.png" alt=""></button>
    </div>
    <div class="accordeon display-none">
    <?= displayLists(1) ?>
    </div>

    <!-- <form action="index.php" method="post" class="delete-task">
        <input type="submit" class="task_button-cross" value="delete task">
    </form> -->

    <div class="background-form">
        <form action="queries/add.php" method="post" class="add-task">
            <input type="text" name="description" id="description" placeholder="Enter your task:" required>
            <input class="add-task_button" type="submit" value="Add task">
            <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
        </form>
        <!-- <input type="submit" class="" value="update task"> -->
    </div>

    <div class="modification-form">
        <form action="queries/param.php" method="post" class="modif-task">
            <input type="text" name="description" id="description" placeholder="Modify your task:" required>
            <input class="id" type="hidden" name="id_task" value="">
            <input class="modif-task_button" type="submit" value="modif task">
            <input type="hidden" name="token" value="<?=$_SESSION['token'] ?>">
        </form>
        <!-- <input type="submit" class="" value="update task"> -->
    </div>



</body>
<script src="asynch.js"></script>
<script src="script.js"></script>

</html>