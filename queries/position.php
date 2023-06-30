<?php

require "../php/_connection-Bdd.php";


    $queryPosition = $dbCo->prepare('UPDATE task SET position = :position WHERE id_task = :id');
    $queryPosition->execute([
        'position' => $_GET['position'] +1,
        'id' => intval(strip_tags($_GET["id_task"]))
    ]);
    header('location: ../index.php');
