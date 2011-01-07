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

$tweetername = $_GET['username'];
$myuserid = $_SESSION['userid'];
// Printing profile in HTML
$query = 'SELECT user_id, user_name, nick_name, bio_info, blog_link, country, state
FROM User, Location
WHERE  User.location_id = Location.location_id AND user_name = "'.$tweetername.'"';
$result = mysql_query($query,$dbcon)
  or die('Select tweets failed: ' . mysql_error());
print $tweetername;
print "'s Profile:<br>";

print '<ul>';
while ($tuple = mysql_fetch_row($result)) {
   $tweeterid = $tuple[0];
   print "<li>[Userid]: $tuple[0]<li>[Username]: $tuple[1]<li>[Nickname]: $tuple[2]<li>[Location]: $tuple[6]/$tuple[5]<li>[BioInfo]: $tuple[3]<li>[Blog]: $tuple[4]";
}
print '</ul>';
//check relationship
$query = 'SELECT * FROM FollowerList WHERE follower_id = '.$myuserid.' AND following_id = '.$tweeterid.'';
$result = mysql_query($query, $dbcon);
$count = mysql_num_rows($result);
if($myuserid == $tweeterid){
	echo "Yourself";
}else{
	if($count != 0){
		print "Followed";
	}else{
		echo "<a href=\"follow_tweeter.php?id=".$tweeterid."\">Follow</a>";
	}
}
echo " | ";
echo "<a href=\"main.php\">Back</a>";
echo "<br>";

//$myusername = $_GET['username'];
//Print tweets in HTML
$query = 'SELECT user_name, nick_name, time, content, country, state
FROM User, Tweet, Location
WHERE poster_id = user_id AND Tweet.location_id = Location.location_id AND user_name = "'.$tweetername.'" ORDER BY time DESC';
$result = mysql_query($query,$dbcon) 
  or die('Select tweets failed: ' . mysql_error());

print "All ";
print $tweetername;
print "'s Tweets Are:<br>";

print '<ul>';
while ($tuple = mysql_fetch_row($result)) {
   print "<li>[Username]: $tuple[0] [Nickname]: $tuple[1] [Time]: $tuple[2] [Location]: $tuple[5]/$tuple[4]<br />[Content]: $tuple[3]";
}
print '</ul>';

// Free result
mysql_free_result($result);

// Closing connection
mysql_close($dbcon);
?>