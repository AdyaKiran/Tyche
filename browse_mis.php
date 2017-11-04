<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style1.css" >
<link rel="stylesheet" type="text/css" href="style2.css" >
</head>

<body>
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
<form id="form1" name="form1" method="post" action="browse_mis.php" enctype="multipart/form-data">
<table border="2">
<tr>
<th><?php echo "Item Name"?> &nbsp;</th>
<th><?php echo "Sold By"?> &nbsp;</th>
<th><?php echo "Price"?> &nbsp;</th>	
<th><?php echo "Date"?> &nbsp;</th>
<th>Photo</th>
<th>Request Item</th>
<th>Wishlist</th>
</tr>
<?php
include("connection.php");

$qry="SELECT * FROM mis_items";
$res=mysql_query($qry);
$count=1;
while($r=mysql_fetch_array($res))
{
	$cart_name="b"."$count";
	$wish_name="bt"."$count";	
	?>
<tr>
<td><?php echo $r[mis_name]?> &nbsp;</td>
<td><?php
$qry="SELECT * FROM customer WHERE cust_id='$r[sold_by]'";
$res1=mysql_query($qry);
$result=mysql_fetch_array($res1);
$s=$result[username];
$_COOKIE['key']=$s;
?><a href="view_profile.php?key=<?php echo $s?>"><font color="#FF0099"><?php echo $s?></font> &nbsp;</td>
<td><?php echo $r[mis_price]?> &nbsp;</td>
<td><?php echo $r[sale_date]?> &nbsp;</td>	
<td><img src="images/<?php echo $r[mis_photo]?>.jpg" width="100px" height="100px" alt="Preview Not Available" /> &nbsp;</td>
<td><input type="submit" name="<?php echo $cart_name?>" id="<?php echo $cart_name?>" value="Buy Item"/></td>
	<td><input type="submit" name="<?php echo $wish_name?>" id="<?php echo $wish_name?>" value="Add to WishList"/></td>
	<?php 
		$count=$count+1;
		?>
</tr>
<br />
<?php
}
?>
</table>
<?php
	$qry = "SELECT * FROM mis_items";
	$j = mysql_query($qry);
	$i=1;
	while ($r1=mysql_fetch_array($j))
	{
		$btn_name="bt"."$i";
		$btn2="b"."$i";
		
		$qry5="SELECT * FROM customer WHERE username='$_SESSION[username]'";
		$res5=mysql_query($qry5);
		$result5=mysql_fetch_array($res5);
		$s5=$result5[cust_id];
		
		if (isset($_POST[$btn_name]))
		{
			$qry1 = "INSERT INTO mis_wishlist(mis_id, cust_id) VALUES ('$r1[mis_id]','$s5')";
			mysql_query($qry1) or die(mysql_error());
		}
		if (isset($_POST[$btn2]))
		{
			$qry2="SELECT * FROM customer WHERE username='$_SESSION[username]'";
			$res2=mysql_query($qry2);
			$result1=mysql_fetch_array($res2);
			$s1=$result1[cust_id];
			
			$qry1="INSERT INTO mail VALUES ('$s1','$r1[sold_by]','$r1[mis_id]','')";
			mysql_query($qry1) or die(mysql_error());
		}
		$i=$i+1;
	}
?>
</form>
</div>
<div class="bottom_bar">
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
 </div>

</body>
</html>