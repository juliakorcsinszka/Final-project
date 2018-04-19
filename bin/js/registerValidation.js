
function registerValidation(email, name, password, secondPwd){

	

	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var letters = /^[A-Z a-z]+$/;
	var minLength = 6;
	var maxLength = 40;
	var existsEmail = 0;

	var emailError = "* You have entered an invalid email\n"; //
	var pwdLengthError = "* Password has to be between 6 and 40 characters long\n";//
	var nameError = "* You have entered an invalid name\n";//
	var longInputError = "* Your name or email is too long (max 40 characters)\n";//
	var emailExists = "* This account already exists\n";//
	var pwdError = "* The two passwords do not match\n"; //
	var notAllInfo = "* All fields must be completed\n"; //
	var terms = "* You must agree to terms and conditions\n";//

	var errorString = "";

	if(email.value.length == 0 || name.value.length == 0 || password.value.length == 0 || secondPwd.value.length == 0 ){
		errorString = errorString + notAllInfo;
	}

	if(!(password.value.match(secondPwd.value))){
		errorString = errorString + pwdError;
	}

	if(!(email.value.match(mailformat))){
		errorString = errorString + emailError;
	}

	if(!(name.value.match(letters))){
		errorString = errorString + nameError;
	}

	if(password.value.length < minLength || password.value.length > maxLength){
		errorString = errorString + pwdLengthError;
	}
	if (email.value.length > maxLength || name.value.length > maxLength){
		errorString = errorString + longInputError;
	}
	if(document.getElementById("checkbox").checked == false){
		errorString = errorString + terms;
	}

	if (errorString.length > 0) {
		alert(errorString);
	}
				   		
	

	
}	


function termsAlert(){
	var alertString = "This project was designed and implemented by a university student.\nLeave your details with caution.";
	alert(alertString);
}


	
