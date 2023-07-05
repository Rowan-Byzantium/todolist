<?php 
    require "../php/_connection-bdd.php";
    $data = json_decode(file_get_contents('php://input'), true);
    header('content-type:application/json');

    $isOk = false;
    $idTask = (int)strip_tags($data['idTask']);
    
    if ($data['action'] === 'deleteTask' && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
        $positionTask = (int)strip_tags($data['positionTask']);
        $query = $dbCo->prepare("DELETE FROM `task` WHERE `id_task` = :id_task;");
        $isOk = $query->execute([
            'id_task' => $idTask
        ]);
        $queryPosition = $dbCo->prepare('UPDATE task SET position = position-1 WHERE position > :position');
        $queryPosition->execute([
            'position' => $positionTask,
        ]);
        $datas = [
            'result' => $isOk,
            'idTask' => $idTask,
            'positionTask' => $positionTask
        ];
        echo json_encode($datas);
    }
    
    if ($data['action'] === 'changeDescription' && $_SERVER['REQUEST_METHOD'] === 'PUT') {
        $descriptionTask = strip_tags($data['description']);
        $query = $dbCo->prepare("UPDATE `task` SET `description` = :description WHERE `id_task` = :id_task");
        $isOk = $query->execute([
            'id_task' => $idTask,
            'description' => $descriptionTask
        ]);

        $datas = [
            'result' => $isOk,
            'idTask' => $idTask,
            'description' => $descriptionTask
        ];

        echo json_encode($datas);
    };