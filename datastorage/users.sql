DROP TABLE IF EXISTS users;

CREATE TABLE users (
	userId int(11) NOT NULL AUTO_INCREMENT,
	email varchar (50) NOT NULL,
	screen_name varchar (50) NOT NULL, -- SCREEN NAME
	pswd varchar (50)NOT NULL,
	
	avater_img  varchar(10000) NOT NULL,
	
	PRIMARY KEY (userId)
);

