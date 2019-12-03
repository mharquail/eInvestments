<?php

/*
SYST45713
Group: C
Marc Harquail - 991399450
Dallas Cruz - 991416380

Website Login Functionality
*/

$servername = "142.55.32.48";
$username = "harquaim_php";
$password = "t@Hu%=;aa_uj";
$dbname = "harquaim_investments";

$dbconnect = mysqli_connect($servername,
							$username,
							$password,
							$dbname);
							
						
if($dbconnect)
{
	//echo "Connection was granted";
}
else
{
	die("Connection has failed: ".mysqli_connect_error());
}

$loginValid;						
$email = $_POST['loginUsername'];
$unhashedPassword = $_POST['loginPassword'];

$splitUser = str_split($email);
$arrSize = count($splitUser);
$unhashedPassword = $unhashedPassword.$splitUser[0].$splitUser[$arrSize-1];						
							
$sql = "SELECT email, password FROM csr WHERE csr.email = '$email'";							

$result = $dbconnect->query($sql);

if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$email = $row["email"];
		$assessmentHash = $row["password"];
	}
	if(password_verify($unhashedPassword, $assessmentHash)){
		echo "success";
	}
	else{
		echo "Username or Password Incorrect!";
	}
}
else if ($result->num_rows > 1){
	echo "More than one user has this username!";
}
else{
	echo "Username or Password Incorrect!";
}
?>