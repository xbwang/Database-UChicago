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
$tagname = $_GET['tagname'];
$query = 'SELECT user_name, nick_name, state FROM User, Location, Tag WHERE tag_name = "'.$tagname.'" AND Location.location_id = User.location_id AND Tag.user_id = User.user_id';
$result = mysql_query($query,$dbcon) 
  or die('Select tweets failed: ' . mysql_error());
print "All Users Who Have Tags ";
print $tagname;
print " Are:<br>";

// Printing table names in HTML
print '<ul>';
while ($tuple = mysql_fetch_row($result)) {
   print "<li>[Username]: <a href = \"list_user_all.php?username=".$tuple[0]."\">$tuple[0]</a> [Nickname]: $tuple[1] [Location]: $tuple[2]";
}
print '</ul>';

// Free result
mysql_free_result($result);

// Closing connection
mysql_close($dbcon);
?>
<a href="main.php">Back</a>