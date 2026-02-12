CREATE DATABASE exercise_zsk6;

CREATE USER 'ex_user'@'localhost' IDENTIFIED BY 
'IT202Exercises';
GRANT SELECT, UPDATE, INSERT, DELETE ON exercise_zsk6.* TO 
'ex_user'@'localhost';

USE exercise_zsk6;
CREATE TABLE bowlers_zsk6
(bowlerid int primary key,
name varchar(100),
address varchar(200),
phone varchar(20));


INSERT IGNORE INTO bowlers_zsk6 VALUES
(100, 'Rich', '123 Main St.', '555-1234'),
(101, 'Barbara', '123 Main St.', '555-5678'),
(102, 'Ronaldo', '456 Elm St.', '555-8765'),
(103, 'Messi', '789 Oak St.', '555-4321');

SELECT * FROM bowlers_zsk6;

CREATE TABLE games_zsk6
(gameid int auto_increment primary key,
bowlerid int,
score int);

INSERT INTO games_zsk6 (bowlerid, score) VALUES
(100, 110),
(100, 115),
(100, 105),
(101, 110),
(101, 112),
(101, 130),
(102, 120),
(102, 125),
(102, 130),
(103, 140),
(103, 135),
(103, 145);


SELECT * FROM games_zsk6;

SELECT bowlerid, name FROM bowlers_zsk6 ORDER BY name;

SELECT COUNT(score) AS games, AVG(score) AS average FROM games_zsk6 WHERE bowlerid = 102;

SELECT COUNT(score) AS games, AVG(score) AS average FROM games_zsk6 WHERE bowlerid = 103;
