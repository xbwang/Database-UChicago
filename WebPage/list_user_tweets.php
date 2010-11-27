<?php
// Connection parameters 
$host = 'cspp53001.cs.uchicago.edu';
$username = 'your_username';
$password = 'secret';
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
$query = 'SHOW TABLES';
$result = mysql_query($query,$dbcon) 
  or die('Show tables failed: ' . mysql_error());

print "The tables in $database database are:<br>";

// Printing table names in HTML
print '<ul>';
while ($tuple = mysql_fetch_row($result)) {
   print "<li>$tuple[0]";
}
print '</ul>';

// Free result
mysql_free_result($result);

// Closing connection
mysql_close($dbcon);
?>