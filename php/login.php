<?php

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
$uN = $_POST['loginUsername'];
$pW = $_POST['loginPassword'];							
							
$sql = "SELECT * FROM csr WHERE csr.email = '$uN' AND   csr.password = '$pW' ";							

$result = $dbconnect->query($sql);

if ($result->num_rows > 0) {
  echo "success";
}
else{
  echo "Password Incorrect";
}
/*if (is(get($uN, "value")) && eq(get($pW, "value"), $check)) {
  if (eq(get($pW, "value"), " ")) {
    echo "success";
  } else {
    call_method($window, "print", "Username or password is incorrect");
    echo "Password incorrect";
  }

} else if (eq(get($uN, "value"), Object::$null)) {
  call_method($window, "print", "Username does not exist");
  $loginValid = false;
} else {
  call_method($window, "print", "Please enter a username");
  $loginValid = false;
}*/
?>