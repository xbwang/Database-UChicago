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

print "All Your Following Tweets Are:<br>";
$query = 'SELECT following_id
FROM FollowerList
WHERE follower_id = '.$_SESSION['userid'].'';
$result = mysql_query($query,$dbcon);

while($tuple = mysql_fetch_row($result)){
	$queryT = 'SELECT user_name, nick_name, time, content, country, state
	FROM User, Tweet, Location
	WHERE poster_id = user_id AND Tweet.location_id = Location.location_id AND user_id = '.$tuple[0].'
	ORDER BY time DESC';
	$resultT = mysql_query($queryT,$dbcon);
	print '<ul>';
	while ($tupleT = mysql_fetch_row($resultT)) {
	   print "<li>[Username]: $tupleT[0] [Nickname]: $tupleT[1] [Time]: $tupleT[2] [Location]: $tupleT[5]/$tupleT[4]<br />[Content]: $tupleT[3]";
	}
	print '</ul>';
}
?>
<a href="main.php">Back</a>