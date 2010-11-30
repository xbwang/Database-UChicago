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
$query = 'SELECT * FROM User WHERE user_name = "'.$myusername.'" AND password = "'.$mypassword.'"';
$result = mysql_query($query,$dbcon);
$count = mysql_num_rows($result);

if($count == 1){
	SESSION_START();
	$_SESSION['username']=$myusername;
	//header("location:main.php");
	//print $_SESSION['username'];
	//print SESSION_ID();
	header("location:main.php");
}
else{
	header("location:login_fail.php");
}
// Free result
mysql_free_result($result);

// Closing connection
mysql_close($dbcon);
?>