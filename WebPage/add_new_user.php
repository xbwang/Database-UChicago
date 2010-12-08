<?php
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

// Listing tables in your database
$myusername = $_POST['myusername'];
$mypassword = $_POST['mypassword'];
$mynickname = $_POST['mynickname'];
$mybioinfo = $_POST['mybioinfo'];
$mybloglink = $_POST['mybloglink'];
$mylocation = $_POST['mylocation'];
/*
print $myusername;
print $mypassword;
print $mynickname;
print $mybioinfo;
print $mybloglink;
print $mylocation;
*/
$query = 'SELECT * From User WHERE user_name = "'.$myusername.'"';
$result = mysql_query($query,$dbcon);
$count = mysql_num_rows($result);
if($count != 0){
	header("location:register_fail.php");
}
print $count;
$query = 'SELECT MAX(user_id) FROM User';
$result = mysql_query($query, $dbcon);
$tuple = mysql_fetch_row($result);
$userid = $tuple[0]+1;
$query = 'INSERT INTO User(user_id, user_name, nick_name, bio_info, location_id, blog_link, password) VALUES('.$userid.', "'.$myusername.'", "'.$mynickname.'", "'.$mybioinfo.'", '.$mylocation.', "'.$mybloglink.'", "'.$mypassword.'")';
$result = mysql_query($query,$dbcon);
//header("location:main.php");

// Free result
//mysql_free_result($result);

// Closing connection
mysql_close($dbcon);
?>