// Get the modal
var modal = document.getElementById("myForm");
function openForm(first_name, last_name, email, phone, course, password) {
  	var input = document.createElement("input");
	input.setAttribute("type", "hidden");
	input.setAttribute("name", "id");
	input.setAttribute("value", email);

	//append to form element that you want .
	document.getElementById("update_form").appendChild(input);

	document.getElementById("first_name").setAttribute("value", first_name);
	document.getElementById("last_name").setAttribute("value", last_name);
	document.getElementById("email").setAttribute("value", email);
	document.getElementById("phone").setAttribute("value", phone);
	document.getElementById(course).selected=true;
	document.getElementById("password").setAttribute("value", password);

	document.getElementById("myForm").style.display = "block";
  	// document.getElementById("btn-close").style.display = "inline";
  	// document.getElementById("btn-update").style.display = "none";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
  // document.getElementById("btn-close").style.display = "none";
  // document.getElementById("btn-update").style.display = "inline";
}

function openPassForm(oldpass) {
	document.getElementById("myPassForm").style.display = "block";

	document.getElementById("oldPass").innerHTML=oldpass;
}

function closePassForm() {
	document.getElementById("myPassForm").style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }

  if (event.target == document.getElementById("myPassForm")) {
    document.getElementById("myPassForm").style.display = "none";
  }
}
