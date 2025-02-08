<!DOCTYPE html>

<!-- Developed by Websquare Indonesia -->

<!--[if lt IE 7 ]> <html class="no-js ie6 ie" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7 ie" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>

<title>.: Sistem Informasi Nilai Online - Universitas Komputer Indonesia :.</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="shortcut icon" type="image/x-icon" href="images/logoicon.ico" />
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Kreon:light,regular' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" type="text/css" href="css/style-sheet.css" />
<!-- <link rel="stylesheet" type="text/css" href="css/style-sheet2.css" />-->
<link rel="stylesheet" type="text/css" href="css/nivo-slider.css" />
</head>

<body onLoad="initialize()">
	<header>
    <section class="logo"><a href="#"><img src="images/logo.png" /></a></section>
	<section class="title">Sistem Informasi Nilai Online <br /> <span>UNIVERSITAS KOMPUTER INDONESIA</span></section>
	<section class="clr"><center>l. Dipati Ukur No.112-116, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132</center></section>
	</header>

<section id="container">
			<div>
			<center>
			<section id="navigator">
    <ul class="menus">
      <h2>LOGIN GENERAL</h2>
			
    </ul>
</section>
	<br /><br />		
<?php
include ('koneksi/koneksi.php');
if (!isset($_POST['submit']))
{
?>   
<form enctype="multipart/form-data" method="post" class="form-login">
<table>
	<tr>
    	<td><input type="text" name="username" placeholder="Username" required /></td>
    </tr>
	<tr>
    	<td><input type="password" name="password" placeholder="Password" required /></td>
    </tr>
	<tr>
    	<td><input id="submit" name="submit" type="submit" value="Login"></td>
    </tr>
</table>
</form>
<?php
}
elseif (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['type']))
{
	echo"<script>alert('Please fill out, Username OR Password OR Type correctly!') </script>";
	echo"<script type='text/javascript'>window.location ='./?lb=home'</script>";
}
else
{
	
	$username	= addslashes($_POST['username']);
	$password	= md5($_POST['password']);
	
	include ('koneksi.php');
	//echo"$username, $password, $type";die;
		$query		= "SELECT * FROM administrator WHERE username='$username' AND password='$password'";
	$eksekusi	= mysql_query($query) or die("Query error.");
	$rowCheck	= mysql_num_rows($eksekusi);

	if($rowCheck > 0)
	{
		while($data = mysql_fetch_array($eksekusi))
		{
			$_SESSION['adm'] = $data[0];
			echo "<script type='text/javascript'>window.location ='admin/index.php'</script>";
		}
	}	
	else 
	{
		echo"<script>alert('Invalid Username or Password.')</script>";
		echo"<script type='text/javascript'>window.location ='./?lb=home'</script>";
	}
}
?> 
</center>	</div>
    <section class="clr"></section>
</section>

<footer>
	<font color=#000> Copyright &copy; 2018 - Politeknik Pos BANDUNG <br />
    Developed By <a href="#" target="_new">YourName</a> </font>
</footer>

</body>

</html>