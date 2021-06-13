CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
);

CREATE TABLE `playlist` (
  `pl_id` int(11) NOT NULL AUTO_INCREMENT,
  `pl_name` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img_name` varchar(255) DEFAULT 'default_ss.svg',
  `access_type` boolean NOT NULL,
  PRIMARY KEY (`pl_id`),
  FOREIGN KEY (`user_id`) REFERENCES user(`user_id`) ON DELETE CASCADE
);

CREATE TABLE `song` (
  `song_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `type` varchar(40) NOT NULL,
  `pl_id` int(11) NOT NULL,
  `data_frame` varchar(255),
  PRIMARY KEY (`song_id`),
  FOREIGN KEY (`pl_id`) REFERENCES playlist(`pl_id`) ON DELETE CASCADE
);

INSERT INTO `song` (`song_id`, `name`, `link`, `type`, `pl_id`) VALUES (NULL, 'Zapatillas', 'https://www.youtube.com/watch?v=n9jzGmFBzx8', 'youtube', '22');