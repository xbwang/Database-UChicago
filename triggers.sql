/*location number trigger, cannot excceed the max location number*/
DELIMITER |
DROP TRIGGER IF EXISTS UserLocationTrigger;
CREATE TRIGGER UserLocationTrigger
BEFORE INSERT ON User
FOR EACH ROW
BEGIN
	IF NEW.user_id >= (SELECT COUNT(*) FROM Location) THEN
		SET NEW.location_id = 0;
	END IF;
END; |
DELIMITER ;
/**/
DELIMITER |
DROP TRIGGER IF EXISTS
END; |
DELIMITER ;
/**/
DELIMITER |
END; |
DELIMITER ;