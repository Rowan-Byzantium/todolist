<?php

require "../php/_connection-Bdd.php";

$query = $dbCo->prepare("SELECT MAX(position) AS positionTask FROM task ");
$query -> execute();

$maxPosition = $query->fetchAll();
$maxPosition = intval($maxPosition[0]['positionTask']);

if (isset($_POST['description'])) {
    $queryInsert = $dbCo->prepare("INSERT INTO `task`(`description`, `position`)  VALUES (:description, :position)");
    $isOk = $queryInsert->execute([
        'description' => strip_tags($_POST['description']),
        'position' => $maxPosition +1,
    ]);
    // echo '<p>' . ($isOk ? 'la tâche a été ajoutée' : 'erreur') . '</p>';
    header('location: ../index.php?okMsg=' . ($isOk ? 'la tâche a bien été ajoutée !' : 'Ça n\'a pas marché...'));
    exit;
}
