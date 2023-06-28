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
