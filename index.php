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
// require "queries/status.php"
?>

<body>
    <H1 class="title">My Task</H1>

    <?php
    if (array_key_exists('okMsg', $_GET)) {
        echo $_GET['okMsg'];
    }

    displayLists(0)
   ?>
   <hr>
  <?php
    displayLists(1)

    ?>

    <!-- <form action="index.php" method="post" class="delete-task">
        <input type="submit" class="task_button-cross" value="delete task">
    </form> -->

    <div class="background-form">
        <form action="queries/add.php" method="post" class="add-task">
            <input type="text" name="description" id="description" placeholder="Enter your task:" required>
            <input class="add-task_button" type="submit" value="Add task">
        </form>
        <!-- <input type="submit" class="" value="update task"> -->
    </div>
    <div class="modification-form">
        <form action="queries/param.php" method="post" class="modif-task">
            <input type="text" name="description" id="description" placeholder="Modify your task:" required>
            <input type="hidden" name="id_task" value="<?=$id_task?>">
            <input class="modif-task_button" type="submit" value="modif task">
        </form>
        <!-- <input type="submit" class="" value="update task"> -->
    </div>



    <img class="img_add" src="img/+.png" alt="">
</body>
<script src="script.js"></script>

</html>