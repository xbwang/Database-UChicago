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
$query = 'SELECT user_name, nick_name, Tweet.content, Comment.time, Comment.content, country, state
FROM User, Tweet, Comment, Location
WHERE Tweet.tweet_id = Comment.tweet_id AND user_id = poster_id AND Location.location_id = User.location_id AND replyer_id = '.$_SESSION['userid'].' ORDER BY Comment.time DESC';
$result = mysql_query($query,$dbcon) 
  or die('Select tweets failed: ' . mysql_error());

print "All Comments I Replied:<br>";

// Printing table names in HTML
print '<ul>';
while ($tuple = mysql_fetch_row($result)) {
   print "<li>[Tweet]: \"$tuple[2]\"<br />[Username]: <a href = \"list_user_all.php?username=".$tuple[0]."\">$tuple[0]</a> [Nickname]: $tuple[1] [Time]: $tuple[3] [Location]: $tuple[6]/$tuple[5]<br />[My Comment]: \"$tuple[4]\"";
}
print '</ul>';

// Free result
mysql_free_result($result);

// Closing connection
mysql_close($dbcon);
?>
<a href="main.php">Back</a>