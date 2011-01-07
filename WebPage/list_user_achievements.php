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
$query = 'SELECT user_name, nick_name, achi_name, Achievement.achi_id
FROM Achievement, ObtainAch, User
WHERE  Achievement.achi_id = ObtainAch.achi_id AND User.user_id = ObtainAch.user_id AND User.user_id = "'.$_SESSION['userid'].'"';
$result = mysql_query($query,$dbcon) 
  or die('Select tweets failed: ' . mysql_error());
print "All Your Achievements Are:<br>";

// Printing table names in HTML
print '<ul>';
while ($tuple = mysql_fetch_row($result)) {
   print "<li>[Username]: $tuple[0] [Nickname]: $tuple[1] [Achievement]: <a href = \"list_same_achieve.php?achiid=".$tuple[3]."\">$tuple[2]</a>";
}
print '</ul>';

// Free result
mysql_free_result($result);

// Closing connection
mysql_close($dbcon);
?>
<a href="main.php">Back</a>