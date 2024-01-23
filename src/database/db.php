<?php 
    $servername ="localhost";
    $username   ="root";
    $password   ="";
    $database   ="to-do-list-myware";

    $conn = new mysqli($servername, $username, $password, $database);
 
    $error = $conn->connect_error? die("Fail database connection: " . $conn->connect_error) : "Your Db is connect";

    // Display Connection Success
    echo($error);

?>