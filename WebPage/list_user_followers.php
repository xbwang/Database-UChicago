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
$userid = mysql_query($tempQuery, $dbcon);
$query = 'SELECT user_name, nick_name, country, state
FROM User, FollowerList, Location
WHERE User.location_id = Location.location_id AND user_id = follower_id AND following_id = '.$_SESSION['userid'].'';
$result = mysql_query($query,$dbcon) 
  or die('Select followers failed: ' . mysql_error());
print "All Your Followers Are:<br>";

// Printing table names in HTML
print '<ul>';
while ($tuple = mysql_fetch_row($result)) {
   print "<li>[Username]: <a href = \"list_user_all.php?username=".$tuple[0]."\">$tuple[0]</a> [Nickname]: $tuple[1] [Location]: $tuple[3]/$tuple[2]";
}
print '</ul>';

// Free result
mysql_free_result($result);

// Closing connection
mysql_close($dbcon);
?>
<a href="main.php">Back</a>