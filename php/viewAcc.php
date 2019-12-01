<?php

$clientId = $_POST['clientId'];

$servername = "142.55.32.48";
$username = "harquaim_php";
$password = "t@Hu%=;aa_uj";
$dbname = "harquaim_investments";



//create connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

//select data
$sql = "SELECT accountId, accountType, balance FROM investmentAccount WHERE investmentAccount.customerId = '$clientId'";							

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$num = $result->num_rows;
	$output = "<tr>
	<th > Account ID </th>
	<th > Account Type </th>
	<th > Balance</th>
	</tr>";
	while($row = $result->fetch_assoc()){
		$output .= "<tr>
				<th id='id'> ".$row['accountId']." </th>
				<th id='accType'> ".$row['accountType']." </th>
				<th id='balance'> $".$row['balance']." </th>
			</tr>";
	}
	echo $output;
}
else{
	echo "0";
}

?>