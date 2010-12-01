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
$username = $_SESSION['username'];
$userid = $_SESSION['userid'];
$query = 'SELECT user_name, nick_name, time, content, country, state
FROM User, Tweet, Location
WHERE poster_id = user_id AND Tweet.location_id = Location.location_id AND user_name = "'.$username.'" AND time >= ALL (SELECT time FROM Tweet WHERE poster_id = '.$userid.')';
$result = mysql_query($query,$dbcon) 
  or die('Select tweets failed: ' . mysql_error());

print "Your Latest Tweet Is:<br>";

// Printing table names in HTML
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