<?php

require "php/_connection-Bdd.php";


if (array_key_exists('id_task', $_GET)){
    $queryModif = $dbCo->prepare('UPDATE task SET description = :description WHERE id_task = :id');
    $isOkUpdate = $queryModif->execute([
        'id' => intval(strip_tags($_GET["id_task"])),
        'description'=> strip_tags($_POST['description'])
    ]);
    header('location: ../index.php');
};
