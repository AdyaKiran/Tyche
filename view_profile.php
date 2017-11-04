<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Profile</title>
<link rel="stylesheet" type="text/css" href="style1.css" >
<link rel="stylesheet" type="text/css" href="style2.css" >
</head>

<body>
<body>
<?php include("connection.php"); ?>
<div class=body_image>
	<div class=body_title>
	<h1><center>TYCHE</center></h1>
    <h3>Strike A Fortune!</h3> 
<h3><i>Choose the best offer from our list!!</i></h3>
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

<div class="middle_column">
<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
	<?php $prof=$_REQUEST['key'];
     echo $prof?>
     
     <?php 
	$qry="SELECT * FROM customer WHERE username='$prof'";
	$res=mysql_query($qry);
	while($r=mysql_fetch_array($res))
	{
?>
<div class="profile_photo">
<img src="images/<?php echo $r[cust_photo]?>" width="130px" height="130px"  alt="Photo Not Uploaded" /> &nbsp;
<br />
</div>
<span style="display:inline-block; height:50px;"></span>
FIRST NAME:<span style="display:inline-block; width:500px;"></span><?php echo "$r[first_name]"?>
<br />
<span style="display:inline-block; height:30px;"></span>
LAST NAME:<span style="display:inline-block; width:500px;"></span><?php echo "$r[last_name]"?>
<br />
<span style="display:inline-block; height:30px;"></span>
DATE OF BIRTH:<span style="display:inline-block; width:500px;"></span><?php echo "$r[dob]"?>
<br />
<span style="display:inline-block; height:30px;"></span>
ROOM NO:<span style="display:inline-block; width:500px;"></span><?php echo "$r[room_no]"?>
<br />
<span style="display:inline-block; height:30px;"></span>
HOSTEL BLOCK:<span style="display:inline-block; width:500px;"></span><?php echo "$r[hostel_block]"?>
<br />
<span style="display:inline-block; height:30px;"></span>
CITY:<span style="display:inline-block; width:500px;"></span><?php echo "$r[city]"?>
<br />
<span style="display:inline-block; height:30px;"></span>
STATE:<span style="display:inline-block; width:500px;"></span><?php echo "$r[state]"?>
<br />
<span style="display:inline-block; height:30px;"></span>
PINCODE:<span style="display:inline-block; width:500px;"></span><?php echo "$r[pincode]"?>
<br />
<span style="display:inline-block; height:30px;"></span>
COURSE:<span style="display:inline-block; width:500px;"></span><?php echo "$r[course]"?>
<br />
<span style="display:inline-block; height:30px;"></span>
BRANCH:<span style="display:inline-block; width:450px;"></span><?php echo "$r[branch]"?>
<br />
<span style="display:inline-block; height:30px;"></span>
SEMESTER:<span style="display:inline-block; width:550px;"></span><?php echo "$r[semester]"?>
<br />
<span style="display:inline-block; height:30px;"></span>
EMAIL:<span style="display:inline-block; width:400px;"></span><?php echo "$r[email]"?>
<br />
<span style="display:inline-block; height:30px;"></span>
PHONE NO:<span style="display:inline-block; width:500px;"></span><?php echo "$r[phone_no]"?>

<?php } ?>
</form>
</div>

<div class="bottom_bar">
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

</div>
</body>
</html>