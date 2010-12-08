<?php
SESSION_START();
SESSION_DESTROY();
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

<form width = "1000" name="form1" method="post" action="add_new_user.php">
<td><p>&nbsp;</p>
  <h1><font size=5><strong>Sign Up Here</strong></font></big></h1>
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
<td><input name="mypassword" type="password" id="mypassword">
  <p>&nbsp; </p>
</td>
</tr>
<tr>
<td width="65">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nickname</td>
<td width="0">&nbsp;:</td>
<td width="500">
  <input name="mynickname" type="text" id="mynickname">
  <p>&nbsp; </p>
</td>
</tr>
<tr>
<td width="65">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Location</td>
<td width="0">&nbsp;&nbsp;&nbsp;:</td>
<td width="500">
  <select name="mylocation" type="text" id="mylocation">
  	<option value = 0>      </option>
	<option value = 0>Others</option>
	<option value = 1>Alabama</option>
	<option value = 2>Alaska</option>
	<option value = 3>American Samoa</option>
	<option value = 4>Arizona</option>
	<option value = 5>Arkansas</option>
	<option value = 6>California</option>
	<option value = 7>Colorado</option>
	<option value = 8>Connecticut</option>
	<option value = 9>Delaware</option>
	<option value = 10>District of Columbia</option>
	<option value = 11>Florida</option>
	<option value = 12>Georgia</option>
	<option value = 13>Guam</option>
	<option value = 14>Hawaii</option>
	<option value = 15>Idaho</option>
	<option value = 16>Illinois</option>
	<option value = 17>Indiana</option>
	<option value = 18>Iowa</option>
	<option value = 19>Kansas</option>
	<option value = 20>Kentucky</option>
	<option value = 21>Louisiana</option>
	<option value = 22>Maine</option>
	<option value = 23>Maryland</option>
	<option value = 24>Massachusetts</option>
	<option value = 25>Michigan</option>
	<option value = 26>Minnesota</option>
	<option value = 27>Mississippi</option>
	<option value = 28>Missouri</option>
	<option value = 29>Montana</option>
	<option value = 30>Nebraska</option>
	<option value = 31>Nevada</option>
	<option value = 32>New Hampshire</option>
	<option value = 33>New Jersey</option>
	<option value = 34>New Mexico</option>
	<option value = 35>New York</option>
	<option value = 36>North Carolina</option>
	<option value = 37>North Dakota</option>
	<option value = 38>Northern Marianas Islands</option>
	<option value = 39>Ohio</option>
	<option value = 40>Oklahoma</option>
	<option value = 41>Oregon</option>
	<option value = 42>Pennsylvania</option>
	<option value = 43>Puerto Rico</option>
	<option value = 44>Rhode Island</option>
	<option value = 45>South Carolina</option>
	<option value = 46>South Dakota</option>
	<option value = 47>Tennessee</option>
	<option value = 48>Texas</option>
	<option value = 49>Utah</option>
	<option value = 50>Vermont</option>
	<option value = 51>Virginia</option>
	<option value = 52>Virgin Islands</option>
	<option value = 53>Washington</option>
	<option value = 54>West Virginia</option>
	<option value = 55>Wisconsin</option>
	<option value = 56>Wyoming</option>
  </select>
  <p>&nbsp; </p>
</td>
</tr>
<tr>
<td width="65">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bio Info</td>
<td width="0">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
<td width="500">
  <input name="mybioinfo" type="text" id="mybioinfo">
  <p>&nbsp;</p>
</td>
</tr>
<tr>
<td width="65">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Blog Link</td>
<td width="0">&nbsp;&nbsp;:</td>
<td width="500">
  <input name="mybloglink" type="text" id="mybloglink">
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit" value="Submit"></td>
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
      	  <h3>Newest Post</h3>
	      <p class="meta_info">lastest tweet i posted</p>
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
