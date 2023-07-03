CREATE DATABASE forget_me_not;

CREATE TABLE task (
    id_task INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
    date_creation DATETIME NOT NULL,
    status TINYINT,
    description VARCHAR(255) NOT NULL, 

    PRIMARY KEY (id_task)
);

INSERT INTO task    ('description')
VALUES              ('passer l aspirateur'),
                    ('faire la vaisselle'),
                    ('trier le linge sale'),
                    ('organiser le bureau'),
                    ('racheter à manger')

-- UPDATE task SET position = :position WHERE id_task = :id;
-- UPDATE task SET position = :position WHERE position = :positionprev;
-- -- UPDATE task SET position = :position WHERE position = :positionnext ; 

-- execute([
--     'position' => $_GET['position'] +1, 
--     'positionprev' => $_GET['position'] -1 
-- ])