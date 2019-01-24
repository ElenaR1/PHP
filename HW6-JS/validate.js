function validate() {
    var user = document.getElementById('username');
    var pass = document.getElementById('pass');
    var repeated_password = document.getElementById('rep_pass');
	
    if (user.value.length < 3 || user.value.length > 10) {
       document.getElementById("div1").innerHTML="Потребителското име трябва да е поне 3 символа и не повече от 10";
	   document.getElementById("div1").style.color="Red";
       return false;
    }
	if (!checkInput(user.value)) {
        document.getElementById("div1").innerHTML="НЕВАЛИДЕН ВХОД! Потребителското име трябва да съдържа единствено букви, цифри и _";
		document.getElementById("div1").style.color="Red";
        return false;
    }
    
    if (pass.value.length < 6) {
        document.getElementById("div1").innerHTML="Паролата трябва да е поне 6 символа";
		document.getElementById("div1").style.color="Red";
        return false;
    }
	if(!hasLowerCase(pass.value) || !hasUpperCase(pass.value) || !hasDigit(pass.value)){
		document.getElementById("div1").innerHTML="Паролата трябва да има поне една главна буква, поне една малка буква и поне една цифра";
		document.getElementById("div1").style.color="Red";
		return false;
	}
	if(repeated_password.value !== pass.value){
		document.getElementById("div1").innerHTML="Повторете паролата";
		document.getElementById("div1").style.color="Red";
		return false;
	}
     
    return true;
}

function checkInput(str) {
    
    
    for (var i = 0; i < str.length; i++) {
		var el=str.charAt(i);
        if (!(isNum(el) || (el >= 'A' && el <= 'Z') || (el >= 'a' && el <= 'z') || el=='_')) {
            return false;
        }
    }
    
    return true;
}

function hasLowerCase(str) {
    return (/[a-z]/.test(str));
}
function hasUpperCase(str) {
    return (/[A-Z]/.test(str));
}
function hasDigit(str) {
    return (/[0-9]/.test(str));
}

function isNum(ch){
		if ('0123456789'.indexOf(ch) !== -1) {
			return true;
		}
		return false;
	}
