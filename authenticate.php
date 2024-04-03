<?php
    require_once('admin_db.php');
    session_start();
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    if (is_valid_admin_login($email, $password)) {
    // check valid login,
    // then create valid entry in the $_SESSON global super array
    $_SESSION['is_valid_admin'] = true;
    // redirect logged in user to default page
    echo "<p>You have successfully logged in.</p>";
    echo "<a href='http://localhost/LMNJIT/git/IT202-ldm29-Project/home_page.php'>Home Page</a>";
    
    $managers_id = filter_input(INPUT_GET, 'managers_id', FILTER_VALIDATE_INT);
    if ($managers_id == NULL || $managers_id == FALSE) {
        $managers_id = 1;
    }

        $queryManager = 'SELECT * FROM techaccessoriesManagers WHERE emailAddress = :email';
        $statement = $db->prepare($queryManager);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $manager = $statement->fetch();
        $firstName = $manager['firstName'];
        $lastName = $manager['lastName'];
        $statement->closeCursor();

    $_SESSION['user_info'] = ['firstName' => $firstName, 'lastName' => $lastName, 'email' => $email];
    } else {
        if ($email == NULL && $password == NULL) {
        $login_message ='You must login to view this page.';
        } else {
        $login_message = 'Invalid credentials.';
        }
        include('login.php');
    }
?>
