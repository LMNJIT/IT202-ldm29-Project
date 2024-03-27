<!-- 
Luka Mayer
3/27/2024
IT202 Internet Applications | Section 006
Phase 4 Assignment: PHP Authentication and Delete SQL Data
ldm29@njit.edu 

Version 1.0
-->

<?php
    // Slide 26
    // require once database_njit
    require_once('database_njit.php');

    // Get category ID
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    if ($category_id == NULL || $category_id == FALSE) {
        $category_id = 1;
    }

    // Get name for selected category
    $queryCategory = 'SELECT * FROM techaccessoriesCategories WHERE techaccessoriesCategoryID = :category_id';
    $statement1 = $db->prepare($queryCategory);
    $statement1->bindValue(':category_id', $category_id);
    $statement1->execute();
    $category = $statement1->fetch();
    $category_name = $category['techaccessoriesCategoryName'];
    $statement1->closeCursor();

    /* debugging, prints as normal array
    echo "<pre>";
    print_r($category);
    echo "The name of the category is $category_name";
    echo "</pre>";
    */

    // Slide 27
    // Get all categories
    $queryAllCategories = 'SELECT * FROM techaccessoriesCategories ORDER BY techaccessoriesCategoryID';
    $statement2 = $db->prepare($queryAllCategories);
    $statement2->execute();
    $categories = $statement2->fetchAll();
    $statement2->closeCursor();
    //print_r($categories);

    // Get products for selected category
    $queryProducts = 'SELECT * FROM techaccessories
    WHERE techaccessoriesCategoryID = :category_id
    ORDER BY techaccessoriesID';
    $statement3 = $db->prepare($queryProducts);
    $statement3->bindValue(':category_id', $category_id);
    $statement3->execute();
    $products = $statement3->fetchAll();
    $statement3->closeCursor();
?>

<html>
    <head>
        <title>Product List</title>
        <link rel="stylesheet" href="styles/lukas_tech_accessories.css"/>
        <link rel="shortcun icon" href="images/shop_logo.png"/>
        <header>
            <h1>Product List Page</h1>
        </header>
    </head>
    <body>
        <main>
            <h1>Product List</h1>
            <h2>Categories</h2>
            <nav>
                <ul>
                    <?php foreach($categories as $category) : ?>
                        <li>
                            <a href="?category_id=<?php echo $category['techaccessoriesCategoryID']; ?>
                            "><?php echo $category['techaccessoriesCategoryName']; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            </aside>
            <section>
            <!-- display a table of products -->
            <h2><?php echo $category_name; ?></h2>
            <table>
                <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                </tr>
                <?php foreach ($products as $product) : ?>
                <tr>
                <td><?php echo $product['techaccessoriesCode']; ?></td>
                <td><?php echo $product['techaccessoriesName']; ?></td>
                <td><?php echo $product['description']; ?></td>
                <td><?php echo $product['price']; ?></td>
                <td><?php echo $product['techaccessoriesStock']; ?></td>
                </tr>
                <?php endforeach; ?>      
            </table>
            </section>
        </main>
    </body>
    <footer>
        <h4> Navigation </h4>
        <nav>
            <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/home_page.html">Home Page</a>
            <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/shipping_page.php">Shipping Page</a>
            <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/tech_accessories_product_list.php">Product List</a>
            <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/create_products_form.php">Product Manager (Add Products)</a>
        </nav>
            <p>By Luka Mayer</p>
    </footer>
     <!-- Poppins Font from https://fonts.google.com/selection/embed -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</html>

<?php 
    // Display image based on category
    if ($category_name == 'Wireless Earbuds') {
        echo '<img src="images/airpods.png" alt="Wireless Earbuds" width="120"/>';
    } elseif ($category_name == 'Laptop Stands') {
        echo '<img src="images/laptop_stand.jpg" alt="Laptop Stand" width="120"/>';
    } elseif ($category_name == 'Portable Phone Chargers') {
        echo '<img src="images/portable_phone_charger.png" alt="Portable Phone Charger" width="120"/>';
    } elseif ($category_name == 'Bluetooth Keyboards') {
        echo '<img src="images/bluetooth_keyboards.png" alt="html image" width ="120"/>';
    } elseif ($category_name == 'Laptop Backpacks') {
        echo '<img src="images/laptop_backpack.png" alt="html image" width ="120"/>';
    }
?>