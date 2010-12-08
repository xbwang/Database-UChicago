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

// Listing tables in your database
$myusername = $_SESSION['username'];
$mypassword = $_POST['mypassword'];
$mynickname = $_POST['mynickname'];
$mybioinfo = $_POST['mybioinfo'];
$mybloglink = $_POST['mybloglink'];
$mylocation = $_POST['mylocation'];

$query = 'UPDATE User SET nick_name = "'.$mynickname.'", password = "'.$mypassword.'", bio_info = "'.$mybioinfo.'", location_id = '.$mylocation.', blog_link = "'.$mybloglink.'"
WHERE user_name = "'.$myusername.'"';
$result = mysql_query($query,$dbcon);
header("location:main.php");



// Free result
//mysql_free_result($result);

// Closing connection
mysql_close($dbcon);
?>