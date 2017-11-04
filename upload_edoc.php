<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload Edoc</title>
<link rel="stylesheet" type="text/css" href="style.css" >
<link rel="stylesheet" type="text/css" href="style2.css">
<link rel="stylesheet" type="text/css" href="style3.css">
</head>

<body>
<div class=background_image>
	<div class=background_text>
	<h1><center>TYCHE</center></h1>
    <h3>Strike A Fortune!</h3>
    </div>
    
    <div class="left_column">
<div class="side_bar">
<a href="profile.php"><font color="white">VIEW PROFILE</a> </font>
</div>
<div class="side_bar">
<a href="inbox.php"><font color="white">INBOX</a> </font>
</div>
<div class="side_bar">
<a href="upload_book.php"><font color="white">UPLOAD BOOKS</a> </font>
</div>
<div class="side_bar">
<a href="browse_book.php"><font color="white">BROWSE BOOKS</a> </font>
</div>
<div class="side_bar">
<a href="upload_edoc.php"><font color="white">UPLOAD E-DOCS</a> </font>
</div>
<div class="side_bar">
<a href="browse_edoc.php"><font color="white">BROWSE E-DOCS</a> </font>
</div>
<div class="side_bar">
<a href="upload_mis.php"><font color="white">UPLOAD MISCELLANEOUS ITEMS</a> </font>
</div>
<div class="side_bar">
<a href="browse_mis.php"><font color="white">BROWSE MISCELLANEOUS ITEMS</a> </font>
</div>
<div class="side_bar">
<a href="wishlist.php"><font color="white">WISHLIST</a> </font>
</div>
</div>

    
    <div class=background_text>
<form id="form1" name="form1" method="post" action="">
  <p>Edoc Name: <span style="display:inline-block; width:110px;"></span>
    <label for="edoc_name"></label>
  <input type="text" name="edoc_name" id="edoc_name" />

  </p>
  <p>Edoc Size: <span style="display:inline-block; width:120px;"></span>
    <label for="edoc_size"></label>
    <input type="text" name="edoc_size" id="edoc_size" />
  </p>
  <p>Edoc Author: <span style="display:inline-block; width:100px;"></span>
    <label for="edoc_auth"></label>
    <input type="text" name="edoc_auth" id="edoc_auth" />
  </p>
  <p>Edoc Edition:  <span style="display:inline-block; width:100px;"></span>
    <input type="text" name="edoc_ed" id="edoc_ed" />
  </p>
  <p>Edoc Link:  <span style="display:inline-block; width:120px;"></span>
    <input type="text" name="edoc_link" id="edoc_link" />
  </p>
  <p>
    <input type="submit" name="submit_btn" id="submit_btn" value="Submit" />
  </p>
</form>
</div>
<?php 
	include("connection.php");
	
	$e_name=$_POST[edoc_name];
	$e_auth=$_POST[edoc_auth];
	$e_size=$_POST[edoc_size];
	$e_ed=$_POST[edoc_ed];
	$link=$_POST[edoc_link];
	
	$edoc_id=$e_name.$e_auth;

	
	if(isset($_POST[submit_btn]))
	{	
		$qry="INSERT into e_doc(edoc_id,edoc_name,edoc_size,edoc_author,edoc_edition,edoc_link) VALUES('$edoc_id','$e_name','$e_size','$e_auth','$e_ed','$link')";
		mysql_query($qry) or die(mysql_error());
	}
	?>
    <div class="user">
<?php

?><b><i><center><?php echo "Hello $_SESSION[username] !";
?></b></i>
<a href="index.php"><font color="#FF0099">Logout</font></a>
<br />
<span style="display:inline-block; height:30px;"></span>
<a href="home.php"><font color="#FF0099">HOME</font></a>
</center>
</div>
    </div>
</body>
</html>