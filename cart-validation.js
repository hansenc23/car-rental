//check if cart is empty
function checkCart(isEmpty) {
  if (isEmpty === 1) {
    alert('No car has been reserved');
    window.location = 'http://www-student.it.uts.edu.au/~hchristi/assignment2/index.php';
  }
}

//validate the rentalDay that is input by the user
function checkRentalDay() {
  var inputElement = document.querySelectorAll('.input_rental');
  var validDays = true;
  var newRentalArray = new Array();
  //if input rental days is invalid, display error message
  for (var i = 0; i < inputElement.length; i++) {
    if (inputElement[i].value <= 0) {
      alert('Please enter a valid rental day');
      validDays = false;
      break;
    } else {
      //if rental day is valid then create a new array containing the updated rental_period with the corresponding carId
      validDays = true;
      var newRental = {};
      newRental['carId'] = inputElement[i].getAttribute('data-car-id');
      newRental['rentalDay'] = inputElement[i].value;
      newRentalArray.push(newRental);
    }
  }

  if (validDays == true) {
    updateRentalDay(newRentalArray);
  }
}

//receives new array with the updated rental_period
function updateRentalDay(newRentalArray) {
  //console.log(newRentalArray);
  //send new array by using AJAX to a PHP file
  $.ajax({
    type: 'POST',
    url: 'update_rental.php',
    data: { rentalArray: newRentalArray },
    success: function () {
      window.location.replace('checkout.php');
    },
  });
}
