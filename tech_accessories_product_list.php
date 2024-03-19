<!-- 
Luka Mayer
2/21/2024
IT202 Internet Applications | Section 006
Phase 2 Assignment: Read SQL Data using PHP
ldm29@njit.edu 

Version 1.0

You're Missing <footer> element in your page that displays the records from the database. Remember as said in the directions (this will be on every phase), these 
    elements should be on every single page you create.

Consistent banner logo missing in your page that displays the records from the database. That logo you have on your homepage, it should be on every page.

Just remember to include these next time
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
        <title>My Guitar Shop</title>
        <link rel="stylesheet" href="styles/lukas_tech_accessories.css"/>
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