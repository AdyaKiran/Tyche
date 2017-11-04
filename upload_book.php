<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Upload Books</title>
<link rel="stylesheet" type="text/css" href="style.css">
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
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <p>Book Name: <span style="display:inline-block; width:100px;"></span>
    <label for="b_name"></label>
  <input type="text" name="b_name" id="b_name" />

  </p>
  <p>Book Author: <span style="display:inline-block; width:90px;"></span>
    <label for="b_auth"></label>
    <input type="text" name="b_auth" id="b_auth" />
  </p>
  <p>Book Price: <span style="display:inline-block; width:100px;"></span>
    <label for="b_price"></label>
    <input type="text" name="b_price" id="b_price" />
  </p>
  <p>Book Edition: <span style="display:inline-block; width:90px;"></span> 
    <input type="text" name="b_ed" id="b_ed" />
  </p>
  <p>Book Publication: <span style="display:inline-block; width:70px;"></span>
    <input type="text" name="b_pub" id="b_pub" />
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
	include("connection.php");
	
	#FOR GETTING CUST_ID
	
	$sold_by=$_SESSION['username'];
	$qry="SELECT * FROM customer WHERE username = '$sold_by'";
	$result = mysql_query($qry);
	$c_id=mysql_fetch_array($result);
	$cust_id=$c_id[cust_id];
	
	$b_name=$_POST[b_name];
	$qry="SELECT cust_id FROM customer WHERE username='$_SESSION[username]'";
	$res=mysql_query($qry);

	$b_auth=$_POST[b_auth];
	$b_price=$_POST[b_price];
	$b_ed=$_POST[b_ed];
	$b_pub=$_POST[b_pub];

	$book_id=$b_name.$b_auth;
	if(isset($_POST[submit_btn]))
	{	
		$n=$_FILES['fileToUpload']['name'];
		$ext=strrchr($n,'.');
		$fname="$cust_id"."$book_id"."$ext";
		//move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$_FILES["fileToUpload"]["name"]);
		move_uploaded_file($_FILES['fileToUpload']['tmp_name'],"images/".$fname);
		$qry="INSERT into book(book_id,sold_by,book_name,book_author,book_price,book_edition,book_pub,book_photo) VALUES('$book_id','$cust_id','$b_name','$b_auth','$b_price','$b_ed','$b_pub','$fname')";
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