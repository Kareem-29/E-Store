<?php
$host ="localhost";
$user = "root";
$psd = "";
$db = "store";

$con = mysqli_connect($host,$user,$psd,$db);

if(mysqli_connect_errno())
{
	exit();
}
?>