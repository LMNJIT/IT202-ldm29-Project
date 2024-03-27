<!-- 
Luka Mayer
3/27/2024
IT202 Internet Applications | Section 006
Phase 4 Assignment: PHP Authentication and Delete SQL Data
ldm29@njit.edu 

Version 1.0
-->

<?php
    require_once('database_njit.php');

    function getDB() {
        $dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=ldm29';
        $username = 'ldm29';
        $password = 'IT202mySQL@';
    
        try {
            $db = new PDO($dsn, $username, $password);
            echo '<p>You are connected to the local database.</p>';
        } catch(PDOException $ex) {
            // -> equivalent of . in x.length() in java
            $error_message = $ex->getMessage();
            include('database_error.php');
            exit();
        }
    return $db;
    }

    function addtechaccesoriesmanager($email, $password, $firstName, $lastName) {
        $db = getDB();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = 'INSERT INTO techaccessoriesManagers (emailAddress, password, firstName, lastName, dateCreated)
                VALUES (:email, :password, :firstName, :lastName, NOW())';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $hash);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->execute();
        $statement->closeCursor();
    }

    addtechaccesoriesmanager('luka@lukastechaccessories.com','pass123','Luka','Mayer');
    addtechaccesoriesmanager('maurice@lukastechaccessories.com','mauriceThegeese','Maurice','Geese');
    addtechaccesoriesmanager('diocletian@lukastechaccessories.com','dioDiodio','Diocletian','III');
?>

<!--
    no html section because it's just for the purpose of adding passwords
!-->