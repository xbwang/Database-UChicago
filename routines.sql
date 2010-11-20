/*show user_id, nick_name and location*/
DELIMITER |
DROP PROCEDURE IF EXISTS ShowUser;
CREATE PROCEDURE ShowUser()
BEGIN
	SELECT user_id AS ID, nick_name AS NICK, country AS LOCATION
	FROM User NATURAL JOIN Location;
END |
DELIMITER ;
/*update the location of the users*/
DELIMITER |
DROP PROCEDURE IF EXISTS LocationChange;
CREATE PROCEDURE LocationChange(IN ida INT, IN idb INT)
BEGIN
	DECLARE aLocation INT;
	DECLARE aUser INT;
	DECLARE flag INT DEFAULT 0;
	DECLARE userLocation CURSOR FOR
		SELECT user_id, location_id
		FROM User;
	DECLARE CONTINUE HANDLER
		FOR NOT FOUND
		SET flag = 1;
	OPEN userLocation;
	REPEAT
		FETCH userLocation INTO aUser, aLocation;
		IF aLocation = ida THEN
			UPDATE User SET location_id = idb
			WHERE user_id = aUser;
		END IF;
	UNTIL flag = 1
	END REPEAT;
	CLOSE userLocation;
END |
DELIMITER ;
/*give the users who obtain 'num' achievements a new achievement 'id'*/
DELIMITER |
DROP PROCEDURE IF EXISTS AchievementAdd;
CREATE PROCEDURE AchievementAdd(IN id INT, IN num INT)
BEGIN
	DECLARE aUser INT;
	DECLARE aCount INT;
	DECLARE flag INT DEFAULT 0;
	DECLARE obtainCount CURSOR FOR
		SELECT user_id, COUNT(*)
		FROM ObtainAch
		GROUP BY user_id;
	DECLARE CONTINUE HANDLER
		FOR NOT FOUND
		SET flag = 1;
	OPEN obtainCount;
	REPEAT
		FETCH obtainCount INTO aUser, aCount;
		IF aCount = num THEN
			INSERT INTO ObtainAch VALUES(aUser, id);
		END IF;
	UNTIL flag = 1
	END REPEAT;
	CLOSE obtainCount;
END |
DELIMITER ;