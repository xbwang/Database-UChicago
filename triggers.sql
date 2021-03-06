/*automatically update Achievement's id*/
DELIMITER |
DROP TRIGGER IF EXISTS AchievementTrigger;
CREATE TRIGGER AchievementTrigger
BEFORE INSERT ON Achievement
FOR EACH ROW
BEGIN
	IF NEW.achi_id != (SELECT MAX(achi_id) FROM Achievement)+1 THEN
		SET NEW.achi_id = (SELECT MAX(achi_id) FROM Achievement)+1;
	END IF;
END; |
DELIMITER ;
/*location number trigger, cannot excceed the max location number and autoupdate its id*/
DELIMITER |
DROP TRIGGER IF EXISTS UserTrigger;
CREATE TRIGGER UserTrigger
BEFORE INSERT ON User
FOR EACH ROW
BEGIN
	IF NEW.user_id != (SELECT MAX(user_id) FROM User)+1 THEN
		SET NEW.user_id = (SELECT MAX(user_id) FROM User)+1;
	END IF;
	IF NEW.location_id >= (SELECT MAX(location_id) FROM Location) THEN
		SET NEW.location_id = 0;
	END IF;
END; |
DELIMITER ;
/*limit the tweet's length to less than 200 and autoupdate its id*/
DELIMITER |
DROP TRIGGER IF EXISTS TweetTrigger;
CREATE TRIGGER TweetTrigger
BEFORE INSERT ON Tweet
FOR EACH ROW
BEGIN
	IF NEW.tweet_id != (SELECT MAX(tweet_id) FROM Tweet)+1 THEN
		SET NEW.tweet_id = (SELECT MAX(tweet_id) FROM Tweet)+1;
	END IF;
	IF length(NEW.content) >= 200 THEN
		SET NEW.content = NULL;
	END IF;
	IF NEW.location_id >= (SELECT MAX(location_id) FROM Location) THEN
		SET NEW.location_id = 0;
	END IF;
END; |
DELIMITER |