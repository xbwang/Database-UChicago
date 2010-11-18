/*1.show all us user's basic information (user+profile)*/
SELECT *
FROM User U, Profile P, Location L
WHERE U.user_id = P.user_id AND L.location_id = P.location_id AND L.country = "United States";
/*2.show all the followers' profile of the user whose name is Macro*/
SELECT UA.user_name AS FollowerName, PA.nick_name AS FollowerNick, UB.user_name AS FollowedName, PB.nick_name AS FollowedNick
FROM User UA, User UB, FollowerList F, Profile PA, Profile PB
WHERE UA.user_id = F.followed_id AND UA.user_name = "a" AND F.follower_id = UB.user_id AND UA.user_id = PA.user_id AND UB.user_id = PB.user_id;
/*3.show all users who have the tag Music*/
SELECT U.user_name AS UserName, P.nick_name AS NickName, U.email AS Email, T.tag_name AS Tag
FROM User U, Profile P, Tag T
WHERE U.user_id = P.user_id AND T.user_id = U.user_id AND T.tag_name = "Music";
/*4.show user a's followed people who are label as Classmates*/
SELECT UA.user_name AS UserName, PA.nick_name AS NickName, UB.user_name AS FollowerName, PB.nick_name AS FollowerNick, F.followed_group AS FollowerGroup
FROM User UA, User UB, FollowerList F, Profile PA, Profile PB
WHERE UA.user_id = F.follower_id AND UA.user_name = "a" AND F.followed_id = UB.user_id AND UB.user_id = PB.user_id AND UA.user_id = PA.user_id AND F.followed_group = "Classmate";
/*5.show the achievements of user j*/
SELECT U.user_name AS UserName, P.nick_name AS NickName, A.achi_name AS Achievement
FROM User U, ObtainAch O, Profile P, Achievement A
WHERE U.user_id = P.user_id AND O.user_id = U.user_id AND O.achi_id = A.achi_id AND U.user_name = "j";
/*6.show all tweets of user i*/
SELECT U.user_name AS UserName, P.nick_name AS NickName, T.content AS Tweet
FROM User U, Tweet T, Profile P
WHERE U.user_id = P.user_id AND U.user_id = T.poster_id AND U.user_name = "i";
/*7.show the tweets posted at the same location on 10/21/2010*/
SELECT U.user_name AS UserName, P.nick_name AS NickName, T.content AS Tweet, T.time AS Time, L.City AS Location
FROM User U, Profile P, Tweet T, Location L
WHERE U.user_id = P.user_id AND T.poster_id = U.user_id AND T.location_id = L.location_id AND L.City = "Chicago" AND T.time >= 20101021000000 AND T.time < 20101022000000;
/*8.show all the comment of e's tweets*/
SELECT UA.user_name AS PostName, PA.nick_name AS PostNick, UB.user_name AS ReplyerName, PB.nick_name AS ReplyNick, C.content AS Content, C.time AS Time
FROM User UA, User UB, Profile PA, Profile PB, Tweet T, Comment C
WHERE UA.user_id = PA.user_id AND UA.user_id = T.poster_id AND T.tweet_id = C.tweet_id AND PB.user_id = UB.user_id AND UB.user_id = C.replyer_id AND UA.user_name = "e";
