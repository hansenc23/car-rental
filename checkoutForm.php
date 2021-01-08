<?php

    $total_rent_price = 0;
    //calculate total rental price
    if(!empty($_SESSION["shopping_cart"])){
        foreach($_SESSION["shopping_cart"] as $key => $value){
            foreach($_SESSION["carsArray"] as $key2 => $value2){
                if($value["carId"] == $key2){ 

                    $total_rent_price += $value["rental_period"] * $value2["price_per_day"];
                   
                }
            }
        }
    }

    //display checkout form 
    print "<form action='formSubmit.php' method='post' id='rental-form'>
            
    <div class='form-group row'>
        <label for='first_name' class='col-sm-2 col-form-label'>First Name<span id='asterisk'>*</span></label>
        <div class='col-sm-10'>
            <input type='text' class='form-control' id='first_name' name='firstName' placeholder='First Name' required>
        </div>
    </div>

    <div class='form-group row'>
        <label for='last_name' class='col-sm-2 col-form-label'>Last Name<span id='asterisk'>*</span></label>
        <div class='col-sm-10'>
            <input type='text' class='form-control' id='last_name' name='lastName' placeholder='Last Name' required>
        </div>
    </div>

    <div class='form-group row'>
        <label for='email' class='col-sm-2 col-form-label'>Email Address<span id='asterisk'>*</span></label>
        <div class='col-sm-10'>
            <input type='email' class='form-control' id='email' name='email' placeholder='Email' required>
        </div>
    </div>

    <div class='form-group row'>
        <label for='address_line_1' class='col-sm-2 col-form-label'>Address Line 1<span id='asterisk'>*</span></label>
        <div class='col-sm-10'>
            <input type='text' class='form-control' id='address_line_1' name='address_1' placeholder='Address Line 1' required>
        </div>
    </div>

    <div class='form-group row'>
        <label for='address_line_2' class='col-sm-2 col-form-label'>Address Line 2</label>
        <div class='col-sm-10'>
            <input type='text' class='form-control' id='address_line_2' name='address_2' placeholder='Address Line 2'>
        </div>
    </div>

    <div class='form-group row'>
        <label for='city' class='col-sm-2 col-form-label'>City<span id='asterisk'>*</span></label>
        <div class='col-sm-10'>
            <input type='text' class='form-control' id='city' name='city' placeholder='City' required>
        </div>
    </div>

    <div class='form-group row'>
        <label for='state' class='col-sm-2 col-form-label'>State<span id='asterisk'>*</span></label>
        <div class='col-sm-10'>
            <select id='state' name='state' class='custom-select' required>
                <option value='ACT'>Australian Capital Territory</option>
                <option value='NSW'>New South Wales</option>
                <option value='VIC'>Victoria</option>
                <option value='QLD'>Queensland</option>
                <option value='SA'>South Australia</option>
                <option value='TAS'>Tasmania</option>
                <option value='WA'>Western Australia</option>
                <option value='NT'>Northern Territory</option>
            </select>
        </div>
    </div>

    <div class='form-group row'>
        <label for='postcode' class='col-sm-2 col-form-label'>Postcode<span id='asterisk'>*</span></label>
        <div class='col-sm-10'>
            <input type='text' class='form-control' id='postcode' name='postcode' placeholder='Postcode' required>
        </div>
    </div>

    <div class='form-group row'>
        <label for='payment' class='col-sm-2 col-form-label'>Payment Method<span id='asterisk'>*</span></label>
        <div class='col-sm-10'>
            <select id='payment' name='payment' class='custom-select' required>
                <option value='VISA'>VISA</option>
                <option value='MasterCard'>Mastercard</option>
                <option value='American Express'>American Express</option>
                <option value='PayPal'>PayPal</option>
            </select>
        </div>
    </div>

    <div class='form-group row'>
        <div class='col-sm-12 mt-3'>
            <h2>You are required to pay $$total_rent_price</h2>
            <input type='hidden' name='total_price' value='$total_rent_price'>
        </div>
    </div>  
    
    </form>
    <div class='form-group row'>
        <div class='col-sm-12 text-right'>
            <button class='btn btn-primary' onclick='cancelBooking()'>Continue Selection</button>
            <button class='btn btn-primary' onclick='submitForm()'>Booking</button>
        </div>
    </div>
    
";



?>