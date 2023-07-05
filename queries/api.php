<?php
session_start();
require "../php/_connection-bdd.php";
$data = json_decode(file_get_contents('php://input'), true);
$error =
    $isOk = false;
$idTask = (int)strip_tags($data['idTask']);
$positionTask = (int)strip_tags($data['positionTask']);

if (
    !array_key_exists('token', $_SESSION) ||
    !array_key_exists('token', $data) ||
    $_SESSION['token'] !== $data['token']
) {
    echo json_encode([
        'result' => 'false',
        'error' => 'Accès refusé, jeton invalide.',
        'token session' => $_SESSION['token'],
        'token data' => $data['token']

    ]);
    exit;
}

if ($data['action'] === 'deleteTask' && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $query = $dbCo->prepare("DELETE FROM `task` WHERE `id_task` = :id_task;");
    $isOk = $query->execute([
        'id_task' => $idTask
    ]);
    $queryPosition = $dbCo->prepare('UPDATE task SET position = position-1 WHERE position > :position');
    $queryPosition->execute([
        'position' => $positionTask,
    ]);
}

header('content-type:application/json');
$datas = [
    'result' => $isOk,
    'idTask' => $idTask,
    'positionTask' => $positionTask,
];
echo json_encode($datas);
