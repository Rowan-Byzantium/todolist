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

include "php/_function.php"
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Me Not</title>
    <link rel="stylesheet" href="Css/style.css">
</head>
<?php
require "php/_SQLqueries.php"
?>

<body class="body_background">
    <H1 class="title">My Task</H1>

    <?= (getList($result)) ?>

</body>
<script src="script.js"></script>

</html>