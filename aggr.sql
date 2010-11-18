/*1.count the users from United States*/
SELECT L.country AS Location, COUNT(*) AS Num
FROM Profile P, Location L
WHERE P.location_id = L.location_id AND L.country = "United States";
/*2.count the tweet from different location*/
SELECT L.country AS Location, COUNT(*) AS Count
FROM Tweet T, Location L
WHERE T.location_id = L.location_id
GROUP BY L.country;
/*3.show the first follower of a*/
SELECT UA.user_name AS FollowerName, PA.nick_name AS FollowerNick, UB.user_name AS FollowedName, PB.nick_name AS FollowedNick, F.follow_time AS Time
FROM User UA, User UB, FollowerList F, Profile PA, Profile PB
WHERE UA.user_id = F.followed_id AND UA.user_name = "a" AND F.follower_id = UB.user_id AND UA.user_id = PA.user_id AND UB.user_id = PB.user_id AND F.follow_time = (SELECT MIN(follow_time) FROM FollowerList WHERE followed_id = 1);
/*4.show the number of tweeter in each tag*/
SELECT T.tag_name AS Tag, COUNT(*) AS NumOfTweeter
FROM Tag T, User U
WHERE T.user_id = U.user_id
GROUP BY T.tag_name;
/*5.show the latest tweet*/
SELECT U.user_name AS PosterName, P.nick_name AS NickName, T.content AS Tweet, T.time AS Time
FROM Tweet T, User U, Profile P
WHERE T.poster_id = U.user_id AND P.user_id = U.user_id AND T.time = (SELECT MAX(time) FROM Tweet);
/*6.show the user obtain the most achievements*/
SELECT U.user_name AS UserName, P.nick_name AS NickName, COUNT(*) AS Total
FROM ObtainAch O, User U, Profile P
WHERE O.user_id = U.user_id AND P.user_id = U.user_id
GROUP BY O.user_id
HAVING COUNT(*) >= ALL (SELECT COUNT(*) FROM ObtainAch GROUP BY user_id);
/*7.show the tweets which have more than 2 comments*/
SELECT U.user_name AS UserName, P.nick_name AS NickName, T.content AS Tweet, COUNT(*) AS NumOfComments
FROM Tweet T, User U, Profile P, Comment C
WHERE U.user_id = T.poster_id AND P.user_id = U.user_id AND C.tweet_id = T.tweet_id
GROUP BY T.tweet_id
HAVING COUNT(*) >= 2;
/*8.show the first comment of e's tweets*/
SELECT U.user_name AS Poster, P.nick_name AS NickName, T.content AS Tweet, C.content AS 1stComment, UB.user_name AS CommentBy
FROM Tweet T, User U, Profile P, Comment C, User UB
WHERE T.tweet_id = C.tweet_id AND U.user_id = P.user_id AND U.user_name = "e" AND UB.user_id = C.replyer_id AND C.time = (SELECT MIN(Comment.time) FROM Comment, Tweet WHERE Tweet.tweet_id = Comment.tweet_id AND Tweet.poster_id = 5);
