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
$searchtweeter = $_POST['searchtweeter'];

// Listing tables in your database
$query = 'SELECT user_id, user_name, nick_name, bio_info, blog_link, country, state
FROM User, Location
WHERE  User.location_id = Location.location_id AND user_name LIKE "%'.$searchtweeter.'%"';
$result = mysql_query($query,$dbcon) 
  or die('Select tweets failed: ' . mysql_error());
print $searchtweeter;
print "'s Profile:<br>";

// Printing table names in HTML

while ($tuple = mysql_fetch_row($result)) {
	print '<ul>';
   print "<li>[Userid]: $tuple[0]<li>[Username]: $tuple[1]<li>[Nickname]: $tuple[2]<li>[Location]: $tuple[6]/$tuple[5]<li>[BioInfo]: $tuple[3]<li>[Blog]: $tuple[4]<br>";
print '</ul>';
}


mysql_free_result($result);

// Closing connection
mysql_close($dbcon);
?>
<a href="search.php">Back</a>