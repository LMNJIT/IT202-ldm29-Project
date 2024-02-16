<!-- 
Luka Mayer
2/16/2024
IT202 Internet Applications | Section 006
Phase 1 Assignment: HTML5 and PHP Form
ldm29@njit.edu 
-->

<?php
    // Grab each of the variables
    $name = filter_input(INPUT_POST, 'name',  FILTER_SANITIZE_STRING);
    $street_address = filter_input(INPUT_POST, 'street_address',  FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city',  FILTER_SANITIZE_STRING);
    $state = filter_input(INPUT_POST, 'state',  FILTER_SANITIZE_STRING);
    $zip_code = filter_input(INPUT_POST, 'zip_code', FILTER_SANITIZE_STRING);
    $ship_date = filter_input(INPUT_POST, 'ship_date', FILTER_SANITIZE_STRING);
    $order_number = filter_input(INPUT_POST, 'order_number', FILTER_VALIDATE_FLOAT);
    $length = filter_input(INPUT_POST, 'length', FILTER_VALIDATE_FLOAT);
    $width = filter_input(INPUT_POST, 'width', FILTER_VALIDATE_FLOAT);
    $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_FLOAT);
    $package_value = filter_input(INPUT_POST, 'package_value', FILTER_VALIDATE_FLOAT);

    // Validates each of the variables, with special attention paid to $state, $zip_code, $length/$width/$height, and $package_value
    // Essentially just checks for errors and throws messages if encountered
    function validateState($state) {
        $state_list = array("AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "FL", "GA", "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD", "MA", "MI", "MN", "MS", "MO", "MT", "NE", "NV", "NH", "NJ", "NM", "NY", "NC", "ND", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VT", "VA", "WA", "WV", "WI", "WY");
        
        return in_array($state, $state_list);
    }

    function validateZipCode($zip_code) {
        if (strlen($zip_code) == 5 || (strlen($zip_code) == 10 && $zip_code[5] == '-')) {
            return true;
        }
    }

    $error_message = '';

    if ($name === FALSE) {
        $error_message .= 'Name must be valid.<br>';
    }

    elseif ($street_address === FALSE) {
        $error_message .= 'Street Address must be valid.<br>';
    }

    elseif ($city === FALSE) {
        $error_message .= 'City must be valid.<br>';
    }

    elseif (!validateState($state)) {
        $error_message .= 'Input valid State initials.<br>';
    }

    elseif (!validateZipCode($zip_code)) {
        $error_message .= 'Zip Code must be valid.<br>';
    }

    elseif (empty($ship_date)) {
        $error_message .= 'Ship Date must be valid.<br>';
    }

    elseif ($order_number === FALSE) {
        $error_message .= 'Order Number must be valid.<br>';
    }

    elseif ($length === FALSE) {
        $error_message .= 'Length must be a valid number.<br>';
    }

    elseif ($length >= 36) {
        $error_message .= 'Package length must be no more than 36 inches.<br>';
    }

    elseif ($width === FALSE) {
        $error_message .= 'Width must be a valid number.<br>';
    }

    elseif ($width > 36) {
        $error_message .= 'Package width must be no more than 36 inches.<br>';
    }

    elseif ($height === FALSE) {
        $error_message .= 'Height must be a valid number.<br>';
    }

    elseif ($height > 36) {
        $error_message .= 'Package height must be no more than 36 inches.<br>';
    }

    elseif ($package_value === FALSE) {
        $error_message .= 'Package Value must be a valid number.<br>';
    }

    if ($package_value >= 1000) {
        $error_message .= 'Package value must be no more than $1,000.<br>';
    }

    if($error_message != '') {
        include('shipping_page.php');
        exit();
    }
?>

<html>
    <head>
        <title>Shipping Page</title>
        <link rel="stylesheet" href="styles/lukas_tech_shop.css"/>
        <header>
            <h1>Shipping Page Results</h1>
        </header>
    </head>
    <body>
        <main>
            <!-- Display the results in a format similar to a UPS Shipping Label -->
            <h5>LUKA'S TECH SHOP DATE: <span><?php echo ($ship_date); ?></span></h5>
            <h5>732-102-6983</h5>
            <h5>141 SUMMIT ST.</h5>
            <h5>NEWARK, NJ, 07103</h5>
            <h4>SHIP TO:</h4>
            <h4><?php echo (strtoupper($name)); ?></span></h4>
            <h4><?php echo (strtoupper($street_address)); ?></span></h4>
            <h4><?php echo (strtoupper($city. ', ' . $state . ' ' . $zip_code)); ?></span></h4>
            <h4><?php echo ('UNITED STATES'); ?></span></h4>
            <img src="images/ups_tracking_nextdayair.png" alt="html image" width = auto/>
            <h4>Package Dimensions & Value</h4>
            <label>Dimensions (inches): </label><span><?php echo ($length . ' x ' . $width . ' x ' . $height); ?></span>
            <br>
            <label>Package Value: </label>
            <span><?php echo ('$' . $package_value); ?></span>
            <br>
            <h4>Shipping Company: UPS</h4>
            <h4>Shipping Class: Next Day Air</h4>
            <br>
            <label>Order Number: </label>
            <span><?php echo ($order_number); ?></span>
            <br>
        </main>
    </body>
    <!-- Nav bar -->
    <footer>
        <h4> Navigation </h4>
        <nav>
            <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/shipping_page.php">Shipping Page</a>
            <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/home_page.html">Home Page</a>
        </nav>
            <p>By Luka Mayer</p>
    </footer>
    <!-- Poppins Font from https://fonts.google.com/selection/embed -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</html>