<?php
SESSION_START();
// Connection parameters 
$host = 'cspp53001.cs.uchicago.edu';
$username = 'xbwang';
$password = 'xbwang';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysql_connect($host, $username, $password)
   or die('Could not connect: ' . mysql_error());
print 'Connected successfully!<br>';

// Selecting database
mysql_select_db($database, $dbcon) 
   or die('Could not select database');
print 'Selected database successfully!<br>';

// Listing tables in your database
$mynewtweet = $_POST['mynewtweet'];
print $mynewtweet.'<br>';
$query = 'SELECT MAX(tweet_id) FROM Tweet';
$result = mysql_query($query,$dbcon);
$tuple = mysql_fetch_row($result);
$tweetid = $tuple[0]+1;
$userid = $_SESSION['userid'];
$time = date("d/m/y : H:i:s", time());
print $tweetid.'<br>';
$query = 'INSERT INTO Tweet(tweet_id, poster_id, time, content, location_id) VALUES('.$tweetid.', '.$userid.', '.$time.', "'.$mynewtweet.'", 16)';
//$query = 'INSERT INTO Tweet(tweet_id, poster_id, time, content, location_id) VALUES(1338, 1,201009011232, "testing", 16)';
$result = mysql_query($query,$dbcon);

	//header("location:main.php");
	//print $_SESSION['userid'];
	//print $tuple[0];
	//print SESSION_ID();
	//header("location:main.php");

//mysql_free_result($result);
// Closing connection
mysql_close($dbcon);
?>