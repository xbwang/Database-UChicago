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
$query = 'SELECT user_name, nick_name, tag_name
FROM Tag, User
WHERE  User.user_id = Tag.user_id AND User.user_id = "'.$_SESSION['userid'].'"';
$result = mysql_query($query,$dbcon) 
  or die('Select tweets failed: ' . mysql_error());
print "All Your Tags Are:<br>";

// Printing table names in HTML
print '<ul>';
while ($tuple = mysql_fetch_row($result)) {
   print "<li>[Username]: $tuple[0] [Nickname]: $tuple[1] [Tag]: <a href = \"list_same_tag.php?tagname=".$tuple[2]."\">$tuple[2]</a>";
}
print '</ul>';

// Free result
mysql_free_result($result);

// Closing connection
mysql_close($dbcon);
?>
<form width = "1000" name="form1" method="post" action="add_tag.php">
<td><p>&nbsp;</p>
<tr>
<td width="65">Add Tag</td>
<td width="0">:</td>
<td width="500">
<input name="addtag" type="text" id="addtag">
</td>
</tr>
<tr>
<td><input type="submit" name="Add" value="Add"></td>
</tr>
</td>
</form>
<a href="main.php">Back</a>