<?php

function isValid($bool)
{
    return ($bool == 0) ? '"task_in_progress"' : '"task_valid"';
}

function getList($array)
{

    $li = '<ul class="tasks-list">';
    foreach ($array as $task) {
        $li .= '<li class=' . isValid($task['status']) . '><a href="SQLqueries.php?id_task='.$task['id_task'].'" class="task_button-valid "></a>
                <h3 class="task_title">' . $task['description'] . '</h3><img class="task_button-cross" src="img/cross.png" alt="">
                </li>';
    }
    $li .= '</ul>';
    return $li;
}

