-- Create user
CREATE USER 'codeigniter-forum-user'@'localhost' IDENTIFIED VIA mysql_native_password USING '***';
GRANT ALL PRIVILEGES ON *.* TO 'codeigniter-forum-user'@'localhost' REQUIRE NONE WITH GRANT OPTION 
MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;
GRANT ALL PRIVILEGES ON `codeigniter-forum`.* TO 'codeigniter-forum-user'@'localhost';



CREATE TABLE `codeigniter-forum`.`posts` (
     `id` INT NOT NULL AUTO_INCREMENT , 
     `user_id` INT NOT NULL , 
     `category_id` INT NOT NULL , 
     `title` VARCHAR(250) NOT NULL , 
     `slug` VARCHAR(250) NOT NULL , 
     `body` TEXT NOT NULL , 
     `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
     PRIMARY KEY (`id`)) ENGINE = InnoDB;