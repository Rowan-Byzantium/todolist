<?php

require "../php/_connection-Bdd.php";

if (isset($_POST['description'])) {
    $queryInsert = $dbCo->prepare("UPDATE task SET description = :description WHERE id_task = :id");
    $isOk = $queryInsert->execute([
        'id' => intval(strip_tags($_POST['id_task'])),
        'description' => strip_tags($_POST['description'])
    ]);
    var_dump($_POST['description']);
    exit;
    // echo '<p>' . ($isOk ? 'la tâche a été ajoutée' : 'erreur') . '</p>';
    header('location: ../index.php?okMsg=' . ($isOk ? 'la tâche a bien été modifiée !' : 'Ça n\'a pas marché...'));
    exit;
}