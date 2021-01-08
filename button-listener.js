// sending an AJAX request conataining the 'id' of the car to a PHP file
function button(id) {
  $.ajax({
    type: 'POST',
    url: 'addToCart.php',
    data: { carId: id },
    success: function (data) {
      alert(data);
    },
  });
}
