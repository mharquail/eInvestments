function searchAccount(){
	//Send over the client ID
	var postData = {
		"clientId": document.getElementById("accountId").value
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
			document.getElementById("confirmHeader").style.display = "initial";
			document.getElementById("verify").style.display = "initial";
			document.getElementById("closeButton").style.display = "initial";
		}

	});
}

function verifyDelete(){
	var verifyPhrase = document.getElementById("verify");
	var accountId = document.getElementById("account");
	var selAccount = accountId.options[accountId.selectedIndex].id;
	if(selAccount == "defaultAcc"){
		alert("Please select an investment account to delete");
	}
	else{
		if(verifyPhrase.value == verifyPhrase.placeholder){
			closeAccount();
		}
		else{
			alert("Verification Phrase Incorrect");
			verifyPhrase.value = "";
		}
	}
}

function closeAccount(){
	var accountId = document.getElementById("account");
	var selAccount = accountId.options[accountId.selectedIndex].id;
	var postData = {
		"clientId": document.getElementById("accountId").value,
		"accountId": selAccount
	};
	$.post("php/close.php",postData,function(data,status){
		console.log("Connection Status: " + status + "\nData: " + data);
		if (data == "success"){
			alert("Account has been closed.\nThank you.");
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