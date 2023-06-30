<?php
require "php/_connection-Bdd.php";
/**
 * A function to apply a class to the task. 
 *
 * @param [type] $bool --the status of the task in the database
 * @return string --the class of the task
 */
function isValid($bool)
{
    return ($bool == 0) ? '_in-progress' : '_valid';
}
/**
 * Undocumented function
 *
 * @param [type] $array --the list of the tasks in the database
 * @return string -- the list of the tasks in an html list
 */
function getList($array)
{

    $li = '<ul class="tasks-list">';
    foreach ($array as $task) {
        $li .= '<li class="task">
                    <li class="task' . isValid($task['status']) . ' task-1">
                        <a href="queries/status.php?id_task='.$task['id_task'].'" class="task_button' . isValid($task['status']) . ' "></a>
                        <h3 class="task_title">' . $task['description'] . '</h3>
                        <a href="queries/delete.php?id_task=' . $task['id_task'] . '">
                            <img class="task_button-cross" src="img/cross.png">
                        </a>
                    </li>
                    <li class="task' . isValid($task['status']) . ' task-2 task_param">
                        <h3 class="task_title">Create on ' . $task['date_creation'] . '</h3>
                        <img class="task_button-param" src="img/param.png">
                    </li>
                </li>';
    }
    $li .= '</ul>';
    return $li;
}

function displayLists($status){
    global $dbCo;
$query = $dbCo->prepare('SELECT id_task, date_creation, status, description FROM task WHERE status = :status ORDER BY date_creation;');
$query->execute([
    'status' => $status
]);
$result = $query->fetchAll();
echo getList($result);
}
