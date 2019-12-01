function Create(){
	var password = document.getElementById("pass").value;
	var passwordVerify = document.getElementById("passVerify").value;
	if(password == passwordVerify){
		Post();
	}
	else{
		alert("Passwords must match!");
	}
}

function Post(){
	var postData = {
		"csrId": document.getElementById("csrId").value,
		"firstName": document.getElementById("firstName").value,
		"lastName": document.getElementById("lastName").value,
		"email": document.getElementById("email").value,
		"pass" : document.getElementById("pass").value
	};
	$.post("php/create.php",postData,function(data,status){
		console.log("Data: " + data + "\nStatus: " + status);
		if (data == "success"){
			alert("New User has been created");
			window.location.replace("http://harquaim.dev.fast.sheridanc.on.ca/eInvestments");
		}
		else if(data == "Password Incorrect"){
			console.log("Error handling");
		}
		else{
			console.log("Something went wrong");
		}

	});
}