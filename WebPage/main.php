<?php
	SESSION_START();
	if(!$_SESSION['userid']){
		header("location:login.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Welcome to TC+</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>
</head>
<body>
<script type="text/javascript">
$(function() {
$("#featured").tabs({ fx: { height: 'toggle', opacity: 'toggle' } }); });  
</script>
<div id="main_container" class="clear">
  <div id="left_container">
    <div id="logo"> <a href="http://cgi-cspp.cs.uchicago.edu/~xbwang/cs53001/register.php" class="logo_link"></a> </div>
    <div id="menu">
      <ul>
		<li><a href="main.php">Home</a></li>
        <li><a href="list_user_profile.php">Profile</a></li>
		<li><a href="list_user_tags.php">Tag</a></li>
        <li><a href="list_user_achievements.php">Achieve</a></li>
        <li><a href="search.php">Search</a></li>
      </ul>
    </div>
    <div id="featured">
      <ul>
        <li></li>
      </ul>
      <div id="featured-1" class="featured_content">
        <div class="feat_left">
        <p>&nbsp;</p>
        <h1><font size=4>Tell followers what are you doing</font></h1>
        <form name="form" method="post" action="post_newtweet.php">
          <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="mynewtweet" id="mynewtweet" cols="45" rows="5"></textarea></p>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td><input type="submit" name="Submit" value="Submit"></td>
        </form>
		<h1><font size=4>
		<a href="list_following_tweets.php">Show Following Tweets</a>
		</font></h1>
        </div>
        <div class="image_cont"></div>
      </div>
      <div id="featured-2" class="featured_content"></div>
    </div>   
  </div>
  <div id="sidebar">
    <div class="side_cont">
	<h2>
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
	// Selecting database
	mysql_select_db($database, $dbcon) 
	   or die('Could not select database');
	$query = 'SELECT state, country 
	FROM Location, User
	WHERE user_id = '.$_SESSION['userid'].' AND User.location_id = Location.location_id';
	$result = mysql_query($query,$dbcon);
	$tuple = mysql_fetch_row($result);
	print $_SESSION['username'].'<br/>'.'@['.$tuple[0].']';
	?>
	<a href="logout.php">Logout</a>
	</h2>
      <h3><a href="list_all_tweets.php">All Tweets</a></h3>
      <p class="meta_info">all users' tweets</p>
      <h3><a href="list_user_followers.php">Followers</a></h3>
      <p class="meta_info">who're following me</p>
      <h3><a href="list_user_followings.php">Following</a></h3>
      <p class="meta_info">who i'm following</p>
      <h3><a href="list_user_tweets.php">Tweets</a></h3>
      <p class="meta_info">tweets i posted</p>
      <h3><a href="list_tweet_comments.php">Comments</a></h3>
      <p class="meta_info">comments of my tweets</p>
      <h3><a href="list_user_replys.php">Replys</a></h3>
      <p class="meta_info">coments i replied</p>
      <h3><a href="list_sametag_users.php">Similar Twitter</a></h3>
      <p class="meta_info">who has the same tag</p>
    </div>
    <div class="side_cont">
      <h2>&nbsp;</h2>
    </div>
  </div>
  <div class="side_bottom"> </div>
  <div class="clear_sep"></div>
  <div id="footer">
    <p>Copyright &copy;<strong>2010, Xiangbo Wang</strong>- All Rights Reserved<br />
      Template by: <a href="http://www.pvmgarage.com">PV.M Garage</a></p>
  </div>
</div>
</body>
</html>
