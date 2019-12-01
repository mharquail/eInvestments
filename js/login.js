function Login(){
	var postData = {
		"loginUsername": document.getElementById("loginUsername").value,
		"loginPassword" : document.getElementById("loginPassword").value
	};
	$.post("php/login.php",postData,function(data,status){
		console.log("Data: " + data + "\nStatus: " + status);
		if (data == "success"){
			window.location.replace("./homepage.html")
		}
		else if(data == "Password Incorrect"){
			console.log("Error handling");
		}
		else{
			console.log("Something went wrong");
		}

	});
}