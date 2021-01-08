<?php
    session_start();
    if(isset($_POST['carsCatalog'])){
        //set the car array received from javascript to a PHP session variable
        $_SESSION['carsArray'] = $_POST['carsCatalog'];

        displayCatalog();
    }



    // display each car including the details in a card
    function displayCatalog(){

        foreach($_SESSION["carsArray"] as $key => $value){
            $image_path = $value["image_path"];
            $image_alt = $value["image_alt"];
            $brand = $value["brand"];
            $model = $value["model"]; 
            $model_year = $value["model_year"]; 
            $mileage = $value["mileage"]; 
            $seats = $value["seats"]; 
            $fuel_type = $value["fuel_type"]; 
            $price_per_day = $value["price_per_day"]; 
            $availablity = $value["availability"]; 
            $description = $value["description"]; 

            print "
            
            <div class='card'>
                <img class='card-img-top' src='$image_path' alt='$image_alt' />
                <div class='card-body'>
                <h5 class='card-title text-center'>$brand $model $model_year</h5>
                <div class='car-details'>
                    <div class='detail-item'>
                        <p class='font-weight-bold'>Mileage:</p>
                        <p>$mileage KM</p>
                    </div>
                    <div class='detail-item'>
                        <p class='font-weight-bold'>Fuel Type:</p>
                        <p>$fuel_type</p>
                    </div>
                    <div class='detail-item'>
                        <p class='font-weight-bold'>Seats:</p>
                        <p>$seats</p>
                    </div>
                    <div class='detail-item'>
                        <p class='font-weight-bold'>Price/day:</p>
                        <p>$ $price_per_day</p>
                    </div>
                    <div class='detail-item'>
                        <p class='font-weight-bold'>Availability:</p>
                        <p>$availablity</p>
                    </div>
                </div>
                <p class='card-text text-center'>
                    $description
                </p>
                </div>
                <div class='card-footer text-center'>
                    <button type='button' id='$key' class='btn btn-primary' data-toggle='modal' data-target='.bd-example-modal-sm' onclick='button($key);'>Add to Cart</button>
                </div>
            </div>
            
            
            ";
        }
        
    }










?>