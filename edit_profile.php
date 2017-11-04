<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile</title>
<script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="style.css">
<script src="validation.js" ></script>
</head>

<body>
<?php include("connection.php"); ?>
<div class=background_image>
	<div class=background_text>
	<h1><center>TYCHE</center></h1>
    <h3>Strike A Fortune!</h3>
    </div>

<div class=background_text>
<h2><center> Update Details </center></h2>

<p>Please Enter Your Details </p>
<form id="form1" name="form1" method="post" action="" onSubmit="return form_validation();" enctype="multipart/form-data">
  <p>First Name :<span style="display:inline-block; width:100px;"></span>
    <input type="text" name="t1" id="t1" />
  <p>Last Name:  <span style="display:inline-block; width:100px;"></span>   
    <input type="text" name="t2" id="t2" />  
  <p>Date Of Birth: <span style="display:inline-block; width:100px;"></span>  
<select name="s1" id="s1">
  <option>dd</option>
  <option>1</option>
  <option>2</option>
  <option>3</option>
  <option>4</option>
  <option>5</option>
  <option>6</option>
  <option>7</option>
  <option>8</option>
  <option>9</option>
  <option>10</option>
  <option>11</option>
  <option>12</option>
  <option>13</option>
  <option>14</option>
  <option>15</option>
  <option>16</option>
  <option>17</option>
  <option>18</option>
  <option>19</option>
  <option>20</option>
  <option>21</option>
  <option>22</option>
  <option>23</option>
  <option>24</option>
  <option>25</option>
  <option>26</option>
  <option>27</option>
  <option>28</option>
  <option>29</option>
  <option>30</option>
  <option>31</option>
</select>  
    <select name="s2" id="s2">
    <option>mm</option>
   <option>1</option>
   <option>2</option>
   <option>3</option>
   <option>4</option>
   <option>5</option>
   <option>6</option>
   <option>7</option>
   <option>8</option>
   <option>9</option>
   <option>10</option>
   <option>11</option>
   <option>12</option>
    </select>
   <select name="s3" id="s3">
   <option>yyyy</option>
   <option>1980</option> 
   <option>1981</option>
   <option>1982</option>
   <option>1982</option>
   <option>1983</option>
   <option>1984</option>
   <option>1985</option>
   <option>1986</option>
   <option>1987</option>
   <option>1988</option>
   <option>1989</option>
   <option>1990</option>
   <option>1991</option>
   <option>1992</option>
   <option>1993</option>
   <option>1994</option>
   <option>1995</option>
   <option>1996</option>
   <option>1997</option>
   <option>1998</option>
   <option>1999</option>
   <option>2000</option>
   <option>2001</option>
   <option>2002</option>
   <option>2003</option>
   <option>2004</option>
   <option>2005</option>
   <option>2006</option>
 
    </select>
  <p>Room no: <span style="display:inline-block; width:115px;"></span>  
  <input type="text" name="t3" id="t3" />    
  <p>Hostel Block: <span style="display:inline-block; width:90px;"></span>  
  <input type="text" name="t4" id="t4" />    
  <p>City:  <span style="display:inline-block; width:140px;"></span>  
    <input type="text" name="t5" id="t5" />
  <p>State: <span style="display:inline-block; width:135px;"></span>  
  <input type="text" name="t6" id="t6" />    
  <p>Pincode: <span style="display:inline-block; width:115px;"></span>  
  <input type="text" name="t7" id="t7" />
  <p>Course: <span style="display:inline-block; width:120px;"></span>  
    <input type="text" name="t8" id="t8" />
  <p>Branch: <span style="display:inline-block; width:115px;"></span>  
  <input type="text" name="t9" id="t9" />    
  <p>Semester: <span style="display:inline-block; width:210px;"></span>  
    
    <select name="s4" id="s4">
    <option>sem</option>
   <option>1</option>
   <option>2</option>
   <option>3</option>
   <option>4</option>
   <option>5</option>
   <option>6</option>
   <option>7</option>
   <option>8</option>
    
    </select>
  <p>Email Id:<span style="display:inline-block; width:115px;"></span>  
    <input type="text" name="t10" id="t11" />
  <p>Phone no:<span style="display:inline-block; width:110px;"></span>  
    <input type="text" name="t11" id="t11" />
  </p>
  <p>
   <input type="submit" name="b1" id="b1" value="Update" />
   <span style="display:inline-block; width:20px;"></span>  
  </p>
</form>
</div>
<a href="profile.php"><center><font color="#FF0066">BACK</font></center></a>
<?php

	if (isset($_POST[b1]))
	{
		$fn=$_POST[t1];
		$ln=$_POST[t2];
		$dob=$_POST[s3].'-'.$_POST[s2].'-'.$_POST[s1];
		$room=$_POST[t3];
		$hb=$_POST[t4];
		$city=$_POST[t5];
		$state=$_POST[t6];
		$pin=$_POST[t7];
		$course=$_POST[t8];
		$branch=$_POST[t9];
		$sem=$_POST[s4];
		$email=$_POST[t10];
		$phone=$_POST[t11];
		$flag=1;
		
		if(!is_numeric($phone))
		{echo"<script type='text/javascript'>alert('Please enter Valid Phone Number');</script>";
		$flag=0;
		}
		$uname=$_SESSION[username];
		$qry="SELECT * FROM customer WHERE username = '$uname'";
		$result = mysql_query($qry);
		$c_id=mysql_fetch_array($result);
		$cust_id=$c_id[cust_id];
		
		if($flag==1){
		$query = "UPDATE customer SET first_name='$fn' WHERE cust_id='$cust_id'";
		mysql_query($query) or die(mysql_error());
		$query = "UPDATE customer SET last_name='$ln' WHERE cust_id='$cust_id'";
		mysql_query($query) or die(mysql_error());
		$query = "UPDATE customer SET dob='$dob' WHERE cust_id='$cust_id'";
		mysql_query($query) or die(mysql_error());
		$query = "UPDATE customer SET room_no='$room' WHERE cust_id='$cust_id'";
		mysql_query($query) or die(mysql_error());
		$query = "UPDATE customer SET hostel_block='$hb' WHERE cust_id='$cust_id'";
		mysql_query($query) or die(mysql_error());
		$query = "UPDATE customer SET city='$city' WHERE cust_id='$cust_id'";
		mysql_query($query) or die(mysql_error());
		$query = "UPDATE customer SET state='$state' WHERE cust_id='$cust_id'";
		mysql_query($query) or die(mysql_error());
		$query = "UPDATE customer SET pincode='$pin' WHERE cust_id='$cust_id'";
		mysql_query($query) or die(mysql_error());
		$query = "UPDATE customer SET course='$course' WHERE cust_id='$cust_id'";
		mysql_query($query) or die(mysql_error());
		$query = "UPDATE customer SET branch='$branch' WHERE cust_id='$cust_id'";
		mysql_query($query) or die(mysql_error());
		$query = "UPDATE customer SET semester='$sem' WHERE cust_id='$cust_id'";
		mysql_query($query) or die(mysql_error());
		$query = "UPDATE customer SET email='$email' WHERE cust_id='$cust_id'";
		mysql_query($query) or die(mysql_error());
		$query = "UPDATE customer SET phone_no='$phone' WHERE cust_id='$cust_id'";
		mysql_query($query) or die(mysql_error());
		}
		
	}
?>
<div class="user">
<?php
?><b><i><center><?php echo "Hello $_SESSION[username] !";
?></b></i>
<a href="index.php"><font color="#FF0099">Logout</font></a>
</center>
</div>
</div>
<p>&nbsp;</p>

</body>
</html>