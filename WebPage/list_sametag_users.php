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
$query = 'SELECT UB.user_name, UB.nick_name, TB.tag_name
FROM Tag TA, Tag TB, User UA, User UB
WHERE  UA.user_id = TA.user_id AND TA.user_id = "'.$_SESSION['userid'].'" AND UB.user_id = TB.user_id AND TA.tag_name = TB.tag_name AND TA.user_id <> TB.user_id
ORDER BY TB.tag_name';
$result = mysql_query($query,$dbcon) 
  or die('Select tweets failed: ' . mysql_error());
print "All Your Tags Are:<br>";

// Printing table names in HTML
print '<ul>';
while ($tuple = mysql_fetch_row($result)) {
   print "<li>[Tag]: $tuple[2] [Username]: $tuple[0] [Nickname]: $tuple[1]";
}
print '</ul>';

// Free result
mysql_free_result($result);

// Closing connection
mysql_close($dbcon);
?>
<a href="main.php">Back</a>