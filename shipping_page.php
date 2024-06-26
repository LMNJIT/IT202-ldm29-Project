<?php
  // Slide 62
  if(!isset($name)) { $name = ''; }
  if(!isset($street_address)) { $street_address = ''; }
  if(!isset($city)) { $city = ''; }
  if(!isset($state)) { $state = ''; }
  if(!isset($zip_code)) { $zip_code = ''; }
  if(!isset($ship_date)) { $ship_date = ''; }
  if(!isset($order_number)) { $order_number = ''; }
  if(!isset($length)) { $length = ''; }
  if(!isset($width)) { $width = ''; }
  if(!isset($height)) { $height = ''; }
  if(!isset($package_value)) { $package_value = ''; }

  session_start();
?>

<html>
    <head>
        <title>Shipping Page</title>
        <link rel="stylesheet" href="styles/lukas_tech_accessories.css"/>
        <link rel="shortcun icon" href="images/shop_logo.png"/>
        <header>
                <h1>Shipping Page</h1>
        </header>
    </head>
    <body>
        <main>
            <?php
                if (empty($_SESSION)) {
                    echo "You are not logged in and should not be on this page!";
                }
                else { 
            ?>
            <h3>Ship to an Address</h3>
            <?php
            if(!empty($error_message) ) {
                echo "<p>";
                echo $error_message;
                echo "</p>";
            }
            ?>
            <!-- https://www.w3schools.com/html/html_form_input_types.asp -->
            <!-- Takes input for each of the required inputs -->
            <form action="shipping_page_results.php" method = "post">
                <label>First and Last Name: </label>
                <input type="text" name="name"
                    value="<?php echo htmlspecialchars($name); ?>" />
                <br>
                <label>Street Address: </label>
                <input type="text" name="street_address"
                    value="<?php echo htmlspecialchars($street_address); ?>" />
                <br>
                <label>City: </label>
                <input type="text" name="city"
                    value="<?php echo htmlspecialchars($city); ?>" />
                <br>
                <label>State: </label>
                <input type="text" name="state"
                    value="<?php echo htmlspecialchars($state); ?>" />
                <br>
                <label>Zip Code: </label>
                <input type="text" name="zip_code"
                    value="<?php echo htmlspecialchars($zip_code); ?>" />
                <br>
            <h3>Ship Date</h3>
                <label>Ship Date: </label>
                <input type="date" name="ship_date"
                    value="<?php echo htmlspecialchars($ship_date); ?>" />
                <br>
            <h3>Order Number</h3>
                <label>Order Number: </label>
                <input type="number" name="order_number"
                    value="<?php echo htmlspecialchars($order_number); ?>" />
                <br>
            <h3>Package Dimensions (in inches)</h3>
                <label>Package Length: </label>
                <input type="number" step="any" name="length"
                    value="<?php echo htmlspecialchars($length); ?>" />
                <br>
                <label>Package Width: </label>
                <input type="number" step="any" name="width"
                    value="<?php echo htmlspecialchars($width); ?>" />
                <br>
                <label>Package Height: </label>
                <input type="number" step="any" name="height"
                    value="<?php echo htmlspecialchars($height); ?>" />
                <br>
            <h3>Total Declared Value of Package</h3>
                <label>Package Value: </label>
                <input type="number" step="any" name="package_value"
                    value="<?php echo htmlspecialchars($package_value); ?>" />
                <br>
                <input type="submit" value="Submit"/>
                <br>
            </form>
        </main>
    </body>
    <?php
        }
    ?>
    <!-- Nav bar -->
    <footer>
        <h4> Navigation </h4>
        <nav>
            <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/home_page.php">Home Page</a>
            <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/tech_accessories_product_list.php">Product List</a>
            <?php
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
