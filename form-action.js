function cancelBooking() {
  var result = confirm('Are you sure you want to cancel booking?');
  if (result == true) {
    window.location = 'http://www-student.it.uts.edu.au/~hchristi/assignment2/index.php';
  }
}

//function to submit form
function submitForm() {
  const rentalForm = document.getElementById('rental-form');
  if (validateForm() == true) {
    rentalForm.submit();
  }
}

//function to validate form inputs
function validateForm() {
  const first_name = document.getElementById('first_name');
  const last_name = document.getElementById('last_name');
  const email = document.getElementById('email');
  const city = document.getElementById('city');
  const address1 = document.getElementById('address_line_1');
  const postcode = document.getElementById('postcode');

  if (first_name.value == '') {
    alert('Please enter your First Name');
    first_name.focus();
    return false;
  }

  if (last_name.value == '') {
    alert('Please enter yout Last Name');
    last_name.focus();
    return false;
  }

  if (email.value == '') {
    alert('Please enter your Email');
    email.focus();
    return false;
  }

  if (email.value) {
    if (validateEmail(email.value) == false) {
      alert('Please enter a valid Email');
      email.focus();
      return false;
    }
  }

  if (address1.value == '') {
    alert('Please enter your address');
    address1.focus();
    return false;
  }

  if (city.value == '') {
    alert('Please enter a City');
    city.focus();
    return false;
  }

  if (postcode.value == '') {
    alert('Please enter a Postcode');
    postcode.focus();
    return false;
  }

  if (isNaN(postcode.value) || (postcode.value && (postcode.value.length < 4 || postcode.value.length > 4))) {
    alert('Please enter a valid Australian postcode');
    postcode.focus();
    return false;
  }

  return true;
}

//function to validate email using regular expression
function validateEmail(email) {
  var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

function goHome() {
  window.location = 'http://www-student.it.uts.edu.au/~hchristi/assignment2/index.php';
}
