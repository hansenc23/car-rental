<?php
    session_start();
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hertz-UTS</title>
    <!-- Link to Bootstrap CSS library -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
    <!-- Link to jquery library -->
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
    <!-- Bootstrap dependency -->
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <!-- Bootstrap CSS library -->
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
      integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    
    
  </head>
<body>
    <div class="container1">
      <div class="header">
        <h1>Hertz-UTS</h1>
        <h2>Car Rental Center</h2>
      </div>
    </div>
    <h1 class="text-center p-3">Checkout</h1>
    <div id="checkout-form">
        <h2 class="mb-3">Customer Details and Payment</h2>
        <p class="text-right"><span id='asterisk'>*</span> indicates required field.</p>
       

        <?php include "checkoutForm.php" ?>
        
    </div>


    <script type="text/javascript" src="cart-validation.js"></script>
    <script type="text/javascript" src="check-rental-day.js"></script>
    <script type="text/javascript" src="form-action.js"></script>
</body>
</html>