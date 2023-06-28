<?php
require "php/_connection-Bdd.php";

if (isset($_POST['description'])) {
    $queryInsert = $dbCo->prepare("INSERT INTO `task`(`description`) VALUES (:description)");
    
    $isOk = $queryInsert->execute([
        'description' => strip_tags($_POST['description'])
    ]);
    echo '<p>' . ($isOk ? 'la tâche a été ajoutée':'erreur') . '</p>';
    header('location: index.php');
    exit;
}




if (array_key_exists('id_task', $_GET)){
$queryInsert = $dbCo->prepare("UPDATE task SET status = 1 WHERE id_task = :id");
$isOk = $queryInsert->execute([
    'id' => intval(strip_tags($_GET["id_task"]))
]);
echo '<p>' . ($isOk ? 'la tâche a été validée':'erreur') . '</p>';
header('location: index.php');}
