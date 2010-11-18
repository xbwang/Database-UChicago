/*show all profiiles*/
SELECT *
FROM User, Profile
WHERE User.user_id = Profile.user_id;
/*show every user's email&location*/
SELECT U.user_name AS UserName, P.nick_name AS NickName, U.email AS Email, L.country AS Country, L.state AS State, L.city AS City
FROM User U, Profile P, Location L
WHERE U.user_id = P.user_id AND P.location_id = L.location_id;
/*show user "a"'s followers*/
SELECT U_A.user_name AS Followee_id, U_B.user_name AS Follower_id
FROM FollowerList F, User U_A, User U_B
WHERE U_A.user_id = F.followee_id AND U_A.user_name = "a" AND U_B.user_id = F.follower_id;
/*Count the number of reply of every tweet*/
SELECT U.user_name AS UserName, P.nick_name AS NickName, U.email AS EMail, T.content AS Content, COUNT(*) AS Reply_Num
FROM Comment C, User U, Profile P, Tweet T
WHERE U.user_id = T.poster_id AND P.user_id = U.user_id AND C.tweet_id = T.tweet_id
GROUP BY T.tweet_id;
/*show the tweeters who has the same tag*/
SELECT DISTINCT U.user_name AS UserName, P.nick_name AS NickName, U.email AS EMail, L.country AS Country, T_A.tag_name AS Tag
FROM User U, Tag T_A, Tag T_B, Profile P, Location L
WHERE U.user_id = T_A.user_id AND T_A.tag_name = T_B.tag_name AND T_A.tag_name = "Music" AND U.user_id = P.user_id AND P.location_id = L.location_id;
/*show every users' following list and time*/
SELECT U_B.user_name AS UserName, P_B.nick_name AS NickName, U_A.user_name AS FollowingID, P_A.nick_name AS FollowingName, F.follow_time AS Time
FROM FollowerList F, User U_A, User U_B, Profile P_A, Profile P_B
WHERE U_A.user_id = F.followee_id AND U_B.user_id = F.follower_id AND P_A.user_id = U_A.user_id AND P_B.user_id = U_B.user_id;
/*show the users who obtain achievements >= 2*/
SELECT U.user_name AS UserName, P.nick_name AS NickName, COUNT(*) AS TotalNum
FROM ObtainAch O, User U, Achievement A, Profile P
WHERE U.user_id = O.user_id AND A.achi_id = O.achi_id AND P.user_id = U.user_id
GROUP BY U.user_name
HAVING COUNT(*) >= 2;
/*show the users in UK or US*/
SELECT U.user_name AS UserName, P.nick_name AS NickName, U.email AS EMail, L.country AS Country
FROM Location L, User U, Profile P
WHERE L.location_id = P.location_id AND U.user_id = P.user_id AND L.location_id IN (1, 2, 3, 4, 5, 9);
/*show the users obtain a unique achievement*/
SELECT U.user_name AS UserName, P.nick_name AS NickName, A.achi_name AS UniqueAchievement
FROM ObtainAch O, Achievement A, User U, Profile P
WHERE O.achi_id = A.achi_id AND U.user_id = P.user_id AND O.user_id = U.user_id AND NOT EXISTS (SELECT * FROM ObtainAch WHERE achi_id = O.achi_id AND user_id <> O.user_id);
/*show the user obtain the most achievements*/
SELECT U.user_name AS UserName, P.nick_name AS NickName, COUNT(*) AS Total
FROM ObtainAch O, User U, Profile P
WHERE O.user_id = U.user_id AND P.user_id = U.user_id
GROUP BY O.user_id
HAVING COUNT(*) >= ALL (SELECT COUNT(*) FROM ObtainAch GROUP BY user_id);