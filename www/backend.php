<?php
header("Content-Type: text/xml; charset=ISO-8859-1");

$MSERVER_PATH="../../home/nicolas/bin/";

$q=$_GET["q"];

if($q==1)
{
	print('<?xml version="1.0" encoding="ISO-8859-1"?>');
	echo "<response>";
	$res = exec("mserver locked");
	echo "<command>";
	if($res=="NO")
		echo "Nothing is running.";
	else
		echo "Currently running: $res";
	echo "</command>";

	$res = exec("mserver status");
	echo "<status>$res</status>\n";
	echo "</response>";
}

if($q==2)
{
	$res = exec("mserver start");
}

if($q==3)
{
	$res = exec("mserver stop");
}

if($q==4)
{
	$res = exec("mserver restart");
}

if($q==5)
{
	$res = exec("mserver backup");
}

if($q==6)
{
	$res = exec("mserver cartography");
}


?>
