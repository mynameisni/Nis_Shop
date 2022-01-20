// const form = document.getElementById('form');
// const name = document.getElementById('name');
// const subject = document.getElementById('subject');
// const email = document.getElementById('email');
// const phone = document.getElementById('phone');
// const message = document.getElementById('message');

// form.addEventListener('submit', e => {
// 	e.preventDefault();
	
// 	checkInputs();
// });

// function checkInputs() {
// 	// trim to remove the whitespaces
// 	const nameValue = name.value.trim();
// 	const subjectValue = subject.value.trim();
// 	const emailValue = email.value.trim();
// 	const phoneValue = phone.value.trim();
// 	const messageValue = message.value.trim();
	
// 	if(nameValue === '') {
// 		setErrorFor(name, 'Name cannot be empty.');
// 	} else {
// 		setSuccessFor(name);
// 	}

// 	if(subjectValue === '') {
// 		setErrorFor(subject, 'Subject cannot be empty.');
// 	} else {
// 		setSuccessFor(subject);
// 	}
	
// 	if(emailValue === '') {
// 		setErrorFor(email, 'Email cannot be empty.');
// 	} else if (!isEmail(emailValue)) {
// 		setErrorFor(email, 'Not a valid email');
// 	} else {
// 		setSuccessFor(email);
// 	}
	
// 	if(phoneValue === '') {
// 		setErrorFor(phone, 'Phone number cannot be empty.');
// 	} else {
// 		setSuccessFor(phone);
// 	}
	
// 	if(messageValue === '') {
// 		setErrorFor(message, 'Message cannot be empty.');
// 	} else{
// 		setSuccessFor(message);
// 	}
// }

// function setErrorFor(input, message) {
// 	const formGroup = input.parentElement;
// 	const small = formGroup.querySelector('small');
// 	formGroup.className = 'form-group error';
// 	small.innerText = message;
// }

// function setSuccessFor(input) {
// 	const formGroup = input.parentElement;
// 	formGroup.className = 'form-group success';
// }
	
// function isEmail(email) {
// 	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
// }

function sendEmail(){
	var name = $("#name");
	var email = $("#email");
	var subject = $("#subject");
	var message = $("#message");

	if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(message)){
		$.ajax({
			url: "sendEmail.php";
			method: "POST";
			dataType: "json";
			data: {
				name: name.val(),
				email: email.val();
				subject: subject.val();
				message: message.val();
			}, success: function(response){
				console.log(response);
			}
		});
	}
}
function isNotEmpty(caller) {
	if(caller.val() == "") {
		caller.css("border","1px solid red");
		return false;
	} else {
		caller.css("border", "");
		return true;
	}
}