<?php

session_start();

$_SESSION = [];  // Clear all session data from memory

session_destroy();     // Clean up the session ID

$login_message = 'You have been logged out.';

?>

<!--
'luka@lukastechaccessories.com','pass123','Luka','Mayer');
'maurice@lukastechaccessories.com','mauriceThegeese','Maurice','Geese');
'diocletian@lukastechaccessories.com','dioDiodio','Diocletian','III');
-->
