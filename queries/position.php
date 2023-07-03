<?php

require "../php/_connection-Bdd.php";

$query = $dbCo->prepare("SELECT MAX(position) AS maxpo FROM task ");
$query->execute();
$result = $query->fetchAll();
$pos = intval($_GET['position']);
$maxpos = intval($result[0]['maxpo']);

if ($_REQUEST['action'] === 'down' && $pos < $maxpos) {
    $queryPosition = $dbCo->prepare('UPDATE task SET position = :position WHERE position = :positionPrev');
    $queryPosition->execute([
        'positionPrev' => $_GET['position'] + 1,
        'position' => $_GET['position'],
    ]);

    $queryPosition = $dbCo->prepare('UPDATE task SET position = :position WHERE id_task = :id');
    $queryPosition->execute([
        'position' => $_GET['position'] + 1,
        'id' => intval(strip_tags($_GET["id_task"]))
    ]);
    header('location: ../index.php');
}
if ($_REQUEST['action'] === 'up'&& $pos > 1) {
    $queryPosition = $dbCo->prepare('UPDATE task SET position = :position WHERE position = :positionPrev');
    $queryPosition->execute([
        'positionPrev' => $_GET['position'] - 1,
        'position' => $_GET['position'],
    ]);
    $queryPosition = $dbCo->prepare('UPDATE task SET position = :position WHERE id_task = :id');
    $queryPosition->execute([
        'position' => $_GET['position'] - 1,
        'id' => intval(strip_tags($_GET["id_task"]))
    ]);

    header('location: ../index.php');
}
else {
    header('location: ../index.php');
}
