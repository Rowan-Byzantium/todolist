<?php

require "../php/_connection-bdd.php";
session_start();

// var_dump($_REQUEST);

if (
    !array_key_exists('token', $_SESSION) ||
    !array_key_exists('token', $_REQUEST) ||
    $_SESSION['token'] !== $_REQUEST['token']
) {
    echo 'error CSRF';
} else {
    if (array_key_exists('id_task', $_GET)) {
        $queryDelete = $dbCo->prepare('DELETE FROM task WHERE id_task = :id');
        $isOkDelete = $queryDelete->execute([
            'id' => intval(strip_tags($_GET["id_task"]))
        ]);

        $queryPosition = $dbCo->prepare('UPDATE task SET position = position-1 WHERE position > :position');
        $queryPosition->execute([
            'position' => $_GET['position'],
        ]);


        header('location: ../index.php?okMsg=' . ($isOkDelete ? 'la tâche a bien été supprimée !' : 'Ça n\'a pas marché...'));
    }
}
