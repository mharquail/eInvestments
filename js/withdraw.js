/*
SYST45713
Group: C
Marc Harquail - 991399450

Website Withdraw Functionality
*/

function searchAccount(){
	//Send over the client ID
	var postData = {
		"clientId": document.getElementById("accountID").value
	};
	//Post to PHP page
	$.post("php/searchClient.php",postData,function(data,status){
		//Log status and return value
		console.log("Connection Status: " + status + "\nData: " + data);
		//
		if (data == 0){
			alert("Client Account does not exist!");
		}
		else{
			var accountDropdown = document.getElementById('account');
			accountDropdown.disabled = false
			accountDropdown.innerHTML = data;
		}

	});
}

function withdraw(){
	var accountId = document.getElementById("account");
	var selAccount = accountId.options[accountId.selectedIndex].id;
	var postData = {
		"clientId": document.getElementById("accountID").value,
		"accountId": selAccount,
		"withAmount": document.getElementById("withAmount").value
	};
	$.post("php/withdraw.php",postData,function(data,status){
		console.log("Connection Status: " + status + "\nData: " + data);
		if (data == "success"){
			alert("Withdrawal has been made.\nThank you.");
			window.location.replace("./homepage.html");
		}
		else if(data == "0"){
			alert("An error occured\nPlease try again.");
		}
		else{
			alert(data);
		}

	});
}