<?php

$accountID = $_POST['accountID'];
$accountType = $_POST['accountType'];
$accountClass = $_POST['accountClass'];
$clientID = $_POST['clientId'];
	
$servername = "142.55.32.48";
$username = "harquaim_php";
$password = "t@Hu%=;aa_uj";
$dbname = "harquaim_investments";



//create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

//insert data
$sql= "INSERT INTO investmentAccount (accountId,accountType,accountClass,balance,customerId) VALUES ('$accountID','$accountType','$accountClass', 0 ,'$clientID')";

if(mysqli_query ($conn, $sql)){

	header("refresh:1; url=http://harquaim.dev.fast.sheridanc.on.ca/eInvestments/homepage.html");
	echo '<script type="text/javascript">alert("New record successfully inserted");</script>';
}
else{
	echo("Error description: " . mysqli_error($conn));
}

?>