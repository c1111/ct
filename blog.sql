SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS`article`;
CREATE TABLE`article`(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`title` varchar(100)  NOT NULL,
	`tags` varchar(50) NOT NULL,
	`content` text NOT NULL,
	`time` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
	`authorId` int(10) unsigned NOT NULL,
	PRIMARY KEY(`id`),
	KEY `authorId` (`authorId`),
	CONSTRAINT `article_ibfk_1` FOREIGN KEY (`authorId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE)ENGINE=InnoDB DEFAULT CHARSET=utf8;
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`(
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`username` varchar(50) NOT NULL,
	`password` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;