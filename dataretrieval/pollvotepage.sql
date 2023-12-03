DROP TABLE IF EXISTS pollvotepage;

CREATE TABLE pollvotepage (
	
	
	pollId int(11) NOT NULL ,
	FOREIGN KEY (pollId) REFERENCES pollcreation (pollId)
);


insert into pollvotepage(pollId) values (7);
insert into pollvotepage(pollId) values (5);

SELECT pollvote.answer1votecount,
                pollvote.answer2votecount,
                pollvote.answer3votecount,
                pollvote.answer4votecount,
                pollvote.answer5votecount,
                pollvote.totalvotecount
                FROM pollresultspage  LEFT JOIN pollvote
                ON pollresultspage.pollId = pollvote.pollId
                WHERE pollresultspage.pollId =  5;
