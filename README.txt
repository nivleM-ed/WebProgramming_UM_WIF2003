updated db

CREATE TABLE `loginsystem`.`user_checklist` ( 
	`item_id` AUTO_INCREMENT INT NOT NULL , 
	`item_name` TEXT NOT NULL , 
	`item_status` INT NOT NULL , 
    `checklist_id` INT NOT NULL ,
	PRIMARY KEY (`item_id`)
) ENGINE = InnoDB;

CREATE TABLE `loginsystem`.`checklist` ( 
	`item_id` AUTO_INCREMENT INT NOT NULL , 
	`item_name` TEXT NOT NULL , 
	`weather` TEXT NOT NULL 
	`item_hide` INT NOT NULL ,
	PRIMARY KEY (`item_hide`)
) ENGINE = InnoDB;

for testing purpose

weather=normal literally means that item can be use at any type of weather
item_hide is for UI purpose 

INSERT INTO checklist(item_name,weather) VALUES ("Sunscreen", "sunny")
INSERT INTO checklist(item_name,weather) VALUES ("Compact umbrella", "normal")
INSERT INTO checklist(item_name,weather) VALUES ("Hat", "sunny")
INSERT INTO checklist(item_name,weather) VALUES ("Sunglasses", "sunny")
INSERT INTO checklist(item_name,weather) VALUES ("Dry clothes", "rainy")
INSERT INTO checklist(item_name,weather) VALUES ("Raincoat", "rainy")
INSERT INTO checklist(item_name,weather) VALUES ("Rain boots", "rainy")




