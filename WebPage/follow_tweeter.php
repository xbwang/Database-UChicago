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
//print 'Connected successfully!<br>';

// Selecting database
mysql_select_db($database, $dbcon) 
   or die('Could not select database');
//print 'Selected database successfully!<br>';

//get follower/following id

$followingid = $_GET['id'];
$myuserid = $_SESSION['userid'];
/*
$query = 'SELECT user_id FROM User WHERE user_name = "'.$followingname.'"';
$result = mysql_query($query, $dbcon);
$tuple = mysql_fetch_row($result);
$followingid = $tuple[0];
*/
//check relationship
/*
$query = 'SELECT * FROM FollowerList WHERE follower_id = '.$myuserid.' AND following_id = '.$followingid.'';
$result = mysql_query($query, $dbcon);
$count = mysql_num_rows($result);
if($count != 0){
	print "Already Followed!";
	echo " | ";
	echo "<a href=\"main.php\">Back</a>";
}else{
*/
	$query = 'INSERT INTO FollowerList(follower_id, following_id, following_group) VALUES('.$myuserid.', '.$followingid.', "default")';
	$result = mysql_query($query, $dbcon);
	print "Follow Successfully!";
	echo " | ";
	echo "<a href=\"main.php\">Back</a>";
//}
// Free result
//mysql_free_result($result);

// Closing connection
mysql_close($dbcon);
?>