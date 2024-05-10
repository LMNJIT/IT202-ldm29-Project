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
        <link rel="stylesheet" href="styles/lukas_tech_accessories.css"/>
        <link rel="shortcun icon" href="images/shop_logo.png"/>
        <header>
            <h1>Shipping Page Results</h1>
        </header>
    </head>
    <body class="label">
        <main>
            <!-- Surround UPS label with a border -->
            <div class="ups-label">
            <p class="small" style="display: inline;">
                LUKA'S TECH SHOP 
            </p>
            <p class="small" style="display: inline;">
                <span style="margin-left: 220px;">DATE: <span><?php echo ($ship_date); ?></span></span>
            </p>
            <p class="small">
                732-102-6983
                <br>
                141 SUMMIT ST.
                <br>
                NEWARK, NJ, 07103
                <br>
                SHIP TO:
            </p>
            <p class="small" style="display: inline;">
                <span style="margin-left: 50px;"><span><?php echo (strtoupper($name));?></span><br>
                <span style="margin-left: 50px;"><span><?php echo (strtoupper($street_address)); ?></span><br>
                <span style="margin-left: 50px;"><span><?php echo (strtoupper($city. ', ' . $state . ' ' . $zip_code)); ?></span><br>
                <span style="margin-left: 50px;"><span><?php echo ('UNITED STATES'); ?></span><br>
                <br><span><?php echo ('TRACKING # 1Z 071 5X1 01 9064 7079'); ?></span><br>
                <span><?php echo ('SHIPPED BY UPS NEXT DAY AIR'); ?></span><br>
            </p>
            <img src="images/ups_tracking_nextdayair.png" alt="html image" width=auto height=auto style="margin: 1em 1em 0;"/>
            </div>
            <br>
            <h4>Package Dimensions & Value</h4>
            <label>Dimensions (inches): </label><span><?php echo ($length . ' x ' . $width . ' x ' . $height); ?></span>
            <br>
            <label>Package Value: </label>
            <span><?php echo ('$' . $package_value); ?></span>
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
            <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/home_page.php">Home Page</a>
            <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/tech_accessories_product_list.php">Product List</a>
            <?php
                session_start();
                if (empty($_SESSION)) {
                ?>
            <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/login.php">Login</a>
            <?php } else { ?>
                <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/shipping_page.php">Shipping Page</a>
                <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/create_products_form.php">Product Manager (Add Products)</a>
                <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/logout.php">Logout</a>
                <p>Welcome <?php echo $_SESSION['user_info']['firstName'] . ' ' . $_SESSION['user_info']['lastName'] . ' ('
                . $_SESSION['user_info']['email'] . ')';?><p>
            <?php } ?>
        </nav>
        <p>By L M</p>
    </footer>
    <!-- Poppins Font from https://fonts.google.com/selection/embed -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</html>
