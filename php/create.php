<?php

$csrId = $_POST['csrId'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$pass = $_POST['pass'];
	
$servername = "142.55.32.48";
$username = "harquaim_php";
$password = "t@Hu%=;aa_uj";
$dbname = "harquaim_investments";



//create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

//insert data
$sql= "INSERT INTO csr (csrId,email,password,firstName,lastName) VALUES ('$csrId','$email','$pass','$firstName','$lastName')";

if(mysqli_query ($conn, $sql)){

	header("refresh:1; url=http://harquaim.dev.fast.sheridanc.on.ca/eInvestments/");
	echo '<script type="text/javascript">alert("New record successfully inserted");</script>';
}

?>