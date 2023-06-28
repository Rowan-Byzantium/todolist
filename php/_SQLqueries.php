<?php

$query = $dbCo->prepare('SELECT id_task, date_creation, status, description FROM task WHERE status = 0 ORDER BY date_creation;');
$query->execute();
$result = $query->fetchAll();



$queryInsert = $dbCo->prepare("UPDATE task SET status = 1 WHERE id_task = $id_task");
$id_task = 
$isOk = $queryInsert->execute([
    'description' => strip_tags($_POST['description'])
]);
echo '<p>' . ($isOk ? 'la tâche a été ajoutée':'erreur') . '</p>';
header('location: index.php');
