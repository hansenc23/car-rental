<?php
    session_start();
    $carId = $_POST["carId"];

    //checks the availability of the car and then return a response to alert the user
    if($_SESSION["carsArray"][$carId]["availability"] == "False"){
        echo "Sorry, the car is not available now. Please try other cars.";
    }else{
        if(isset($_SESSION["shopping_cart"])){
            //check if shopping cart contains an existing car
            $id_exists = false;
            foreach($_SESSION["shopping_cart"] as $key => $value){
                if($value["carId"] == $carId){
                    $id_exists = true;
                    break;
                }
            }

            if($id_exists == true){
                echo "Failed to add. Car already exists in shopping cart!";

            }else{
                
                //if car does not exist yet, then store car details ('id' and 'rental_period') in an array then push it to 'shopping_cart' session variable
                $car_rental_details = array(
                    "carId" => $carId,
                    "rental_period" => 1
                );
                array_push($_SESSION["shopping_cart"], $car_rental_details);
                echo "Added to cart successfully!";
            }
        }else{
            //if car does not exist yet, then store car details ('id' and 'rental_period') in an array then push it to 'shopping_cart' session variable
            $car_rental_details = array(
                "carId" => $carId,
                "rental_period" => 1
            );
            $_SESSION["shopping_cart"] = array($car_rental_details);
            echo "Added to cart successfully!";
        }
    }




?>