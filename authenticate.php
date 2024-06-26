<?php
    require_once('admin_db.php');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    if (is_valid_admin_login($email, $password)) {
    // check valid login,
    // then create valid entry in the $_SESSON global super array
    $_SESSION['is_valid_admin'] = true;
    // grab managers_id and set it to the first 
    $managers_id = filter_input(INPUT_GET, 'managers_id', FILTER_VALIDATE_INT);
    // search for emailAddress and append to queryManager
    $queryManager = 'SELECT * FROM techaccessoriesManagers WHERE emailAddress = :email';
    $statement = $db->prepare($queryManager);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $manager = $statement->fetch();
    $firstName = $manager['firstName'];
    $lastName = $manager['lastName'];
    $statement->closeCursor();

    // create global array with linkedlist between user_info and the three values needed 
    // for displaying welcome message; firstName, lastName, email
    $_SESSION['user_info'] = ['firstName' => $firstName, 'lastName' => $lastName, 'email' => $email];
    } else {
        if ($email == NULL && $password == NULL) {
        $login_message ='You must login to view this page.';
        } else {
        $login_message = 'Invalid credentials.';
        }
    }
?>

<html> 
    <head>
        <title>Authentication/Loggedin Pg</title>
        <link rel="stylesheet" href="styles/lukas_tech_accessories.css"/>
        <link rel="shortcun icon" href="images/shop_logo.png"/>
        <header>
            <h1>Authentication/Loggedin Page</h1>
        </header>
    </head>
    <body>
    <main>
        <?php
        if (isset($login_message)) {
            echo "<p>Error: $login_message</p>";
        } else {
            echo "<p>You have successfully logged in.</p>";
        }
        ?>
    </main>
</body>
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