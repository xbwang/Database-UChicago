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
$myuserid = $_SESSION['userid'];
$tag = $_POST['addtag'];

$query = 'SELECT * From Tag WHERE tag_name = "'.$tag.'"';
$result = mysql_query($query,$dbcon);
$count = mysql_num_rows($result);
if($count != 0){
	//header("location:main.php");
	print "This tag already exists!<br>";
}
else{
	$query = 'INSERT INTO Tag(user_id, tag_name) VALUES('.$myuserid.', "'.$tag.'")';
	$result = mysql_query($query,$dbcon);
	//header("location:main.php");
	print "Added successfully!";
	print " | ";
	echo "<a href=\"main.php\">Back</a>";
	echo "<br>"; 
}


// Free result
//mysql_free_result($result);

// Closing connection
mysql_close($dbcon);
?>