
function loginValidation(email, password){

	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var minLength = 6;
	var maxLength = 40;

	var emailError = "* You have entered an invalid email\n"; //
	var pwdError = "* The password is invalid\n"; //
	var notAllInfo = "* All fields must be completed\n"; //

	var errorString = "";

	if(email.value.length == 0 || password.value.length == 0){
		errorString = errorString + notAllInfo;
	}

	if(!(email.value.match(mailformat)) || email.value.length > maxLength ){
		errorString = errorString + emailError;
	}

	if(password.value.length < minLength || password.value.length > maxLength){
		errorString = errorString + pwdError;
	}

	if (errorString.length > 0) {
		alert(errorString);
	}

	
}	



	
