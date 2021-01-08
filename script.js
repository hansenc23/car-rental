$(document).ready(function () {
  //Send an AJAX request to parse the XML when document is fully loaded.
  loadXML();
});

function available() {
  console.log('yes');
}

// send an AJAX request to fetch data in car xml file, then stores it in an array
function loadXML() {
  $.ajax({
    //Sends an AJAX request to the XML file.
    type: 'POST',
    url: './data/cars.xml',
    dataType: 'xml',
    success: function (data) {
      var cars = new Array();
      $(data)
        .find('car')
        .each(function () {
          //Creates a temporary array for every 'car' tag in the XML file.
          var newCar = {};
          newCar['brand'] = $(this).find('brand').text();
          newCar['availability'] = $(this).find('availability').text();
          newCar['model'] = $(this).find('model').text();
          newCar['model_year'] = $(this).find('model_year').text();
          newCar['mileage'] = $(this).find('mileage').text();
          newCar['fuel_type'] = $(this).find('fuel_type').text();
          newCar['seats'] = $(this).find('seats').text();
          newCar['price_per_day'] = $(this).find('price_per_day').text();
          newCar['description'] = $(this).find('description').text();
          newCar['image_path'] = $(this).find('path').text();
          newCar['image_alt'] = $(this).find('alternate_title').text();
          //Pushes the temporary array into the cars array.
          cars.push(newCar);
        });
      sendData(cars);
      // console.log(cars);
    },
  });
}

// receives the Car array then use AJAX to send array to PHP file
function sendData(array) {
  //Sends data to be updated.
  $.ajax({
    type: 'POST',
    url: 'display-content.php',
    data: { carsCatalog: array },
    success: function (htmlResponse) {
      $('#catalog').append(htmlResponse);
    },
  });
}

// function printCatalog() {
//   //Updates the catalog portion of the index page.
//   $.ajax({
//     type: 'POST',
//     url: 'display-content.php',
//     data: { catalog_update: 'success' },
//     success: function (htmlCodeResponse) {
//       console.log(htmlCodeResponse);
//       $('#catalog').append(htmlCodeResponse);
//     },
//   });
// }
