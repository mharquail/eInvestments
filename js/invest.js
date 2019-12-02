//Function that will look for corresponding investment accounts
//for provided client id
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

function invest(){
	var accountId = document.getElementById("account");
	var selAccount = accountId.options[accountId.selectedIndex].value;
	var postData = {
		"clientId": document.getElementById("accountID").value,
		"accountId": selAccount,
		"invAmount": document.getElementById("invAmount").value
	};
	$.post("php/invest.php",postData,function(data,status){
		console.log("Connection Status: " + status + "\nData: " + data);
		if (data == "success"){
			alert("Investment has been made.\nThank you.");
		}
		else{
			alert("An error occured\nPlease try again.");
		}

	});
}