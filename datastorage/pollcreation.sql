DROP TABLE IF EXISTS pollcreation;

CREATE TABLE pollcreation (

	pollId int(11) NOT NULL AUTO_INCREMENT,
	pollquestion  varchar (100) NOT NULL ,
	pollanswer1 varchar (50),
	pollanswer2 varchar (50),
	pollanswer3 varchar (50),
	pollanswer4 varchar (50),
	pollanswer5 varchar (50),
	pollopenDT DATETIME NOT NULL,
	pollcloseDT DATETIME NOT NULL,
	created_dt DATETIME NOT NULL,
	
	userId int(11),
	screen_name varchar (50) NOT NULL, -- SCREEN NAME
	avater_img  varchar(10000) NOT NULL,
	PRIMARY KEY (pollId),
	FOREIGN KEY (userId) REFERENCES users (userId)
);
