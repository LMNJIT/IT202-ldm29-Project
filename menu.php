<html>
    <head>
        <title>Login/Logout Menu</title>
    </head>
    <body>
    <?php 
        session_start();
        if (isset($_SESSION['is_valid_admin'])) { 
        ?>
        <p>
            <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/login.php">Logout</a>
        </p>
        <?php } else { ?>
        <p>
            <a href="http://localhost/LMNJIT/git/IT202-ldm29-Project/logout.php">Login</a>
        </p>
    <?php } ?>
    </body>
</html>