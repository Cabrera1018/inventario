function validar (){
	var names, email, phone, mensaje;
	names = document.getElementById("names").value;
	email = document.getElementById("email").value;
	phone = document.getElementById("phone").value;
	mensaje = document.getElementById("mensaje").value;

	expresion = /\w+@\w+\.+[a-z]/;

	if(names === "" || email === "" || phone === "" || mensaje === ""){
		Swal.fire({
  		type: 'error',
  		title: 'Oops...',
  		text: 'Campos obligatorios', 
  		// footer: '<a href>Why do I have this issue?</a>'
	})
		return false;
 	}
 	else if(names.length>30){
 		Swal.fire({
  		type: 'error',
  		title: 'Oops...',
  		text: 'Máximo 30 carácteres', 
  		// footer: '<a href>Why do I have this issue?</a>'
	})
 		return false;
 	}
 	else if(!expresion.test(email)){
 		Swal.fire({
  		type: 'warning',
  		title: 'Oops...',
  		text: 'Invalid email', 
  		// footer: '<a href>Why do I have this issue?</a>'
	})
 		return false;
 	}
 	else if(email.length>100){
 		Swal.fire({
  		type: 'error',
  		title: 'Oops...',
  		text: 'Max 100 characters', 
  		// footer: '<a href>Why do I have this issue?</a>'
	})
 		return false;
 	}
 	else if(phone.length>10){
 		Swal.fire({
  		type: 'error',
  		title: 'Oops...',
  		text: 'Max 10 characters', 
  		// footer: '<a href>Why do I have this issue?</a>'
	})
 		return false;
 	}
 	else if(isNaN(phone)){
 		Swal.fire({
  		type: 'error',
  		title: 'Oops...',
  		text: 'Only numbers in the phone field', 
  		// footer: '<a href>Why do I have this issue?</a>'
	})
 		return false;
 	}
}