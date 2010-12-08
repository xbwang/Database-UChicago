<?php
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
$contain = $_POST['searchtweet'];

// Listing tables in your database
$query = 'SELECT user_name, nick_name, time, content, country, state
FROM User, Tweet, Location
WHERE poster_id = user_id AND Tweet.location_id = Location.location_id AND content LIKE "%'.$contain.'%" ORDER BY time DESC';
$result = mysql_query($query,$dbcon) 
  or die('Select tweets failed: ' . mysql_error());

print "All Tweets Contain ";
print $contain;
print " Are:<br>";

// Printing table names in HTML
print '<ul>';
while ($tuple = mysql_fetch_row($result)) {
   print "<li>[Username]: $tuple[0] [Nickname]: $tuple[1] [Time]: $tuple[2] [Location]: $tuple[5]/$tuple[4]<br />[Content]: $tuple[3]";
}
print '</ul>';

mysql_free_result($result);

// Closing connection
mysql_close($dbcon);
?>
<a href="search.php">Back</a>