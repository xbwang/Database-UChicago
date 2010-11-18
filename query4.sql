/*1.show the tweet_id of the tweets whose number of comments >2*/
SELECT Tweet.tweet_id AS ID, Tweet.content AS Content, COUNT(*) AS Count
FROM Comment JOIN Tweet
ON Tweet.tweet_id = Comment.tweet_id
GROUP BY Comment.tweet_id
HAVING COUNT(*) > 2;
/*2.show the users who obtain the achievement > 3*/
SELECT User.user_name AS UserName, COUNT(*) AS NumOfAchievement
FROM User NATURAL JOIN ObtainAch
GROUP BY User.user_id
HAVING COUNT(*) > 3;
/*3.show the users who have the same Tag "Music"*/
SELECT User.user_name AS UserName, Tag.tag_name AS Tag
FROM User NATURAL JOIN Tag
WHERE tag_name = "Music";
/*4.show the user how obtain the most achievement*/
SELECT User.user_name AS UserName, COUNT(*) AS NumOfAchievement
FROM User NATURAL JOIN ObtainAch
GROUP BY User.user_id
HAVING COUNT(*) >= 
  ALL (SELECT COUNT(*)
  FROM User NATURAL JOIN ObtainAch
  GROUP BY User.user_id);
/*5.show the tweets which don't have any comment*/
SELECT Tweet.tweet_id AS TweetID, Tweet.content AS Content, Comment.content AS Comment
FROM Tweet LEFT OUTER JOIN Comment
ON Tweet.tweet_id = Comment.tweet_id
WHERE Tweet.tweet_id NOT IN(
	SELECT Tweet.tweet_id
	FROM Tweet,Comment
	WHERE Tweet.tweet_id = Comment.tweet_id);
/*6.show the one whose number of followers is above average*/
DROP VIEW IF EXISTS TOTAL;
CREATE VIEW TOTAL AS 
SELECT COUNT(*) AS count
FROM FollowerList
GROUP BY following_id;

SELECT User.user_name AS UserName, COUNT(*) AS Count
FROM FollowerList JOIN User
ON User.user_id = FollowerList.following_id
GROUP BY following_id
HAVING COUNT(*) >= 
(SELECT AVG(count)
FROM TOTAL
);