-- Create user
CREATE USER 'codeigniter-forum-user'@'localhost' IDENTIFIED VIA mysql_native_password USING '***';
GRANT ALL PRIVILEGES ON *.* TO 'codeigniter-forum-user'@'localhost' REQUIRE NONE WITH GRANT OPTION 
MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `codeigniter-forum`.* TO 'codeigniter-forum-user'@'localhost';

-- Create users table
CREATE TABLE `codeigniter-forum`.`users` (
      `id` INT NOT NULL AUTO_INCREMENT , 
      `username` VARCHAR(255) NOT NULL , 
      `first_name` VARCHAR(255) NOT NULL , 
      `last_name` VARCHAR(255) NOT NULL , 
      `email` VARCHAR(255) NOT NULL , 
      `password` VARCHAR(255) NOT NULL , 
      `register_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
      PRIMARY KEY (`id`)) 
ENGINE = InnoDB;

-- Create posts table
CREATE TABLE `codeigniter-forum`.`posts` (
     `id` INT NOT NULL AUTO_INCREMENT , 
     `user_id` INT NOT NULL , 
     `subcategory_id` INT NOT NULL , 
     `parent_post_id` INT NOT NULL DEFAULT '0' ,
     `body` TEXT NOT NULL , 
     `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
     PRIMARY KEY (`id`)) 
ENGINE = InnoDB;

-- Create categories table
CREATE TABLE `codeigniter-forum`.`categories` ( 
     `id` INT NOT NULL AUTO_INCREMENT ,
     `user_id` INT NOT NULL, 
     `name` VARCHAR(100) NOT NULL , 
     `description` TEXT NOT NULL,
     `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
     `post_image` VARCHAR 250 NOT NULL,
     PRIMARY KEY (`id`)) 
ENGINE = InnoDB;

-- Create sub_categories table
CREATE TABLE `codeigniter-forum`.`subcategories` 
( 
     `id` INT NOT NULL AUTO_INCREMENT ,
     `user_id` INT NOT NULL, 
     `maincategory_id` INT NOT NULL , 
     `name` VARCHAR(250) NOT NULL , 
     `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
     PRIMARY KEY (`id`)) 
ENGINE = InnoDB;

-- Create likes table
CREATE TABLE `codeigniter-forum`.`likes` ( 
     `id` INT NOT NULL AUTO_INCREMENT , 
     `user_id` INT NOT NULL , 
     `post_id` INT NOT NULL , 
     `like_type_id` INT NOT NULL , PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- Create like types
CREATE TABLE `codeigniter-forum`.`like_type` 
( 
     `id` INT NOT NULL AUTO_INCREMENT , 
     `type` VARCHAR(7) NOT NULL , PRIMARY KEY (`id`)) 
ENGINE = InnoDB;

-- Insert categories
INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES (NULL, 'Business', current_timestamp()), (NULL, 'Technology', current_timestamp())

-- INSERT USERS
INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `register_date`) 
VALUES ('1', 'admin', '', '', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', current_timestamp()), 
(NULL, 'jondoe', 'jon', 'doe', 'jon@doe.com', '6934c4368e77e0a4e6008ae5c16fcd5d', current_timestamp())
-- #1 username: admin | password: admin
-- #2 username: jondoe | password: jondoe

