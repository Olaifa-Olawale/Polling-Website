DROP TABLE IF EXISTS pollresultspage;

CREATE TABLE pollresultspage (
	
	pollId int(11) NOT NULL,
	FOREIGN KEY (pollId) REFERENCES pollcreation (pollId)
);
