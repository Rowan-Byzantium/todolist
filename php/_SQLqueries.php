<?php


if (isset($_POST['description'])) {
    $queryInsert = $dbCo->prepare("INSERT INTO `task`(`description`) VALUES (:description)");
    
    $isOk = $queryInsert->execute([
        'description' => strip_tags($_POST['description'])
    ]);
    echo '<p>' . ($isOk ? 'la tâche a été ajoutée':'erreur') . '</p>';
    header('location: index.php');
}
$query = $dbCo->prepare('SELECT id_task, date_creation, status, description FROM task WHERE status = 0 ORDER BY date_creation;');
$query->execute();
$result = $query->fetchAll();