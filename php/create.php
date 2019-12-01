<?php

$csrId = $_POST['csrId'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$unhashedPass = $_POST['pass'];
	
$servername = "142.55.32.48";
$username = "harquaim_php";
$password = "t@Hu%=;aa_uj";
$dbname = "harquaim_investments";

$splitEmail = str_split($email);
$arrSize = count($splitEmail);
$unhashedPass = $unhashedPass.$splitEmail[0].$splitEmail[$arrSize-1];
$hashedPass = password_hash($unhashedPass, PASSWORD_DEFAULT);

//create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

//insert data
$sql= "INSERT INTO csr (csrId,email,password,firstName,lastName) VALUES ('$csrId','$email','$hashedPass','$firstName','$lastName')";

if(mysqli_query ($conn, $sql)){
	echo 'success';
}
else{
	error_log("User not created");
}

?>