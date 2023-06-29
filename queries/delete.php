<?php

require "../php/_connection-Bdd.php";

if (array_key_exists('id_task', $_GET)){
    $queryDelete = $dbCo->prepare('DELETE FROM task WHERE id_task = :id');
    $isOkDelete = $queryDelete->execute([
        'id' => intval(strip_tags($_GET["id_task"]))
    ]);
    header('location: ../index.php?okMsg=' . ($isOkDelete ? 'la tâche a bien été supprimée !' : 'Ça n\'a pas marché...'));
};