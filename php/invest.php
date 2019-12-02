<?php

$investmentId = $_POST['investmentId'];
$clientId = $_POST['clientId'];
$accountId = $_POST['accountId'];
$invAmount = $_POST['invAmount'];
$investmentType = $_POST['investmentType'];

$servername = "142.55.32.48";
$username = "harquaim_php";
$password = "t@Hu%=;aa_uj";
$dbname = "harquaim_investments";

//create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);


$sql = "SELECT accountType FROM investmentAccount WHERE investmentAccount.customerId = '$clientId' AND investmentAccount.accountId = '$accountId'";

$result = $conn->query($sql);
//Check to make sure correct investment is being made with corresponding account
//	- Saving can only be purchased from RSP or GIA
//	- GIC can only by purchased by RSP
//	- Mutual funds can be purchased by any account
//$investmentType -> 1 = GIC, 2 = Savings, 3 = Mutual Funds
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()){
		if($investmentType == 1){
			if($row['accountType'] == 'RSP'){
				makeInvestment($conn);
			}
			else{
				echo "GIC investment cannot be purchased for this type of account.";
			}
		}
		else if($investmentType == 2){
			if($row['accountType'] == 'RSP' || $row['accountType'] == 'GIA'){
				echo $row['accountType'];
				//makeInvestment($conn);
			}
			else{
				echo "Savings investment cannot be purchased for this type of account.";
			}
		}
		else if($investmentType == 3){
			makeInvestment($conn);
		}
	}
}

function makeInvestment($conn){
	global $investmentId,$clientId, $accountId, $invAmount, $investmentType;
	//select data
	$sql= "INSERT INTO investments (investmentId,accountId,clientId,investmentType,investmentAmount) VALUES ('$investmentId','$accountId','$clientId','$investmentType','$invAmount')";			

	$result2 = $conn->query($sql);

	if ($result2) {
		echo "success";
	}
	else{
		echo "Error: ". $conn -> error;
	}
}

?>