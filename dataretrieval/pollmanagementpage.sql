DROP TABLE IF EXISTS pollmanagementpage;

CREATE TABLE pollmanagementpage (
	

	userId int(11),
	FOREIGN KEY (userId) REFERENCES users (userId)
);

insert into pollmanagementpage(userId) values (1);
insert into pollmanagementpage(userId) values (2);
insert into pollmanagementpage(userId) values (3);
insert into pollmanagementpage(userId) values (4);
insert into pollmanagementpage(userId) values (5);



SELECT pollcreation.pollquestion,
	   pollcreation.pollanswer1,
	   pollcreation.pollanswer2,
	   pollcreation.pollanswer3,
	   pollcreation.pollanswer4,
	   pollcreation.pollanswer5,
	   pollcreation.pollopen_dt,
	   pollcreation.pollclose_dt
FROM pollmanagementpage  LEFT JOIN pollcreation
ON pollmanagementpage.userId = pollcreation.userId 
WHERE pollmanagementpage.userId = '5';