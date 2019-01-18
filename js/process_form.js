/*  Ben Schritchfield
	ECOMMERCE SITE ACCOUNT CREATE VALIDATION */


function checkTextField(field) {
  document.getElementById("error").innerText = (field.value === "") ? "Field is empty." : "Field is filled.";
}

var complete = 0; //count the number of complete field items, default 0

//FORM VALIDATION FUNCTION========================================================================
function validateUser() {

	var checkDiv = document.getElementById('checkimg');
	var statusImg = document.createElement('img');
	var userHint = document.getElementById('userHint');
	var usernameREG =    /^[\w{.,'}+:?®©-]+$/; //no special chars
	var usertext = username.value; 	  //get username text field's value

	//CHECK USERNAME FIELD======================================================================
	if(usertext.value != ""){ //if there is something in the field:

		while(checkDiv.firstChild){ //Clear existing images loop
    		checkDiv.removeChild(checkDiv.firstChild);
		}

		if(usertext.match(usernameREG)){ //if it matches the format:
			statusImg.setAttribute('src','img/check.png'); //set check pic
			userHint.style.display = "none"; //hides hint text
			complete++;
		}

		else{ //if it does not: 
			statusImg.setAttribute('src','img/xmark.png'); //sets the x pic
			userHint.style.display = "inline-block"; //shows hint text
		}
		checkDiv.appendChild(statusImg); //add the image to DOM
	}

	return complete; //returns the number of complete items
}


//FORM VALIDATION FUNCTION========================================================================
function validateVerify() {

	var checkDiv3 = document.getElementById('checkimg3');
	var statusImg3 = document.createElement('img');
	var verifyHint = document.getElementById('verifyHint');
	var passwordREG =  /^[\w{.,'}+:?®©-]+$/; //no special chars
	var verifytext = verify.value;	  //get verify pw text field's value
	
	//CHECK verification FIELD=====================================================================
	if(verifytext.value != ""){ //if there is something in the field:

		while(checkDiv3.firstChild){ //Clear existing images loop
    		checkDiv3.removeChild(checkDiv3.firstChild);
		}

		if(verifytext.match(passwordREG)){ //if it matches the format:
			statusImg3.setAttribute('src','img/check.png'); //set check pic
			verifyHint.style.display = "none"; //hides hint text
			complete++;
		}

		else{ //if it does not: 
			statusImg3.setAttribute('src','img/xmark.png'); //sets the x pic
			verifyHint.style.display = "inline-block"; //shows hint text
		}
		checkDiv3.appendChild(statusImg3); //add the image to DOM
	}

return complete; //returns the number of complete items
}

//FORM VALIDATION FUNCTION========================================================================
function validatePass() {

	var checkDiv2 = document.getElementById('checkimg2');
	var statusImg2 = document.createElement('img');
	var passHint = document.getElementById('passHint');
	var passwordREG =  /^[\w{.,'}+:?®©-]+$/; //no special chars
	var passtext = password.value; 	  //get password text field's value

	//CHECK PASSWORD FIELD=======================================================================
	if(passtext.value != ""){ //if there is something in the field:

		while(checkDiv2.firstChild){ //Clear existing images loop
    		checkDiv2.removeChild(checkDiv2.firstChild);
		}

		if(passtext.match(passwordREG)){ //if it matches the format:
			statusImg2.setAttribute('src','img/check.png'); //set check pic
			passHint.style.display = "none"; //hides hint text
			complete++;
		}

		else{ //if it does not: 
			statusImg2.setAttribute('src','img/xmark.png'); //sets the x pic
			passHint.style.display = "inline-block"; //shows hint text
		}
		checkDiv2.appendChild(statusImg2); //add the image to DOM
	}

return complete; //returns the number of complete items
}

//FORM VALIDATION FUNCTION========================================================================
function validatePhone() {

	var checkDiv4 = document.getElementById('checkimg4');
	var statusImg4 = document.createElement('img');
	var phoneHint = document.getElementById('phoneHint');
	var phoneREG =  /^\d{3}-\d{3}-\d{4}$/; //requre XXX-XXX-XXXX format
	var phonetext = phonenum.value;   //get phone number text field's value


	//CHECK PHONE NUMBER FIELD====================================================================
	if(phonetext.value != ""){ //if there is something in the field:

		while(checkDiv4.firstChild){ //Clear existing images loop
    		checkDiv4.removeChild(checkDiv4.firstChild);
		}

		if(phonetext.match(phoneREG)){ //if it matches the format:
			statusImg4.setAttribute('src','img/check.png'); //set check pic
			phoneHint.style.display = "none"; //hides hint text
			complete++;
		}

		else{ //if it does not: 
			statusImg4.setAttribute('src','img/xmark.png'); //sets the x pic
			phoneHint.style.display = "inline-block"; //shows hint text
		}
		checkDiv4.appendChild(statusImg4); //add the image to DOM
	}

return complete; //returns the number of complete items
}

//FORM VALIDATION FUNCTION========================================================================
function validateEmail() {

	var checkDiv5 = document.getElementById('checkimg5');
	var statusImg5 = document.createElement('img');
	var emailHint = document.getElementById('emailHint');
	var emailREG =  /^[^\s@]+@[^\s@]+\.[^\s@]+$/; //require xxx@xxx.xxx format
	var emailtext = emailAdr.value;   //get email text field's value

	//CHECK EMAIL FIELD==========================================================================
	if(emailtext.value != ""){ //if there is something in the field:

		while(checkDiv5.firstChild){ //Clear existing images loop
    		checkDiv5.removeChild(checkDiv5.firstChild);
		}

		if(emailtext.match(emailREG)){ //if it matches the format:
			statusImg5.setAttribute('src','img/check.png'); //set check pic
			emailHint.style.display = "none"; //hides hint text
			complete++;
		}

		else{ //if it does not: 
			statusImg5.setAttribute('src','img/xmark.png'); //sets the x pic
			emailHint.style.display = "inline-block"; //shows hint text
		}
		checkDiv5.appendChild(statusImg5); //add the image to DOM
	}

return complete; //returns the number of complete items
}

//FORM VALIDATION FUNCTION========================================================================
function validateAddress() {

	var checkDiv6 = document.getElementById('checkimg6');
	var statusImg6 = document.createElement('img');
	var addressHint = document.getElementById('addressHint');
	var addressREG =  /[^]*/;//		/^[\w{.,'}+:?®©-]+$/; //no special chars
	var addresstext = address.value;  //get address text field's value

	//CHECK ADDRESS FIELD=========================================================================
	if(addresstext.value != ""){ //if there is something in the field:

			while(checkDiv6.firstChild){ //Clear existing images loop
    		checkDiv6.removeChild(checkDiv6.firstChild);
		}

		if(addresstext.match(addressREG)){ //if it matches the format:
			statusImg6.setAttribute('src','img/check.png'); //set check pic
			addressHint.style.display = "none"; //hides hint text
			complete++;
		}

		else{ //if it does not: 
			statusImg6.setAttribute('src','img/xmark.png'); //sets the x pic
			addressHint.style.display = "inline-block"; //shows hint text
		}
		checkDiv6.appendChild(statusImg6); //add the image to DOM
	}

return complete; //returns the number of complete items
}

//QUESTION VALIDATION FUNCTION===================================================================
function questions() {

	//IF user does not anser all questiona and fields, create error alert------------------------
	if (complete < 5) {
		alert("You must complete all fields and answer all questions.");
	}

	//Prevent refreshing page--------------------------------------------------------------------
	event.preventDefault();
	return false;
}