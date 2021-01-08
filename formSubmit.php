<?php
    session_start();
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hertz-UTS</title>
    <!-- Link to Bootstrap CSS Library -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
      integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
      crossorigin="anonymous"
    />
    <!-- Link to jquery -->
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
    <h1 class="text-center p-3">Rental Success!</h1>
    
    <div id="checkout-form">

    <?php
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $address1 = $_POST["address_1"];
        $address2 = $_POST["address_2"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $postcode = $_POST["postcode"];
        $payment = $_POST["payment"];
        $totalPrice = $_POST["total_price"];

        $to = $email; // note the comma

        // Subject
        $subject = 'Hertz-UTS Rental Details';

        // Message
        $message = '
        <html>
        <head>
          <title></title>
        </head>
        <body>
         '. '<h3>Hi ' . $firstName . ' '. $lastName .  '!</h3>' .

        '<p>Thank you for renting at Hertz-UTS, your rental was successful. The total rental cost is $' . $totalPrice. '.<p> <br>' . 


         $message.='<h3>Payment details:</h3>';
         $message.= '<p><strong>Full Name: </strong>' . $firstName . ' ' . $lastName . '</p>';
         $message.='<p><strong>Address: </strong>' . $address1 . ' ' . $address2 . ',' . $city . ', '. $state . ', '. $postcode .'</p> ';
         $message.='<p><strong>Payment method: </strong>' . $payment  .  '</p><br>';


         $message.= '<h3>Rental Details: </h3>';

        //loop through shopping_cart and carsArray session variable to get rental details,
        //then append it to $message variable
         foreach($_SESSION["shopping_cart"] as $key => $value){
            foreach($_SESSION["carsArray"] as $key2 => $value2){
                if($value["carId"] == $key2){
                    $_id = $value["carId"];
                    // print  $value2["brand"] . " " . $value2["model"] . " " . $value2["model_year"] ;
                    // print  $value2["price_per_day"] ;
                    // print  $value["rental_period"] . "<br>"; 
                    
                    $message .= '<p><strong>Car Model: </strong>' . $value2["brand"] . " " . $value2["model"] . " " . $value2["model_year"] .'</p>';
                    $message .= '<p><strong>Mileage: </strong>' . $value2["mileage"] .'</p>' ;
                    $message .= '<p><strong>Fuel type: </strong>' . $value2["fuel_type"] .'</p>' ;
                    $message .= '<p><strong>Seats: </strong>' . $value2["seats"]  .'</p>';
                    $message .= '<p><strong>Price/day: </strong>' . "$" . $value2["price_per_day"] .'</p>' ;
                    $message .= '<p><strong>Rental days: </strong>'  . $value["rental_period"]  .'</p>';
                    $message .= '<p><strong>Description: </strong>'   . $value2["description"]  .'</p> <br>';
                }
            }
        }



        $message.= '<h4>Total Cost: $' . $totalPrice . '</h4>';
        $message.= '</body>
        </html>';

        
    
        // To send HTML mail, the Content-type header must be set
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
    
        // Additional headers
        
        $headers[] = 'From: Hertz-UTS Car Rental Center <hertz.rental@hertzuts.com>';
    
        // Mail it
        mail($to, $subject, $message, implode("\r\n", $headers));

        

        // print "<p>$firstName</p>";
        // print "<p>$lastName</p>";
        // print "<p>$email</p>";
        // print "<p>$address1</p>";
        // print "<p>$address2</p>";
        // print "<p>$city</p>";
        // print "<p>$state</p>";
        // print "<p>$postcode</p>";
        // print "<p>$payment</p>";
        // print "<p>$totalPrice</p>";
    
        print"
        
        <div class='alert alert-success text-center' role='alert'>
            <h5>Rental details has been successfully sent to <strong>$email</strong></h5>
            <button class='btn btn-primary' onclick='goHome()'>Go Home</button>
        </div>
        
        ";


        session_destroy();
    
    ?>






        
    </div>


    <script type="text/javascript" src="cart-validation.js"></script>
    <script type="text/javascript" src="check-rental-day.js"></script>
    <script type="text/javascript" src="form-action.js"></script>
</body>
</html>