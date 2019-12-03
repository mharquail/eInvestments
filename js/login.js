/*
SYST45713
Group: C
Marc Harquail - 991399450
Dallas Cruz - 991416380
Kevin Baumgartner - 991396870

Website Login Functionality
*/

document.onkeypress = function(event){
	if(event.keyCode == 13){
		Login();
	}
}

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