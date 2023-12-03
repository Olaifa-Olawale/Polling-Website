DROP TABLE IF EXISTS indexpage;

CREATE TABLE indexpage(
	
	pollId int(11) NOT NULL,
	FOREIGN KEY (pollId) REFERENCES pollcreation (pollId)
);



insert into indexpage(pollId) values (1);
insert into indexpage(pollId) values (2);
insert into indexpage(pollId) values (3);
insert into indexpage(pollId) values (4);
insert into indexpage(pollId) values (5);
insert into indexpage(pollId) values (6);
insert into indexpage(pollId) values (7);
insert into indexpage(pollId) values (8);
insert into indexpage(pollId) values (9);
insert into indexpage(pollId) values (10);



SELECT pollcreation.pollquestion,
	   pollcreation.pollanswer1,
	   pollcreation.pollanswer2,
	   pollcreation.pollanswer3,
	   pollcreation.pollanswer4,
	   pollcreation.pollanswer5
FROM indexpage  LEFT JOIN pollcreation
ON indexpage.pollId = pollcreation.pollId 
ORDER BY pollcreation.created_dt;



--WHERE loginform.pswd = 'mnbvcxz12';
