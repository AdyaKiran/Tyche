<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="style1.css" >
<link rel="stylesheet" type="text/css" href="style2.css" >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Browse edocs</title>
</head>
<body>
<div class=body_image>
	<div class=body_title>
	<h1><center>TYCHE</center></h1>
    <h3>Strike A Fortune!</h3> 
<h3><i>Best Resources at Zero Price!!</i></h3>
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
<form id="form1" name="form1" method="post" action="browse_edoc.php">
<span style="display:inline-block; height:40px;"></span>
Filter <select name="filter" id="filter">
<option>None</option>
<option>eDoc Title</option>
<option>Author</option>
</select>
<span style="display:inline-block; width:80px;"></span>
Keyword <input type="text" name="key1" id="key1" />
<span style="display:inline-block; width:20px;"></span>
<input type="submit" name="filter_btn" id="filter_btn" value="Go" />


<table border="2">
<tr>
<th><?php echo "Edoc Name"?> &nbsp;</th>
<th><?php echo "Size"?> &nbsp;</th>
<th><?php echo "Author"?> &nbsp;</th>	
<th><?php echo "Edition"?> &nbsp;</th>
<th>Link to eDoc</th>

</tr>
<?php
include("connection.php");

if (isset($_POST[filter_btn]))
	{
		$filter=$_POST[filter];
		$key=$_POST[key1];
		if($filter=="None" || $key=="")
			$qry="SELECT * FROM e_doc";
		else if($filter=="eDoc Title")
			$qry="SELECT * FROM e_doc WHERE edoc_name='$key'";
		else if ($filter="Author")
			$qry="SELECT * FROM e_doc WHERE edoc_author='$key'";	
	}
	else
	{
		$qry="SELECT * FROM e_doc";
	}

$res=mysql_query($qry);
while($r=mysql_fetch_array($res))
{?>
<tr>
<td><?php echo $r[edoc_name]?> &nbsp;</td>
<td><?php echo $r[edoc_size]?> &nbsp;</td>
<td><?php echo $r[edoc_author]?> &nbsp;</td>
<td><?php echo $r[edoc_edition]?> &nbsp;</td>
<td><a href="<?php echo $r[edoc_link]?>"> CLICK HERE </a> &nbsp;</td>
</tr>
<br />
<?php
}
?>
</table>
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