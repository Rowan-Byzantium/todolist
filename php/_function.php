<?php 
require "php/_connection-bdd.php";
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
        $li .= '<li data-id="' . $task['id_task'] . '" class="task-list">
                    <div class="task' . isValid($task['status']) . '  js-task">
                        <span class="task-itm first-view">
                            <a href="queries/status.php?id_task=' . $task['id_task'] . '&token=' . $_SESSION['token'] . '&pos=' . $task['position'] . '" class="task_button' . isValid($task['status']) . ' "></a>
                            <h3 class="task_title" data-description-id="' . $task['id_task'] . '">' . $task['description'] . '</h3>
                            <button id="token-csrf" value="'.$_SESSION['token'].'" type="button" class="button-delete">

                                <img data-id-task="' . $task['id_task'] . '" data-pos="' . $task['position'] . '" class="task_button-cross" src="img/cross.png">
                            </button>
                        </span>
                        <span class="task-itm display-none second-view">
                            <h3 class="task_title">Create on ' . $task['date_creation'] . '</h3>
                            <button type="button" class="button-param" data-id="' . $task['id_task'] . '">
                            <img class="task_button-param" src="img/param.png">
                            </button>
                        </span>
                        <span class="task-arrow">
                            <a href="queries/position.php?action=up&position=' . $task['position'] . '&id_task=' . $task['id_task'] . '">
                                <img class="task_button-up" src="img/chevron-UP.png">
                            </a>
                            <a href="queries/position.php?action=down&position=' . $task['position'] . '&id_task=' . $task['id_task'] . '">
                                <img class="task_button-down" src="img/chevron-DOWN.png">
                            </a>
                        </span>
                    </div>
                </li>
                ';
    }
    $li .= '</ul>';
    return $li;
}

function displayLists($status)
{
    global $dbCo;
    $query = $dbCo->prepare('SELECT id_task, date_creation, status, description, position FROM task WHERE status = :status ORDER BY position;');
    $query->execute([
        'status' => $status
    ]);
    $result = $query->fetchAll();
    echo getList($result);
}
