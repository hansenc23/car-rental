<?php
    
    session_start();
   if(isset($_POST["rentalArray"])){
        
    //updates the current 'shopping_cart' session variable with the new array that contains the updated rental_period
    for($i=0; $i<count($_POST["rentalArray"]); $i++){
        if($_POST["rentalArray"][$i]["carId"] == $_SESSION["shopping_cart"][$i]["carId"]){
              $_SESSION["shopping_cart"][$i]["rental_period"] = $_POST["rentalArray"][$i]["rentalDay"];
            
        }
    }

    // foreach($_SESSION["shopping_cart"] as $key => $value){
         
    //      print $value["rental_period"];
    // }
     
   }







?>