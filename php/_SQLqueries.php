<?php

$query = $dbCo->prepare('SELECT id_task, date_creation, status, description FROM task WHERE status = 0 ORDER BY date_creation;');
$query->execute();
// $result = $query->fetchAll();


$query = $dbCo->prepare("INSERT INTO `task`(`description`) VALUES (:description)");

$isOk = $query->execute([
    'description' => strip_tags($_POST['description'])
]);

echo '<p>' . ($isOk ? 'la tâche a été ajoutée':'erreur') . '</p>';