function validatePass(){
	var firstpass = document.forms["register"]["pass"].value;
	var secondpass = document.forms["register"]["pass2"].value;
	if(first != second) {
		document.getElementById("register").pass.style.color = "red";
		document.getElementById("register").pass2.style.color = "red";
		document.getElementById("wrongpass").innerHTML = "Passwords do not match. Try again";
	} else {
		document.getElementById("register").pass.style.color = "black";
		document.getElementById("register").pass2.style.color = "black";
		document.getElementById("wrongpass").innerHTML = "";
	}
}

function validateEmail(){
	var email = document.forms["register"]["email"].value;
	var at = email.indexOf("@");
	var dot = email.lastIndexOf(".");
	if (at < 1 || dot == -1 || at > dot ){
		document.getElementById("register").email.style.color="red";
		document.getElementById("wrongemail").innerHTML = "E-mail is not correct, please check.";
	} else {
		document.getElementById("register").email.style.color = "black";
		document.getElementById("wrongemail").innerHTML = "";	
		}
}