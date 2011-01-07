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
$achi_id = $_GET['achiid'];
$query = 'SELECT achi_name FROM Achievement WHERE achi_id = '.$achi_id.'';
$result = mysql_query($query, $dbcon);
$tuple = mysql_fetch_row($result);
$achi_name = $tuple[0];

$query = 'SELECT DISTINCT user_name, nick_name, state FROM User, ObtainAch, Achievement, Location WHERE Achievement.achi_id = ObtainAch.achi_id AND ObtainAch.achi_id = "'.$achi_id.'" AND Location.location_id = User.location_id';
$result = mysql_query($query,$dbcon) 
  or die('Select tweets failed: ' . mysql_error());
print "All Users Who Achieve \"";
print $achi_name;
print "\" Are:<br>";

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