<?php
/**
 * A function to apply a class to the task. 
 *
 * @param [type] $bool --the status of the task in the database
 * @return string --the class of the task
 */
function isValid($bool)
{
    return ($bool == 0) ? '_in-progress' : '_valid"';
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
        $li .= '<li class="task' . isValid($task['status']) . '"><a href="SQLqueries.php?id_task='.$task['id_task'].'" class="task_button' . isValid($task['status']) . '"></a>
                <h3 class="task_title">' . $task['description'] . '</h3><img class="task_button-cross" src="img/cross.png" alt="">
                </li>';
    }
    $li .= '</ul>';
    return $li;
}
