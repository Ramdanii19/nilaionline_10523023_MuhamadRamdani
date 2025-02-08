<!DOCTYPE html>

<!-- Developed by Websquare Indonesia -->

<!--[if lt IE 7 ]> <html class="no-js ie6 ie" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7 ie" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8 ie" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>

<title>.: Sistem Informasi Nilai Online - Universitas Komputer Indonesia :.</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<link rel="shortcut icon" type="image/x-icon" href="../images/logoicon.ico" />
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:regular,bold' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Kreon:light,regular' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" type="text/css" href="../css/style-sheet.css" />
<!-- <link rel="stylesheet" type="text/css" href="css/style-sheet2.css" />-->
<link rel="stylesheet" type="text/css" href="../css/nivo-slider.css" />
</head>

<body onLoad="initialize()">
	<header>
    <section class="logo"><a href="#"><img src="../images/logo.png" /></a></section>
	<section class="title">Sistem Informasi Nilai Online <br /> <span>POLITEKNIK POS BANDUNG</span></section>
	<section class="clr"><center>Jl.Sariasih No.54, Sarijadi, Sukasari, Kota Bandung, Jawa Barat 40151</center></section>
	</header>

<section id="navigator">
    <ul class="menus">
        <li><a href="./?adm=home">Home</a></li>
        <li><a href="./?adm=mahasiswa">Mahasiswa</a></li>
        <li><a href="#">Dosen</a></li>
        <li><a href="#">Nilai</a></li>
        <li><a href="#">Logout</a></li>
    </ul>
</section>

<section id="container">
<br><br><br>
<?php
if(empty($_GET)){
	include ("home.php");
}else{
	if($_GET["adm"]=="home"){
		include ("home.php");
	}elseif($_GET["adm"]=="mahasiswa"){
		include ("mahasiswaView.php");
	}elseif($_GET["adm"]=="mahasiswaAdd"){
		include ("mahasiswaAdd.php");
	}
}
?>
<br><br><br><br><br><br>
    <section class="clr"></section>
</section>

<footer>
	<font color=#000> Copyright &copy; 2023 - Universitas Komputer Indonesia <br />
    Developed By <a href="#" target="_new">YourName</a> </font>
</footer>

</body>

</html>