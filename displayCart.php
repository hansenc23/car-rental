<?php

    //session_start();

    if(!empty($_SESSION["shopping_cart"])){
        $cartEmpty = false;


        print "<table class='table text-center'>
        <thead class='thead-light'>
            <tr>
            <th scope='col'>Thumbnail</th>
            <th scope='col'>Vehicle</th>
            <th scope='col'>Price Per Day</th>
            <th scope='col'>Rental Days</th>
            <th scope='col'>Actions</th>
            </tr>
        </thead>
        <tbody>";
            //loop through 'carsArray' to get the corresponding car details from the 'shopping_cart'
            //display 'shopping_cart' content in a nice format
            foreach($_SESSION["shopping_cart"] as $key => $value){
                foreach($_SESSION["carsArray"] as $key2 => $value2){

                    

                    if($value["carId"] == $key2){
                        $_id = $value["carId"];
                        
                        print "<tr><td scope='row'><img id='cart-image' src=" . "'" . $value2["image_path"] . "'" . "alt=''></td>";
                        print "<td class='h5'>" . $value2["brand"] . " " . $value2["model"] . " " . $value2["model_year"] . "</td>";
                        print "<td class='h5'>$ " . $value2["price_per_day"] .  "</td>";
                        
                        print "<td><input data-car-id='$_id' class='input_rental text-center' name='rental_days' class='text-center' value='1' type='number' min='1'></td>";
                        
                        print "
                            
                            <td><a href='?action=delete&id=$_id' onclick='removeCar();' class='btn btn-danger' >Remove</a></td></tr>
                        
                        
                        ";

                        
                    }
                }
            }
        

        print "
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class='text-center mt-2'><button  class='btn btn-primary' onclick='checkRentalDay()'>Proceed to Checkout</button></td>
                    </tr>
        </tbody>
            </table>";
        
    }else{
        //display message if 'shopping_cart' is empty
        $cartEmpty = true;
        

        print "
        
            <table class='table text-center'>
                <thead class='thead-light'>
                    <tr>
                    <th scope='col'>Thumbnail</th>
                    <th scope='col'>Vehicle</th>
                    <th scope='col'>Price Per Day</th>
                    <th scope='col'>Rental Days</th>
                    <th scope='col'>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class='text-center' colspan='5'><h2 class='m-4'>No car added to cart</h2></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class='text-center mt-2'><button type='button' class='btn btn-primary' onclick=checkCart($cartEmpty)>Proceed to Checkout</button></td>
                    </tr>
                </tbody>
            </table>
        
        ";



    }




?>