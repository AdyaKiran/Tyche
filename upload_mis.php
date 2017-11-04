<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload Miscellaneous</title>
<link rel="stylesheet" type="text/css" href="style.css" >
<link rel="stylesheet" type="text/css" href="style2.css" >
<link rel="stylesheet" type="text/css" href="style3.css" >
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
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <p>Item Name: <span style="display:inline-block; width:100px;"></span>
    <label for="m_name"></label>
  <input type="text" name="m_name" id="m_name" />
  <label for="b_auth"></label>
  </p>
  <p>Item Price: <span style="display:inline-block; width:105px;"></span>
    <label for="m_price"></label>
    <input type="text" name="m_price" id="m_price" />
  </p>
  <p><span style="display:inline-block; width:30px;"></span>
  Upload Photo: <span style="display:inline-block; width:50px;"></span>
    <input type="file" name="fileToUpload" id="fileToUpload">
  </p>
  <p>
    <input type="submit" name="submit_btn" id="submit_btn" value="Submit" />
  </p>
</form>
</div>
<?php 
	include ('connection.php');
	$mis_name=$_POST[m_name];
	$mis_price=$_POST[m_price];
	$sold_by=$_SESSION['username'];
	$qry="SELECT * FROM customer WHERE username = '$sold_by'";
	$result = mysql_query($qry);
	$c_id=mysql_fetch_array($result);
	$cust_id=$c_id[cust_id];
	$mis_id=$mis_name.$sold_by;
	
	if(isset($_POST[submit_btn]))
	{	
		$n=$_FILES['fileToUpload']['name'];
		$ext=strrchr($n,'.');
		$fname="$cust_id"."$mis_id"."$ext";
		move_uploaded_file($_FILES['fileToUpload']['tmp_name'],"images/".$fname);
		$qry="INSERT into mis_items(mis_id,mis_name,mis_price,sold_by,mis_photo) VALUES('$mis_id','$mis_name','$mis_price','$cust_id','$fname')";
		mysql_query($qry) or die(mysql_error());
	}
?>
<div class="user">
<?php
include("connection.php");
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