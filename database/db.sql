create table `admin_tb` (
    `id` INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `username` VARCHAR(255),
    `password` VARCHAR(255)
);

create table `user_bio_tb`(
    `id` INT(11) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    `fullname` VARCHAR(255) NOT NULL,
    `matric` VARCHAR(255) NOT NULL,
    `level` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(255) NOT NULL,
    `passport` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `gender` ENUM('male', 'female') NOT NULL,
    `request` tinyint(1) NOT NULL DEFAULT 0,
    `status` ENUM('approved', 'notapproved') NOT NULL DEFAULT 'notapproved',
    UNIQUE KEY(`matric`, `phone`)

);