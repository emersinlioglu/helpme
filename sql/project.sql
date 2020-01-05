CREATE TABLE `project_image` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255) NULL DEFAULT NULL,
	`text` TEXT NULL,
	`image` VARCHAR(255) NOT NULL,
	`text_position` VARCHAR(255) NULL DEFAULT NULL,
	`status` INT(11) NOT NULL DEFAULT '1',
	`project_id` INT(11) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FK_project_image_project` (`project_id`),
	CONSTRAINT `FK_project_image_project` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;

CREATE TABLE `project_image` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(255) NULL DEFAULT NULL,
	`text` TEXT NULL,
	`image` VARCHAR(255) NOT NULL,
	`text_position` VARCHAR(255) NULL DEFAULT NULL,
	`status` INT(11) NOT NULL DEFAULT '1',
	`project_id` INT(11) NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `FK_project_image_project` (`project_id`),
	CONSTRAINT `FK_project_image_project` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON UPDATE CASCADE ON DELETE CASCADE
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
