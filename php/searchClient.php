<?php

$clientId = $_POST['clientId'];

$servername = "142.55.32.48";
$username = "harquaim_php";
$password = "t@Hu%=;aa_uj";
$dbname = "harquaim_investments";

//create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

//select data
$sql = "SELECT accountId, balance FROM investmentAccount WHERE investmentAccount.customerId = '$clientId'";							

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$num = $result->num_rows;
	$output = "<option id='defaultAcc' selected='selected'>Account -- Balance</option>";
	while($row = $result->fetch_assoc()){
		$output .= "<option id='".$row['accountId']."'>".$row['accountId']." -- ".$row['balance']."</option>";
	}
	echo $output;
}
else{
	echo "0";
}
?>