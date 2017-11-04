<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<link rel="stylesheet" type="text/css" href="style.css" >
<link rel="stylesheet" type="text/css" href="style3.css" >
</head>

<body>
<div class=body_image>
<div id=body_title>
<h1><center>TYCHE</center></h1>
<h3>Strike A Fortune!</h3>
</div>
<br />
<div class="box">
<form id="form1" name="form1" method="post" action="">
  <div class="in_box"><p><a href="upload_book.php"><font color="white">UPLOAD BOOKS</a> </font></p></div>
  <div class="in_box"><p><a href="browse_book.php"><font color="white">BROWSE BOOKS</a></font></p></div>
  <div class="in_box"><p><a href="upload_edoc.php"><font color="white">UPLOAD E-RESOURCES</a></font></p></div>
  <div class="in_box"><p><a href="browse_edoc.php"><font color="white">BROWSE E-RESOURCES</a></font></p></div>
  <div class="in_box"><p><a href="upload_mis.php"><font color="white">UPLOAD MISCELLANEOUS ITEMS</a></font></p></div>
  <div class="in_box"><p><a href="browse_mis.php"><font color="white">BROWSE MISCELLANEOUS ITEMS</a></font></p></div>
</form>
</div>
<div class="user">
<?php
include("connection.php");
?><b><i><center><?php echo "Hello $_SESSION[username] !";
?></b></i>
<a href="index.php"><font color="#FF0099">Logout</font></a>
</center>

<div class="go_to_profile">
	<p><a href="wishlist.php"><font color="#FF0099">WISHLIST</a></font></p>
</div>
<div class="go_to_profile">
    <p><a href="inbox.php"><font color="#FF0099">INBOX</a></font></p>
</div>
<div class="go_to_profile">
    <p><a href="profile.php"><font color="#FF0099">MY PROFILE</a></font></p>
</div>
</div>

</div>
<p>&nbsp;</p>
<p>&nbsp;</p>

</body>
</html>