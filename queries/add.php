<?php

require "../php/_connection-Bdd.php";


if (isset($_POST['description'])) {
    $queryInsert = $dbCo->prepare("INSERT INTO `task`(`description`) VALUES (:description)");
    $isOk = $queryInsert->execute([
        'description' => strip_tags($_POST['description'])
    ]);
    // echo '<p>' . ($isOk ? 'la tâche a été ajoutée' : 'erreur') . '</p>';
    header('location: ../index.php?okMsg=' . ($isOk ? 'la tâche a bien été ajoutée !' : 'Ça n\'a pas marché...'));
    exit;
}
