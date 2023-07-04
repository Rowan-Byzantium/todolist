<?php

require "../php/_connection-Bdd.php";
session_start();

// var_dump($_REQUEST);

if (
    !array_key_exists('token', $_SESSION) ||
    !array_key_exists('token', $_REQUEST) ||
    $_SESSION['token'] !== $_REQUEST['token']
) {
    echo 'error CSRF';
} else {
    // var_dump($_REQUEST);
    // exit;
    if (array_key_exists('id_task', $_REQUEST) && array_key_exists('pos', $_REQUEST)) {
        $queryDelete = $dbCo->prepare('DELETE FROM task WHERE id_task = :id');
        $isOkDelete = $queryDelete->execute([
            'id' => intval(strip_tags($_GET["id_task"]))
        ]);

        $queryPosition = $dbCo->prepare('UPDATE task SET position = position - 1 WHERE position > :position');
        $queryPosition->execute([
            'position' => $_REQUEST['pos']

            //ne marchait pas car la position n'était pas dans n'est pas dans l'URL (get)
            //ne marchait pas car :position selectionnait une seule position et tout passait à cette position -1
        ]);

        header('location: ../index.php?okMsg=' . ($isOkDelete ? 'la tâche a bien été supprimée !' : 'Ça n\'a pas marché...'));
    } else {
        echo 'id ou position inexistante';
    }
}
