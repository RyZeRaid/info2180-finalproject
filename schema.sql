DROP DATABASE IF EXISTS bugme_demo;
CREATE DATABASE bugme_demo;
USE bugme_demo;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
    `id` INT unsigned AUTO_INCREMENT,
    `firstname` VARCHAR(255) NOT NULL ,
    `lastname` VARCHAR(255) NOT NULL ,
    `password` VARCHAR(255) NOT NULL ,
    `email` VARCHAR(50) NOT NULL ,
    `date_joined` DATETIME NOT NULL ,
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `issues`;
CREATE TABLE `issues` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `title` VARCHAR(25) NOT NULL,
    `description` TEXT(555) NOT NULL,
    `type` VARCHAR(25) NOT NULL,
    `priority` VARCHAR(12) NOT NULL,
    `status` VARCHAR(6) NOT NULL,
    `assigned_to` INT(25) NOT NULL,
    `created_by` INT(25) NOT NULL,
    `created` DATETIME NOT NULL,
    `updated` DATETIME NOT NULL,
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8;

INSERT INTO `user` VALUES('id','testuserfname', 'testuserlname', 'password123', 'admin@project2.com', SYSDATE()),
('1','Onandi', 'Skeen', 'password123', 'onandiskeen@project2.com', SYSDATE());



/* GRANT ALL PRIVILEGES ON bugme_demo.* TO 'new_user'@'localhost'IDENTIFIED BY 'password123';*/