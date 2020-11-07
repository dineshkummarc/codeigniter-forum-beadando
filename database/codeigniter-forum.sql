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
     `photo` VARCHAR(250) NOT NULL,
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

--
-- Dumping data for table `users`
--
INSERT INTO `codeigniter-forum`.`users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `register_date`) VALUES 
('1', 'admin', '', '', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', current_timestamp()), 
('2', 'jondoe', 'jon', 'doe', 'jon@doe.com', '6934c4368e77e0a4e6008ae5c16fcd5d', TIMESTAMPADD(DAY, 1, current_timestamp())),
('3', 'johnsmith', 'john', 'smmith', 'john@smith.com', 'cd4388c0c62e65ac8b99e3ec49fd9409', TIMESTAMPADD(DAY, 2, current_timestamp()));
-- #1 username: admin | password: admin
-- #2 username: jondoe | password: jondoe
-- #3 username: johnsmith | password: johnsmith

--
-- Dumping data for table `categories`
--
INSERT INTO `codeigniter-forum`.`categories` (`id`, `user_id`, `name`, `description`, `photo`, `created_at`) VALUES 
('1', '1', 'Business', 'This is a category about business, Lorem ipsum dolor sit amet, 
consectetur adipiscing elit. Aliquam eget sem et sem pharetra vulputate. Donec ex ipsum, 
venenatis ut nisl non, aliquet convallis justo. Praesent ac eros vitae nunc scelerisque egestas.
Nunc vitae condimentum eros. Vivamus varius sem eu scelerisque lobortis. Donec at ipsum mattis, lobortis
 quam nec, egestas augue. Donec ut consequat turpis, nec cursus neque. Vestibulum rhoncus tortor nunc,
  non feugiat arcu sagittis in. Nam at quam vel urna posuere scelerisque. Aenean vitae ultrices dolor. 
  Fusce bibendum molestie lacinia.

Praesent ultricies cursus magna. Nullam aliquet ipsum vel tellus molestie congue. 
Morbi lacinia pellentesque massa, finibus tincidunt nulla gravida vitae. Suspendisse 
quis sagittis augue, et molestie elit. Vivamus pellentesque cursus magna eu suscipit. 
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquam, est ut dictum tempor,
 leo urna varius lorem, eget porta eros magna non purus. Curabitur eu diam eget metus vulputate commodo
  vel eget augue. Nunc augue leo, convallis id fringilla nec, malesuada et nunc. Aenean fringilla erat nunc,
   sed pretium leo pretium quis.

Cras varius elit eget ullamcorper luctus. Pellentesque habitant morbi tristique senectus 
et netus et malesuada fames ac turpis egestas. Morbi porta, tortor et aliquam pretium, 
risus metus maximus orci, ut porttitor ex nibh at urna. Integer mollis, turpis a vehicula hendrerit, 
purus velit dignissim urna, quis ultrices urna leo vel velit. Aliquam placerat lectus a cursus sollicitudin. 
Proin fermentum odio eu placerat pretium. Suspendisse potenti. Duis fringilla posuere congue. Fusce quis nisi 
non erat vestibulum imperdiet sed id augue. Suspendisse potenti. Ut semper nisi urna, vitae pulvinar arcu laoreet id. 
Suspendisse massa massa, hendrerit in placerat a, volutpat non velit. Maecenas placerat diam eros, 
sit amet aliquam mauris interdum id. Morbi et viverra sem, eget elementum sem.', 'noimage.jpg', current_timestamp()),

('2', '2', 'Games', 'This is a category about games Lorem ipsum dolor sit amet, 
consectetur adipiscing elit. Aliquam eget sem et sem pharetra vulputate. 
Donec ex ipsum, venenatis ut nisl non, aliquet convallis justo. Praesent ac eros 
vitae nunc scelerisque egestas. Nunc vitae condimentum eros. Vivamus varius sem eu 
scelerisque lobortis. Donec at ipsum mattis, lobortis quam nec, egestas augue. 
Donec ut consequat turpis, nec cursus neque. Vestibulum rhoncus tortor nunc, non feugiat 
arcu sagittis in. Nam at quam vel urna posuere scelerisque. Aenean vitae ultrices dolor. 
Fusce bibendum molestie lacinia.

Praesent ultricies cursus magna. Nullam aliquet ipsum vel tellus molestie congue. Morbi lacinia pellentesque massa, finibus tincidunt nulla gravida vitae. Suspendisse quis sagittis augue, et molestie elit. Vivamus pellentesque cursus magna eu suscipit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur aliquam, est ut dictum tempor, leo urna varius lorem, eget porta eros magna non purus. Curabitur eu diam eget metus vulputate commodo vel eget augue. Nunc augue leo, convallis id fringilla nec, malesuada et nunc. Aenean fringilla erat nunc, sed pretium leo pretium quis.

Cras varius elit eget ullamcorper luctus. Pellentesque habitant morbi tristique senectus et netus et 
malesuada fames ac turpis egestas. Morbi porta, tortor et aliquam pretium, risus metus maximus orci, 
ut porttitor ex nibh at urna. Integer mollis, turpis a vehicula hendrerit, purus velit dignissim urna, 
quis ultrices urna leo vel velit. Aliquam placerat lectus a cursus sollicitudin. Proin fermentum odio
 eu placerat pretium. Suspendisse potenti. Duis fringilla posuere congue. Fusce quis nisi non erat 
 vestibulum imperdiet sed id augue. Suspendisse potenti. Ut semper nisi urna, vitae pulvinar arcu laoreet id. 
 Suspendisse massa massa, hendrerit in placerat a, volutpat non velit. Maecenas placerat diam eros, 
 sit amet aliquam mauris interdum id. Morbi et viverra sem, eget elementum sem.', 'images.jpg', TIMESTAMPADD(DAY, 1, current_timestamp()));


--
-- Dumping data for table `subcategories`
--
INSERT INTO `codeigniter-forum`.`subcategories` (`id`, `user_id`, `maincategory_id`, `name`, `created_at`) VALUES 
('1', '2', '1', 'bisiness subcategory 1', current_timestamp()),
('2', '3', '1', 'bisiness subcategory 2', TIMESTAMPADD(DAY, 1, current_timestamp())),

('3', '1', '2', 'games subcategory 1', TIMESTAMPADD(DAY, 3, current_timestamp())),
('4', '3', '2', 'games subcategory 2', TIMESTAMPADD(DAY, 4, current_timestamp()));

--
-- Dumping data for table `posts`
--
INSERT INTO `codeigniter-forum`.`posts` (`id`, `user_id`, `subcategory_id`, `parent_post_id`, `body`, `created_at`) VALUES 
(NULL, '2', '1', '0', 'business subcategory 1, post body 1', current_timestamp()), 
(NULL, '3', '1', '0', 'business subcategory 1, post body 2', TIMESTAMPADD(DAY, 2, current_timestamp())),
(NULL, '1', '1', '0', 'business subcategory 1, post body 3', TIMESTAMPADD(DAY, 2, current_timestamp())),
(NULL, '2', '1', '0', 'business subcategory 1, post body 4', TIMESTAMPADD(DAY, 4, current_timestamp())),
(NULL, '3', '1', '0', 'business subcategory 1, post body 5', TIMESTAMPADD(DAY, 5, current_timestamp())),
(NULL, '2', '1', '0', 'business subcategory 1, post body 6', TIMESTAMPADD(DAY, 5, current_timestamp())),
(NULL, '3', '1', '0', 'business subcategory 1, post body 7', TIMESTAMPADD(DAY, 6, current_timestamp())),
(NULL, '2', '1', '0', 'business subcategory 1, post body 8', TIMESTAMPADD(DAY, 7, current_timestamp())),

(NULL, '2', '2', '0', 'business subcategory 2, post body 1', TIMESTAMPADD(DAY, 1, current_timestamp())), 
(NULL, '3', '2', '0', 'business subcategory 2, post body 2', TIMESTAMPADD(DAY, 1, current_timestamp())),
(NULL, '1', '2', '0', 'business subcategory 2, post body 3', TIMESTAMPADD(DAY, 1, current_timestamp())),
(NULL, '2', '2', '0', 'business subcategory 2, post body 4', TIMESTAMPADD(DAY, 2, current_timestamp())),
(NULL, '3', '2', '0', 'business subcategory 2, post body 5', TIMESTAMPADD(DAY, 2, current_timestamp())),
(NULL, '2', '2', '0', 'business subcategory 2, post body 6', TIMESTAMPADD(DAY, 2, current_timestamp())),
(NULL, '3', '2', '0', 'business subcategory 2, post body 7', TIMESTAMPADD(DAY, 2, current_timestamp())),
(NULL, '2', '2', '0', 'business subcategory 2, post body 8', TIMESTAMPADD(DAY, 2, current_timestamp())),

(NULL, '2', '3', '0', 'games subcategory 1, post body 1', TIMESTAMPADD(DAY, 5, current_timestamp())), 
(NULL, '3', '3', '0', 'games subcategory 1, post body 2', TIMESTAMPADD(DAY, 6, current_timestamp())),
(NULL, '1', '3', '0', 'games subcategory 1, post body 3', TIMESTAMPADD(DAY, 6, current_timestamp())),
(NULL, '2', '3', '0', 'games subcategory 1, post body 4', TIMESTAMPADD(DAY, 7, current_timestamp())),
(NULL, '3', '3', '0', 'games subcategory 1, post body 5', TIMESTAMPADD(DAY, 7, current_timestamp())),
(NULL, '2', '3', '0', 'games subcategory 1, post body 6', TIMESTAMPADD(DAY, 8, current_timestamp())),
(NULL, '3', '3', '0', 'games subcategory 1, post body 7', TIMESTAMPADD(DAY, 8, current_timestamp())),
(NULL, '2', '3', '0', 'games subcategory 1, post body 8', TIMESTAMPADD(DAY, 8, current_timestamp())),

(NULL, '2', '4', '0', 'games subcategory 2, post body 1', TIMESTAMPADD(DAY, 1, current_timestamp())), 
(NULL, '3', '4', '0', 'games subcategory 2, post body 2', TIMESTAMPADD(DAY, 1, current_timestamp())),
(NULL, '1', '4', '0', 'games subcategory 2, post body 3', TIMESTAMPADD(DAY, 1, current_timestamp())),
(NULL, '2', '4', '0', 'games subcategory 2, post body 4', TIMESTAMPADD(DAY, 1, current_timestamp())),
(NULL, '3', '4', '0', 'games subcategory 2, post body 5', TIMESTAMPADD(DAY, 1, current_timestamp())),
(NULL, '2', '4', '0', 'games subcategory 2, post body 6', TIMESTAMPADD(DAY, 1, current_timestamp())),
(NULL, '3', '4', '0', 'games subcategory 2, post body 7', TIMESTAMPADD(DAY, 2, current_timestamp())),
(NULL, '2', '4', '0', 'games subcategory 2, post body 8', TIMESTAMPADD(DAY, 2, current_timestamp()));

--
-- Dumping data for table `like_type`
--
INSERT INTO `codeigniter-forum`.`like_type` (`id`, `type`) VALUES (NULL, 'like'), (NULL, 'dislike');


--
-- Dumping data for table `like`
--
INSERT INTO `codeigniter-forum`.`likes` (`id`, `user_id`, `post_id`, `like_type_id`) VALUES 
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1)),
(NULL, FLOOR(RAND()*(3-1+1)+1), FLOOR(RAND()*(32-1+1)+1), FLOOR(RAND()*(2)+1));