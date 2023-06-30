<?php
try {
    $dbCo = new PDO(
        'mysql:host=localhost;dbname=forget_me_not;charset=utf8',
        'phpuser',
        '123456'

        // $_ENV['DATABASE_HOST'],
        // $_ENV['DATABASE_USER'],
        // $_ENV['DATABASE_PASSWORD']
    );

    $dbCo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    die("Can't connect to database." . $e->getMessage());
}