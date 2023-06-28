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
$query = $dbCo->prepare('SELECT id_task, date_creation, status, description FROM task ORDER BY date_creation;');
$query->execute();
$result = $query->fetchAll();


?>

<body class="body_background">
    <H1 class="title">My Task</H1>
    <ul class="tasks-list">
        <?php
        foreach ($result as $product) {
            if ($product['status'] == 0) {
                echo '<li class="task"><button class="task_button-valid' . $product['status'] . '"></button>
            <h3 class="task_title">' . $product['description'] . '</h3><img class="task_button-cross" src="img/cross.png" alt="">
        </li>';
            }
        }
        ?>

    </ul>

</body>
<script src="script.js"></script>

</html>