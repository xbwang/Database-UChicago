/*achievement trigger test*/
SELECT '*************************************';
DELETE FROM Achievement WHERE achi_name = 'achievement test1';
DELETE FROM Achievement WHERE achi_name = 'achievement test2';
DROP FUNCTION IF EXISTS FindMax;
DELIMITER |
CREATE FUNCTION FindMax()
RETURNS INT DETERMINISTIC
BEGIN
	DECLARE max INT;
	SET max = (SELECT MAX(achi_id) FROM Achievement);
	RETURN max;
END |
DELIMITER ;
/*1st insert statement will active the trigger*/
INSERT INTO Achievement VALUES(1000, 'achievement test1');
/*show the trigger works*/
SELECT * FROM Achievement WHERE achi_name = 'achievement test1';
/*2st insert statement will not active the trigger*/
SELECT FindMax(); /*show the max value*/
INSERT INTO Achievement VALUES(FindMax()+1, 'achievement test2');
/*show the trigger not work*/
SELECT * FROM Achievement WHERE achi_name = 'achievement test2';

/*user trigger test*/
SELECT '*************************************';
DELETE FROM User WHERE user_name = 'user test1';
DELETE FROM User WHERE user_name = 'user test2';
DROP FUNCTION IF EXISTS FindMax;
DELIMITER |
CREATE FUNCTION FindMax()
RETURNS INT DETERMINISTIC
BEGIN
	DECLARE max INT;
	SET max = (SELECT MAX(user_id) FROM User);
	RETURN max;
END |
DELIMITER ;
/*1st insert statement will active the trigger*/
INSERT INTO User VALUES(1, 'user test1', 'test', 'test', 70, 'test', 'test');
/*show the trigger works*/
SELECT user_id, user_name, location_id FROM User WHERE user_name = 'user test1';
/*2st insert statement will not active the trigger*/
SELECT FindMax(); /*show the max value*/
INSERT INTO User VALUES(FindMax()+1, 'user test2', 'test', 'test', 11, 'test', 'test');
/*show the trigger not work*/
SELECT user_id, user_name, location_id FROM User WHERE user_name = 'user test2';

/*tweet trigger test*/
SELECT '*************************************';
DELETE FROM Tweet WHERE content = 'user test2';
DELETE FROM Tweet WHERE poster_id = 14431558 AND time = 20201119010101;
DROP FUNCTION IF EXISTS FindMax;
DELIMITER |
CREATE FUNCTION FindMax()
RETURNS INT DETERMINISTIC
BEGIN
	DECLARE max INT;
	SET max = (SELECT MAX(tweet_id) FROM Tweet);
	RETURN max;
END |
DELIMITER ;
/*1st insert statement will active the trigger*/
INSERT INTO Tweet VALUES(1, 14431558, 20201119010101, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 70);
/*show the trigger works*/
SELECT tweet_id, poster_id, content, location_id FROM Tweet WHERE time = 20201119010101;
/*2nd insert statement will not active the trigger*/
SELECT FindMax();
INSERT INTO Tweet VALUES(FindMax()+1, 14431558, 20201119010102, 'user test2', 11);
/*show the trigger not work*/
SELECT tweet_id, poster_id, content, location_id FROM Tweet WHERE time = 20201119010102;