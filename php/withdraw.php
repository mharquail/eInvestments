<?php

/*
SYST45713
Group: C
Marc Harquail - 991399450

Website Withdraw Functionality
*/

$clientId = $_POST['clientId'];
$accountId = $_POST['accountId'];
$withAmount = $_POST['withAmount'];

$servername = "142.55.32.48";
$username = "harquaim_php";
$password = "t@Hu%=;aa_uj";
$dbname = "harquaim_investments";

//create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

//select data
$sql= "UPDATE investmentAccount SET balance = (balance - $withAmount) WHERE investmentAccount.accountId = $accountId AND investmentAccount.customerId = $clientId";

$result = $conn->query($sql);

if ($result) {
	echo "success";
}
else{
	echo "Error: ". $conn -> error;
}
?>