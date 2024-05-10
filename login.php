<?php 
    if (!isset($login_message)) {
        $login_message = 'You must login to view this site.';
    }
?>
<html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="styles/lukas_tech_accessories.css"/>
        <link rel="shortcun icon" href="images/shop_logo.png"/>
        <header>
            <h1>Login Page</h1>
        </header>
    </head>
    <body>
        <main>
            <h1>Login</h1>
            <form action="authenticate.php" method="post">
            <label>Email:</label>
            <input type="text" name="email" value="">
            <br>
            <label>Password:</label>
            <input type="password" name="password" value="">
            <br>
            <input type="submit" value="Login">
        </form>
        <p><?php echo $login_message; ?></p>
        </main>
    </body>
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

<!--
'luka@lukastechaccessories.com','###','###','###');
'maurice@lukastechaccessories.com','mauriceThegeese','Maurice','Geese');
'diocletian@lukastechaccessories.com','dioDiodio','Diocletian','III');
-->

