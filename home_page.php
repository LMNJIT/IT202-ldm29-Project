<!-- 
Luka Mayer
3/27/2024
IT202 Internet Applications | Section 006
Phase 4 Assignment: PHP Authentication and Delete SQL Data
ldm29@njit.edu 

Version 1.0
-->

<html> 
    <head>
        <title>Home Page</title>
        <link rel="stylesheet" href="styles/lukas_tech_accessories.css"/>
        <link rel="shortcun icon" href="images/shop_logo.png"/>
        <header>
            <h1>Luka's Tech Accessories</h1>
            <h2>Tech and Tech Accessories</h2>
        </header>
    </head>
    <body>
        <main>
            <!-- Store description -->
            <h3> Looking for some tech to buy? You've come to the right place! </h3>
            <h3> Purchase some of our excellent products, such as: </h3>
            <ul>
                <li>Wireless Earbuds</li>
                <li>Laptop Stands</li>
                <li>Portable Phone Chargers</li>
                <li>Bluetooth Keyboards</li>
                <li>Laptop Backpacks</li>
            </ul>
            <p>Our store was founded by a group of friends who found it was increasingly difficult to acquire 
            good, affordable tech and tech accessories. Stores were marking up prices and treating 
            customers like they knew nothing about the products! The shopping environment these 
            companies fosterd was becoming increasingly hostile to the average consumer. Luka's Tech 
            Shop is dedicated to doing the exact opposite of this; our mission is to give 
            our customers excellent tech products and tech accessories while treating them with the 
            respect they deserve.</p>
        </main>
    </body>
    <!-- Nav bar -->
    <footer>
    <h4> Navigation </h4>
    <nav>
        <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/home_page.php">Home Page</a>
        <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/shipping_page.php">Shipping Page</a>
        <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/tech_accessories_product_list.php">Product List</a>
        <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/create_products_form.php">Product Manager (Add Products)</a>
        <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/menu.php">Menu Page</a>
        <?php
            session_start();
            if (isset($_SESSION['is_valid_admin'])) {
        ?>
        <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/login.php">Login</a>
        <?php } else { ?>
        <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/logout.php">Logout</a>
        <p>Welcome <?php $_SESSION['firstName']; ?> <p>
        <?php } ?>
    </nav>
        <p>By Luka Mayer</p>
    </footer>
    <!-- Poppins Font from https://fonts.google.com/selection/embed -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</html>

<!-- Store images -->
<img src="images/airpods.png" alt="html image" width="120"/>
<img src="images/laptop_stand.jpg" alt="html image" width ="120"/>
<img src="images/portable_phone_charger.png" alt="html image" width ="120"/>
<img src="images/bluetooth_keyboards.png" alt="html image" width ="120"/>
<img src="images/laptop_backpack.png" alt="html image" width ="120"/>
<img src="images/shop_logo.png" alt="html image" width="120"/>