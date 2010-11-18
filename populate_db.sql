LOAD DATA LOCAL INFILE "./UserIn.dat" REPLACE INTO TABLE User FIELDS TERMINATED BY '|' (user_id,user_name,nick_name,bio_info,location_id,blog_link);
/*
LOAD DATA LOCAL INFILE "Profile.dat" REPLACE INTO TABLE Profile FIELDS TERMINATED BY '|' (profile_id, user_id, nick_name, location_id, page_link, photo_link, blog_link, bio_info);
*/
LOAD DATA LOCAL INFILE "./LocationIn.dat" REPLACE INTO TABLE Location FIELDS TERMINATED BY ',' (location_id, country, state);

LOAD DATA LOCAL INFILE "./TweetIn.dat" REPLACE INTO TABLE Tweet FIELDS TERMINATED BY '|' (tweet_id, poster_id, time, content, location_id);

LOAD DATA LOCAL INFILE "./CommentIn.dat" REPLACE INTO TABLE Comment FIELDS TERMINATED BY '|' (tweet_id, replyer_id, content, time);

LOAD DATA LOCAL INFILE "./TagIn.dat" REPLACE INTO TABLE Tag FIELDS TERMINATED BY '|' (user_id, tag_name);

LOAD DATA LOCAL INFILE "./AchievementIn.dat" REPLACE INTO TABLE Achievement FIELDS TERMINATED BY '|' (achi_id, achi_name);

LOAD DATA LOCAL INFILE "./ObtainIn.dat" REPLACE INTO TABLE ObtainAch FIELDS TERMINATED BY '|' (user_id, achi_id);

LOAD DATA LOCAL INFILE "./FollowIn.dat" REPLACE INTO TABLE FollowerList FIELDS TERMINATED BY ',' (follower_id, following_id, following_group);