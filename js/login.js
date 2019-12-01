function Login(){
	var postData = {
		"loginUsername": document.getElementById("loginUsername").value,
		"loginPassword" : document.getElementById("loginPassword").value
	};
	$.post("php/login.php",postData,function(data,status){
		console.log("Connection Status: " + status + "\nData: " + data);
		if (data == "success"){
			window.location.replace("./homepage.html")
		}
		else{
			alert(data);
		}

	});
}