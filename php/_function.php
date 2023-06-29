<?php
/**
 * A function to apply a class to the task. 
 *
 * @param [type] $bool --the status of the task in the database
 * @return string --the class of the task
 */
function isValid($bool)
{
    return ($bool == 0) ? '"task_in_progress"' : '"task_valid"';
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
        $li .= '<li class=' . isValid($task['status']) . '><a href="queries/status.php?id_task='.$task['id_task'].'" class="task_button-valid "></a>
                <h3 class="task_title">' . $task['description'] . '</h3>
                <a href="queries/delete.php?id_task="' . $task['id_task'] . '"><img class="task_button-cross" src="img/cross.png"></a>
                </li>';
    }
    $li .= '</ul>';
    return $li;
}
