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
        <li>Profile</li>
		<li>Tag</li>
        <li>Achievement</li>
      </ul>
    </div>
    <div id="featured">
      <ul>
        <li></li>
      </ul>
      <div id="featured-1" class="featured_content">
        <div class="feat_left">

<form width = "1000" name="form1" method="post" action="check_login.php">
<td><p>&nbsp;</p>
  <h1><font size=5><strong>User Login</strong></font></big></h1>
<tr>
<td width="65">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username</td>
<td width="0">:</td>
<td width="500">
  <input name="myusername" type="text" id="myusername">
  <p>&nbsp; </p>
</td>
</tr>
<tr>
<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password</td>
<td>&nbsp;:</td>
<td><input name="mypassword" type="password" id="mypassword"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Login"></td>
</tr>
</td>
</form>
</div>
        <div class="image_cont"></div>
      </div>
      <div id="featured-2" class="featured_content">
      </div>
     </div>   
  </div>
  <div id="sidebar">
    <div class="side_cont">
		<h2></h2>
      	  <h3>All Tweets</h3>
	      <p class="meta_info">all users' tweets</p>
	      <h3>Followers</h3>
	      <p class="meta_info">who're following me</p>
	      <h3>Following</h3>
	      <p class="meta_info">who i'm following</p>
	      <h3>Tweets</h3>
	      <p class="meta_info">tweets i posted</p>
	      <h3>Comments</h3>
	      <p class="meta_info">comments of my tweets</p>
	      <h3>Replys</h3>
	      <p class="meta_info">coments i replied</p>
	      <h3>Similar Twitter</h3>
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
