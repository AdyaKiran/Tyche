<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Browse Books</title>
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
<form id="form1" name="form1" method="post" action="browse_book.php" enctype="multipart/form-data">
<span style="display:inline-block; height:40px;"></span>
Filter <select name="filter" id="filter">
<option>None</option>
<option>Title</option>
<option>Author</option>
<option>Publication</option>
</select>
<span style="display:inline-block; width:60px;"></span>
Keyword <input type="text" name="key1" id="key1" />
<span style="display:inline-block; width:20px;"></span>
Sort <select name="sort" id="sort">
<option>None</option>
<option>Alphabetical</option>
<option>Price</option>
</select>
<span style="display:inline-block; width:20px;"></span>
<input type="submit" name="filter_btn" id="filter_btn" value="Go" />
<table border="2">
<tr>
<th><?php echo "Book Name"?> &nbsp;</th>
<th><?php echo "Sold By"?> &nbsp;</th>
<th><?php echo "Author"?> &nbsp;</th>
<th><?php echo "Price"?> &nbsp;</th>	
<th><?php echo "Edition"?> &nbsp;</th>
<th><?php echo "Publication"?> &nbsp;</th>
<th><?php echo "Photo"?> &nbsp; </th>
<th>Request Item</th>
<th>Wishlist</th>
</tr>
<?php
include("connection.php");

	if (isset($_POST[filter_btn]))
	{
		$filter=$_POST[filter];
		$key=$_POST[key1];
		$sorting=$_POST[sort];
		
		if ($sorting=="None")
			$add="";
		else if ($sorting=="Alphabetical")
			$add=" ORDER BY book_name";
		else if ($sorting=="Price")
			$add=" ORDER BY book_price";
		
		if($filter=="None" || $key=="")
			$qry="SELECT * FROM book".$add;
		else if($filter=="Title")
			$qry="SELECT * FROM book WHERE book_name='$key'".$add;
		else if ($filter=="Author")
			$qry="SELECT * FROM book WHERE book_author='$key'".$add;	
		else if ($filter=="Publication")
			$qry="SELECT * FROM book WHERE book_pub='$key'".$add;
	}
	else
	{
		$qry="SELECT * FROM book";
	}
	
	$res=mysql_query($qry);
	$count=1; 
	while($r=mysql_fetch_array($res))
	{
		$cart_name="b"."$count";
		$wish_name="bt"."$count";	
?> 
<tr>
	<td><?php echo $r[book_name]?> &nbsp;</td>
	<td>
	<?php
		$qry="SELECT * FROM customer WHERE cust_id='$r[sold_by]'";
		$res1=mysql_query($qry);
		$result=mysql_fetch_array($res1);
		$s=$result[username];
		$_COOKIE['key']=$s;
		?><a href="view_profile.php?key=<?php echo $s?>"><font color="#FF0099"><?php echo $s?></font> &nbsp;</a>
	</td>
	<td><?php echo $r[book_author]?> &nbsp;</td>
	<td><?php echo $r[book_price]?> &nbsp;</td>	
	<td><?php echo $r[book_edition]?> &nbsp;</td>
	<td><?php echo $r[book_pub]?> &nbsp;</td>
	<td><img src="images/<?php echo $r[book_photo]?>.jpg" width="100px" height="100px" alt="Preview Not Available" /> &nbsp;</td>
	<td><input type="submit" name="<?php echo $cart_name?>" id="<?php echo $cart_name?>" value="Buy Book"/></td>
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
	$qry = "SELECT * FROM book";
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
			$qry1 = "INSERT INTO book_wishlist(book_id, cust_id) VALUES ('$r1[book_id]','$s5')";
			mysql_query($qry1) or die(mysql_error());
		}
		if (isset($_POST[$btn2]))
		{
			$qry2="SELECT * FROM customer WHERE username='$_SESSION[username]'";
			$res2=mysql_query($qry2);
			$result1=mysql_fetch_array($res2);
			$s1=$result1[cust_id];
			
			$qry1="INSERT INTO mail VALUES ('$s1','$r1[sold_by]','$r1[book_id]')";
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