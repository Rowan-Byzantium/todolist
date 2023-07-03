<?php

require "../php/_connection-Bdd.php";

// $query = $dbCo->prepare("SELECT description position  FROM task ");
// $query -> execute();
// $result = $query->fetchAll();


if ($_REQUEST['action'] === 'down'){
    $queryPosition = $dbCo->prepare('UPDATE task SET position = :position WHERE position = :positionPrev');
    $queryPosition->execute([
        'positionPrev' => $_GET['position']+1,
        'position' => $_GET['position'],
    ]);

    $queryPosition = $dbCo->prepare('UPDATE task SET position = :position WHERE id_task = :id');
    $queryPosition->execute([
        'position' => $_GET['position'] +1,
        'id' => intval(strip_tags($_GET["id_task"]))
    ]);
    header('location: ../index.php');
}
if ($_REQUEST['action'] === 'up'){
    $queryPosition = $dbCo->prepare('UPDATE task SET position = :position WHERE position = :positionPrev');
    $queryPosition->execute([
        'positionPrev' => $_GET['position'] -1,
        'position' => $_GET['position'],
    ]);
    $queryPosition = $dbCo->prepare('UPDATE task SET position = :position WHERE id_task = :id');
    $queryPosition->execute([
        'position' => $_GET['position'] -1,
        'id' => intval(strip_tags($_GET["id_task"]))
    ]);
    
    header('location: ../index.php');
}