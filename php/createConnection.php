<?php

$clientId = $_POST['clientID'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$birthDate= $_POST['dateOfBirth'];
$address = $_POST['address'];
$city = $_POST['city'];
$postalCode = $_POST['postalCode'];
$phoneNum = $_POST['phone'];
	
$servername = "142.55.32.48";
$username = "harquaim_php";
$password = "t@Hu%=;aa_uj";
$dbname = "harquaim_investments";



//create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

//insert data
$sql= "INSERT INTO client (clientId,firstName,lastName,dateOfBirth,address,city,postalCode,phone) VALUES ('$clientId','$firstName','$lastName','$birthDate','$address','$city','$postalCode','$phoneNum')";

if(mysqli_query ($conn, $sql)){

	echo '<script type="text/javascript">alert("New record successfully inserted");</script>';
}

header("refresh:1; url=create.html");

?>