<?php

require "../php/_connection-Bdd.php";
session_start();


if (
    !array_key_exists('token', $_SESSION) ||
    !array_key_exists('token', $_REQUEST) ||
    $_SESSION['token'] !== $_REQUEST['token']
) {
    echo 'error CSRF';
} else {
    if (isset($_POST['description'])) {

        $queryInsert = $dbCo->prepare("UPDATE task SET description = :description WHERE id_task = :id");
        $isOk = $queryInsert->execute([
            'id' => intval(strip_tags($_POST['id_task'])),
            'description' => strip_tags($_POST['description'])
        ]);

        // echo '<p>' . ($isOk ? 'la tâche a été ajoutée' : 'erreur') . '</p>';
        header('location: ../index.php?okMsg=' . ($isOk ? 'la tâche a bien été modifiée !' : 'Ça n\'a pas marché...'));
        exit;
    }
}
