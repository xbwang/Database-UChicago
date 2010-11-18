DROP TABLE IF EXISTS User;
CREATE TABLE User(
	user_id BIGINT UNSIGNED,
	user_name VARCHAR(20) UNIQUE,
	nick_name VARCHAR(20),
	bio_info VARCHAR(200),
	location_id INT UNSIGNED,
	blog_link VARCHAR(100),
	password VARCHAR(50),
	/*email VARCHAR(50),*/
	PRIMARY KEY (user_id)
	)InnoDB;

/*
DROP TABLE IF EXISTS Profile;
CREATE TABLE Profile(
	profile_id BIGINT UNSIGNED,
	user_id BIGINT UNSIGNED,
	nick_name VARCHAR(20),
	location_id INT UNSIGNED,
	page_link VARCHAR(100),
	photo_link VARCHAR(100),
	blog_link VARCHAR(100),
	bio_info VARCHAR(200),
	PRIMARY KEY (profile_id)
	);
*/
	
DROP TABLE IF EXISTS Tweet;
CREATE TABLE Tweet(
	tweet_id BIGINT UNSIGNED,
	poster_id BIGINT UNSIGNED,
	time TIMESTAMP,
	content VARCHAR(200),
	location_id INT UNSIGNED,
	PRIMARY KEY (tweet_id)
	);

DROP TABLE IF EXISTS FollowerList;
CREATE TABLE FollowerList(
	follower_id BIGINT UNSIGNED, /*first follows second*/
	following_id BIGINT UNSIGNED,
	/*follow_time DATETIME,*/
	following_group VARCHAR(50),
	PRIMARY KEY (follower_id, following_id)
	);

DROP TABLE IF EXISTS Location;
CREATE TABLE Location(
	location_id INT UNSIGNED,
	country VARCHAR(50),
	state VARCHAR(50),
    PRIMARY KEY (location_id)
	);

DROP TABLE IF EXISTS Comment;
CREATE TABLE Comment(
	tweet_id BIGINT UNSIGNED,
	replyer_id BIGINT UNSIGNED,
	content VARCHAR(200),
	time TIMESTAMP,
	PRIMARY KEY (tweet_id, replyer_id, time)
	);
	
DROP TABLE IF EXISTS Tag;
CREATE TABLE Tag(
	user_id BIGINT UNSIGNED,
	tag_name VARCHAR(50),
	PRIMARY KEY (user_id, tag_name)
	);

DROP TABLE IF EXISTS Achievement;
CREATE TABLE Achievement(
	achi_id INT UNSIGNED,
	achi_name VARCHAR(50),
	PRIMARY KEY (achi_id)
	);

DROP TABLE IF EXISTS ObtainAch;
CREATE TABLE ObtainAch(
	user_id BIGINT UNSIGNED,
	achi_id INT UNSIGNED,
	PRIMARY KEY (user_id, achi_id)
	);