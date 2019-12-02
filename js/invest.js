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
	var selAccount = accountId.options[accountId.selectedIndex].id;
	console.log(selAccount);
	var radios = document.getElementsByName("investmentType");
	var investmentId = Math.floor(10000000 + Math.random() * 90000000);
	var selRadio = $("input[name='investmentType']:checked").val();
	var postData = {
		"investmentId": investmentId,
		"clientId": document.getElementById("accountID").value,
		"accountId": selAccount,
		"invAmount": document.getElementById("invAmount").value,
		"investmentType": selRadio
	};
	$.post("php/invest.php",postData,function(data,status){
		console.log("Connection Status: " + status + "\nData: " + data);
		if (data == "success"){
			alert("Investment has been made.\nThank you.");
		}
		else if(data == "0"){
			alert("An error occured\nPlease try again.");
		}
		else{
			alert(data);
		}

	});
}