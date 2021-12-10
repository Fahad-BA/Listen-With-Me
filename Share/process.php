<?php
include '../config.php';
$Name=$_REQUEST['Name'];
$YouTube=$_REQUEST['YouTube'];
$Soundcloud=$_REQUEST['Soundcloud']; 
if ($YouTube == NULL && $Soundcloud == NULL){
include 'no-song.php';
}
elseif ($YouTube == !NULL && $Soundcloud == !NULL) {
include 'one-song.php';
}
else {
$sql = "INSERT INTO `visitors` (`ID`, `Name`, `Date`, `YouTube`, `Soundcloud`) VALUES (NULL, '$Name', Now(), '$YouTube', '$Soundcloud')";

if ($mysqli->query($sql) === TRUE) { ?>
<!DOCTYPE html>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
<html lang="ar">
<head itemscope="" itemtype="http://schema.org/WebSite">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>#أغنية_اليوم</title>
	<meta content="IE=edge" http-equiv="X-UA-Compatible" />
	<meta content="widtd=device-widtd, initial-scale=1" name="viewport" />
	<title itemprop="name"></title>
	<!-- Bootstrap Core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet" /><!-- Custom CSS -->
	<link href="../css/landing-page.css" rel="stylesheet" /><!-- Custom Fonts -->
	<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
</head>
<header class="intro-header">
<body dir="rtl"><center>
<div class="intro-header">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="intro-message">
<img src="../img/logo.png"/>
<h3 id="hdrDescription">Thank you :)</h3>
<a href="../" class="email-address">My Songs</a> | <a class ="email-address" href="http://songs.fhidan.com/Share/visitors.php">Your Songs</a> | <a class="email-address" href="http://songs.fhidan.com/Share">Post a song.</a>
<hr class="intro-social" />
<center><?php
include "addsongtable.php";
}	else {
		echo("Error : " . $sql . "<br>" . $mysqli->error);
	}
	$mysqli->close();
}
?>
