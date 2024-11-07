-- Active: 1697511355666@@feenix-mariadb.swin.edu.au@3306@s104868752_db

CREATE TABLE EOI (
        `EOInumber` INT AUTO_INCREMENT PRIMARY KEY,
        `JobReferenceNumber` INT(5) NOT NULL,
        `FirstName` VARCHAR(20) NOT NULL,
        `LastName` VARCHAR(20) NOT NULL,
        `DOB` DATE NOT NULL,
        `GENDER` VARCHAR(6) NOT NULL,
        `StreetAddress` VARCHAR(40) NOT NULL,
        `SuburbTown` VARCHAR(40) NOT NULL,
        `STATE` VARCHAR(255) NOT NULL,
        `Postcode` VARCHAR(4) NOT NULL,
        `EmailAddress` VARCHAR(255) NOT NULL,
        `PhoneNumber` VARCHAR(12) NOT NULL,
        `SkillsCheck` VARCHAR(255) NOT NULL,
        `OtherSkills` VARCHAR(255),
        `ApplicationDate` DATE NOT NULL,
        `Status` ENUM('Pending', 'Approved', 'Rejected') DEFAULT 'Pending'
    );

INSERT INTO EOI (`JobReferenceNumber`,`FirstName`,`LastName`,`DOB`,`GENDER`,`StreetAddress`, `SuburbTown`,`STATE`,`Postcode`,`EmailAddress`, `PhoneNumber`,`SkillsCheck`, `OtherSkills`,`ApplicationDate`)
VALUES ("10434", "Melvin", "Nguyen","2001-08-01", "Female", "31 Pritchard Avenue","Footscray","VIC","3001","npbaominh182001@gmail.com","0466859319","Teamwork-Management","Meowww","2023-10-17");

SELECT * FROM EOI;

DROP TABLE EOI;

Sample Entry 