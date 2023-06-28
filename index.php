<?php

try {
    $dbCo = new PDO(
        'mysql:host=localhost;dbname=forget_me_not;charset=utf8',
        'phpuser',
        '123456'
    );

    $dbCo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die("Can't connect to database." . $e->getMessage());
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Me Not</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
$query = $dbCo->prepare('SELECT description FROM task WHERE status = 0 ORDER BY date_creation DESC;');
$query->execute();
$result = $query->fetchAll();

// var_dump($result);

function getList($array)
{   
    $li = '<ul>';
    foreach ($array as $task) {
        $li .= '<li class="task"><button class="task_button-valid"></button>
                <h3 class="task_title">' . $task['description'] . '</h3><img class="task_button-cross" src="img/cross.png" alt="">
                </li>';
    }
    $li.='</ul>';
    return $li;
}



?>

<body class="body_background">
    <H1 class="title">My Task</H1>

    <?=(getList($result))?>
    <!-- <ul class="tasks-list">
        <li class="task"><button class="task_button-valid"></button>
            <h3 class="task_title"></h3><img class="task_button-cross" src="img/cross.png" alt="">
        </li>
        <li class="task"><button class="task_button-valid"></button>
            <h3 class="task_title">Name of My Task</h3><img class="task_button-cross" src="img/cross.png" alt="">
        </li>
        <li class="task"><button class="task_button-valid"></button>
            <h3 class="task_title">Name of My Task</h3><img class="task_button-cross" src="img/cross.png" alt="">
        </li>
        <li class="task"><button class="task_button-valid"></button>
            <h3 class="task_title">Name of My Task</h3><img class="task_button-cross" src="img/cross.png" alt="">
        </li>
        <li class="task"><button class="task_button-valid"></button>
            <h3 class="task_title">Name of My Task</h3><img class="task_button-cross" src="img/cross.png" alt="">
        </li>
        <li class="task"><button class="task_button-valid"></button>
            <h3 class="task_title">Name of My Task</h3><img class="task_button-cross" src="img/cross.png" alt="">
        </li>
        <li class="task"><button class="task_button-valid"></button>
            <h3 class="task_title">Name of My Task</h3><img class="task_button-cross" src="img/cross.png" alt="">
        </li>
        <li class="task"><button class="task_button-valid"></button>
            <h3 class="task_title">Name of My Task</h3><img class="task_button-cross" src="img/cross.png" alt="">
        </li>
    </ul> -->
</body>

</html>