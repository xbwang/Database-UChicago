/*ShowUser test*/
SELECT '************************';
CALL ShowUser();
/*LocationChange test*/
/*before the procedure called*/
SELECT '************************';
SELECT location_id, COUNT(*)
FROM User
WHERE location_id = 1;
SELECT location_id, COUNT(*)
FROM User
WHERE location_id = 0;
/*after the procedure called, change the user whose location_id =1 to 2*/
CALL LocationChange(1, 0);
SELECT location_id, COUNT(*)
FROM User
WHERE location_id = 1;
SELECT location_id, COUNT(*)
FROM User
WHERE location_id = 0;

/*AchievementAdd test*/
/*before the procedure called*/
SELECT '************************';
DELETE FROM Achievement WHERE achi_id = 201;
DELETE FROM ObtainAch WHERE achi_id = 201;
INSERT INTO Achievement VALUES(201, 'Obtain 5 achievements!');
SELECT user_id, COUNT(*)
FROM ObtainAch
GROUP BY user_id
HAVING COUNT(*) = 6;
SELECT user_id, COUNT(*)
FROM ObtainAch
GROUP BY user_id
HAVING COUNT(*) = 7;
/*after the procedure called*/
CALL AchievementAdd(201, 6);
SELECT user_id, COUNT(*)
FROM ObtainAch
GROUP BY user_id
HAVING COUNT(*) = 7;
