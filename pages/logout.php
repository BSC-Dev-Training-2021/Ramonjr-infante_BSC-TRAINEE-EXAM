<?php
    session_start();
    unset($_SESSION['user']); // To delete a session var
    header("LOCATION: http://localhost/Ramonjr-infante_BSC-TRAINEE-EXAM");

?>