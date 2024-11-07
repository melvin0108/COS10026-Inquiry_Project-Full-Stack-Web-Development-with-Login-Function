-- Active: 1697094060411@@feenix-mariadb.swin.edu.au@3306@s104868752_db
-- ignore this ^^^ it is used for an extention I use, does NOT affect the database at all

CREATE TABLE USERS (
    USERNAME NVARCHAR(30) NOT NULL PRIMARY KEY,
    PASSWORDHASH NVARCHAR(100) NOT NULL,
    LOGINATTEMPTS INT NOT NULL DEFAULT 0
);
-- Login attempts increments on a failed login, on 3 failed logins the account is locked


CREATE TABLE PROSPECT (
    USERNAME NVARCHAR(30) NOT NULL PRIMARY KEY,
    PASSWORDHASH NVARCHAR(100) NOT NULL,
    FIRSTNAME NVARCHAR(30) NOT NULL,
    REASON NVARCHAR(200) NOT NULL
)
-- these only needs to be ran once
-- usernames must be unique

SELECT * FROM `USERS`;
-- view all admins
SELECT * FROM `PROSPECT`;
-- view all prospective admins

DROP TABLE USERS;
-- Delete the table (DESTRUCTIVE)
DROP TABLE PROSPECT;
-- Delete the table (DESTRUCTIVE)

INSERT INTO `PROSPECT` (`USERNAME`, `PASSWORDHASH`, `FIRSTNAME`, `REASON`)
VALUES ("luke2", "5f4dcc3b5aa765d61d8327deb882cf99", "name", "reason");


INSERT INTO USERS (`USERNAME`, `PASSWORDHASH`)
VALUES ("admin", "5f4dcc3b5aa765d61d8327deb882cf99");
-- The user is admin and the passwordhash is the md5 hash of the string 'password'
-- this can be ran with many different values if you want to add another user manually

SELECT `PASSWORDHASH` FROM `USERS`
WHERE `USERNAME` = 'admin';
-- this searches the users table for the passwordhash where the username is 'admin'

DELETE FROM `USERS`
WHERE `USERNAME` = 'admin';
-- this deletes a row from the `USERS` table where the useranem is 'admin'

SELECT `LOGINATTEMPTS` FROM `USERS` WHERE `USERNAME` = 'admin';

UPDATE `USERS` SET `LOGINATTEMPTS`='0' WHERE `USERNAME` = 'admin';