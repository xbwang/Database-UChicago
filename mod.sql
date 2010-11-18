/*1.insert a new user into the User*/
INSERT INTO User(user_id, user_name, password, email) VALUES(27, "xbwang", "xbwang", "xbwang@uchicago.edu");
/*2.insert a new location in Location*/
INSERT INTO Location(location_id, country, state, city) VALUES(14, "China", "Guangdong", "Shenzhen");
/*3.insert the a's followers into a new table*/
DROP TABLE IF EXISTS FollowersOfA;
CREATE TABLE FollowersOfA(follower_id BIGINT UNSIGNED, followed_id BIGINT UNSIGNED, followe_time DATETIME, followed_group VARCHAR(50), PRIMARY KEY (follower_id, followed_id));
INSERT INTO FollowersOfA (SELECT F.* FROM FollowerList F, User U WHERE F.followed_id = U.user_id AND U.user_name = "a");
/*4.insert the US tweeters into a new table*/
DROP TABLE IF EXISTS USProfiles;
CREATE TABLE USProfiles(profile_id BIGINT UNSIGNED, user_id BIGINT UNSIGNED, nick_name VARCHAR(20), location_id INT UNSIGNED, page_link VARCHAR(100), photo_link VARCHAR(100), blog_link VARCHAR(100), bio_info VARCHAR(200), PRIMARY KEY (profile_id));
INSERT INTO USProfiles(SELECT P.* FROM Profile P, Location L WHERE P.location_id = L.location_id AND L.country = "United States");
/*5.delete the tag Rock in Tag Table*/
DELETE FROM Tag WHERE tag_name = "Rock";
/*6.delete the the CA from location*/
DELETE FROM Location WHERE country = "United States" AND state = "CA";
/*7.update user a's nick name to BigMarco and bio_info*/
UPDATE Profile SET nick_name = "BigMarco", bio_info = "updated info" WHERE user_id = 1;
/*8.update the tag Musci to Pop Music*/
UPDATE Tag SET Tag_name = "Pop Music" WHERE Tag_name = "Music";
