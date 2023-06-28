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




// $queryInsert = $dbCo->prepare("UPDATE task SET status = 1 WHERE id_task = $id_task");
// $id_task = 
// $isOk = $queryInsert->execute();
// echo '<p>' . ($isOk ? 'la tâche a été validée':'erreur') . '</p>';
// header('location: index.php');
