DROP TABLE IF EXISTS pollvote;

CREATE TABLE pollvote (
	answer1votecount int (50),
	answer2votecount int (50),
	answer3votecount int (50),
	answer4votecount int (50),
	answer5votecount int (50),
	totalvotecount int(50),
	pollId int(11)  ,
	
	FOREIGN KEY (pollId) REFERENCES pollcreation (pollId)
);







