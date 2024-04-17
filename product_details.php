<!-- 
Luka Mayer
4/3/2024
IT202 Internet Applications | Section 006
Phase 4 Assignment: PHP Authentication and Delete SQL Data
ldm29@njit.edu 

Version 1.0
-->

<?php
    // Slide 26
    // require once database_njit
    require_once('database_njit.php');

    //grab product_id that was clicked
    $product_id = filter_input(INPUT_GET, 'product_id', FILTER_VALIDATE_INT);

    // Get products for selected product ID
    $query = 'SELECT * FROM techaccessories WHERE techaccessoriesID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();

    if ($product) {
        $name = $product['techaccessoriesName'];
        $description = $product['description'];
        $price = $product['price'];
        $stock = $product['techaccessoriesStock'];
    }
?>

<html> 
    <head>
        <title>Details Page</title>
        <link rel="stylesheet" href="styles/lukas_tech_accessories.css"/>
        <link rel="shortcun icon" href="images/shop_logo.png"/>
        <header>
            <h1>Details Page</h1>
        </header>
    </head>
    <body>
        <main>
            <h2>Name:<?php if ($product) { echo ' ' . $name?></h2>
            <h2>Description:<?php echo ' ' . $description?></h2>
            <h2>Price:<?php echo ' $' . $price?></h2>
            <h2>Stock:<?php echo ' ' . $stock?></h2>
            <?php if (($product['techaccessoriesCategoryID']) >= 1 && ($product['techaccessoriesCategoryID']) <= 5) {?>
                <img id="rollover_image" src="images/<?php echo $product_id; ?>.jpg" alt="<?php echo $product_id?>" width="120"/>
            <?php } else {?>
                <h3>Error: Product ID unable to be located. Go back to product list and try again.</h3>
            <?php } } ?>
        </main>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src = "rollover.js"></script>
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
        <p>By Luka Mayer</p>
    </footer>
    <!-- Poppins Font from https://fonts.google.com/selection/embed -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</html>
<!-- Store images 
<img src="images/airpods.png" alt="html image" width="120"/>
<img src="images/laptop_stand.jpg" alt="html image" width ="120"/>
<img src="images/portable_phone_charger.png" alt="html image" width ="120"/>
<img src="images/bluetooth_keyboards.png" alt="html image" width ="120"/>
<img src="images/laptop_backpack.png" alt="html image" width ="120"/>
<img src="images/shop_logo.png" alt="html image" width="120"/>
            -->