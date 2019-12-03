/*
SYST45713
Group: C
Marc Harquail - 991399450

Website View Account Functionality
*/

function viewAcc(){
	var postData = {
		"clientId": document.getElementById("clientID").value
	};
	$.post("php/viewAcc.php",postData,function(data,status){
		console.log("Data: " + data + "\nStatus: " + status);
		if (data == "0"){
		}
		else{
			document.getElementById("viewAccountTable").innerHTML = data;
		}
	});
}