<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style1.css" >
<link rel="stylesheet" type="text/css" href="style2.css" >
<title>Untitled Document</title>
</head>

<body>
<div class=body_image>
	<div class=body_title>
	<h1><center>TYCHE</center></h1>
    <h3>Strike A Fortune!</h3> 
<h3><i>Your Wishlist</i></h3>
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
<form id="form1" name="form1" method="post" action="wishlist.php" enctype="multipart/form-data">
	<table border="2">
		<tr>
			<th><?php echo "Item Name"?> &nbsp;</th>
			<th><?php echo "Sold By"?> &nbsp;</th>
			<th><?php echo "Price"?> &nbsp;</th>	
			<th>Photo</th>
			<th>Request Item</th>
		</tr>
	<?php
		include("connection.php");
	
		$qry2="SELECT * FROM customer WHERE username='$_SESSION[username]'";
		$res2=mysql_query($qry2);
		$result1=mysql_fetch_array($res2);
		$s1=$result1[cust_id];
	
		$qry="SELECT * FROM mis_wishlist WHERE cust_id='$s1'";
		$res=mysql_query($qry);
		$count=1;
		while($r=mysql_fetch_array($res))
		{
			$cart_name="b"."$count";	
	?>
		<tr>
			<td><?php
				$qry="SELECT * FROM mis_items WHERE mis_id='$r[mis_id]'";
				$res1=mysql_query($qry);
				$result=mysql_fetch_array($res1);
				$s=$result[mis_name];
				echo $s?> &nbsp;
             </td>

			<td>
				<?php
				$qry="SELECT * FROM mis_items WHERE mis_id='$r[mis_id]'";
				$res1=mysql_query($qry);
				$result=mysql_fetch_array($res1);
				$s=$result[sold_by];
				$qry="SELECT * FROM customer WHERE cust_id='$s'";
				$res1=mysql_query($qry);
				$result=mysql_fetch_array($res1);
				$s=$result[username];
				echo $s?> &nbsp;</td>

			<td><?php
				$qry="SELECT * FROM mis_items WHERE mis_id='$r[mis_id]'";
				$res1=mysql_query($qry);
				$result=mysql_fetch_array($res1);
				$s=$result[mis_price];
				echo $s?> &nbsp;</td>

			<td>
				<?php
					$qry="SELECT * FROM mis_items WHERE mis_id='$r[mis_id]'";
					$res1=mysql_query($qry);
					$result=mysql_fetch_array($res1);
					$s=$result[mis_photo];?>
					<img src="images/<?php echo $s;?>.jpg" width="100px" height="100px" alt="Preview Not Available" /> &nbsp;</td>

			<td><input type="submit" name="<?php echo $cart_name?>" id="<?php echo $cart_name?>" value="Buy Item"/></td>

		<?php 
			$count=$count+1;
		?>
		</tr>
<br />
<?php
}
?>
</table>
<span style="display:inline-block; height:40px;"></span>
<?php
	$qry = "SELECT * FROM mis_wishlist";
	$j = mysql_query($qry);
	$i=1;
	while ($r1=mysql_fetch_array($j))
	{
		$btn_name="b"."$i";
	
		if (isset($_POST[$btn_name]))
		{
			$qry2="SELECT * FROM customer WHERE username='$_SESSION[username]'";
			$res2=mysql_query($qry2);
			$result1=mysql_fetch_array($res2);
			$s1=$result1[cust_id];
			
			$qry3="SELECT * FROM mis_items WHERE mis_id='$r1[mis_id]'";
			$res3=mysql_query($qry3);
			$result3=mysql_fetch_array($res3);
			$s=$result3[sold_by];
			
			$qry1="INSERT INTO mail VALUES ('$s1','$s','$r1[mis_id]','')";
			mysql_query($qry1) or die(mysql_error());
		}
		$i=$i+1;
	}
?>

	<table border="2">
		<tr>
			<th><?php echo "Book Name"?> &nbsp;</th>
			<th><?php echo "Sold By"?> &nbsp;</th>
			<th><?php echo "Price"?> &nbsp;</th>	
			<th>Photo</th>
			<th>Request Item</th>
		</tr>
	<?php
	

		$qry="SELECT * FROM book_wishlist WHERE cust_id='$s1'";
		$res=mysql_query($qry);
		$count=1;
		while($r=mysql_fetch_array($res))
		{
			$cart_name="bt"."$count";	
	?>
		<tr>
			<td><?php
				$qry="SELECT * FROM book WHERE book_id='$r[book_id]'";
				$res1=mysql_query($qry);
				$result=mysql_fetch_array($res1);
				$s=$result[book-name];
				echo $s?> &nbsp;
             </td>

			<td>
				<?php
				$qry="SELECT * FROM book WHERE book_id='$r[book_id]'";
				$res1=mysql_query($qry);
				$result=mysql_fetch_array($res1);
				$s=$result[sold_by];
				$qry="SELECT * FROM customer WHERE cust_id='$s'";
				$res1=mysql_query($qry);
				$result=mysql_fetch_array($res1);
				$s=$result[username];
				echo $s?> &nbsp;</td>

			<td><?php
				$qry="SELECT * FROM book WHERE book_id='$r[book_id]'";
				$res1=mysql_query($qry);
				$result=mysql_fetch_array($res1);
				$s=$result[book_price];
				echo $s?> &nbsp;</td>

			<td>
				<?php
					$qry="SELECT * FROM book WHERE book_id='$r[book_id]'";
					$res1=mysql_query($qry);
					$result=mysql_fetch_array($res1);
					$s=$result[book_photo];?>
					<img src="images/<?php echo $s;?>.jpg" width="100px" height="100px" alt="Preview Not Available" /> &nbsp;</td>

			<td><input type="submit" name="<?php echo $cart_name?>" id="<?php echo $cart_name?>" value="Buy Book"/></td>

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
	$qry = "SELECT * FROM book_wishlist";
	$j = mysql_query($qry);
	$i=1;
	while ($r1=mysql_fetch_array($j))
	{
		$btn_name="bt"."$i";

		if (isset($_POST[$btn_name]))
		{
			$qry2="SELECT * FROM customer WHERE username='$_SESSION[username]'";
			$res2=mysql_query($qry2);
			$result1=mysql_fetch_array($res2);
			$s1=$result1[cust_id];
			
			$qry3="SELECT * FROM book WHERE book_id='$r1[book_id]'";
			$res3=mysql_query($qry3);
			$result3=mysql_fetch_array($res3);
			$s=$result3[sold_by];
			
			$qry1="INSERT INTO mail VALUES ('$s1','$s','$r1[book_id]','')";
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