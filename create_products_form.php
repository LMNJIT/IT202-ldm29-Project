<?php   
    // grab db stuff for later
    require_once('database_njit.php');
    $query = 'SELECT * FROM techaccessoriesCategories ORDER BY techaccessoriesCategoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Product Manager</title>
        <link rel="stylesheet" href="styles/lukas_tech_accessories.css"/>
        <link rel="shortcun icon" href="images/shop_logo.png"/>
        <header>
            <h1>Product Manager Page</h1>
        </header>
    </head>
    <!-- trigger error if not logged in -->
    <?php
        if (empty($_SESSION)) {
            echo "You are not logged in and should not be on this page!";
        }
        else { 
    ?>
    <body>
        <main>
        <h2>Add Product</h2>
        <!-- form to add products and what not (uses create_products to do so) -->
        <form action="create_products.php" method = "post" id = "create_form">
            <label>Category:</label>
            <select name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['techaccessoriesCategoryID']; ?>">
                    <?php echo $category['techaccessoriesCategoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>
            <label>Code:</label>
            <input type="text" id="code" name="code" placeholder="At least 4 characters">
            <span>*</span>
            <br>

            <label>Name:</label>
            <input type="text" id="name" name="name" placeholder="At least 10 characters">
            <span>*</span>
            <br>

            <label>Description:</label>
            <input type="textarea" id="description" name="description" placeholder="At least 10 characters">
            <span>*</span>
            <br>

            <label>Price:</label>
            <input type="number" id="price" step=".01" name="price" placeholder="1 or more">
            <span>*</span>
            <br>

            <label>Stock:</label>
            <input type="number" id="stock" name="stock" placeholder="1 or more">
            <span>*</span>
            <br>

            <input type="button" value="Reset" onclick="resetProducts()"><br>

            <input type="submit" value="Add Product"><br>
            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
            <script src = "create_products.js"></script>
        </main>
    </body>
    <?php
        }
    ?>
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
        <p>By Luka Mayer</p>
    </footer>
    <!-- Poppins Font from https://fonts.google.com/selection/embed -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</html>