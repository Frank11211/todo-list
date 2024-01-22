<?php 
    include "../../database/db.php";

    /*
    * check username and password from DB
    * If correct, return query string and session
    */ 

    $username = $_POST("login_username");
    $password = $_POST("login_password");   

    if( !(isset($_POST("login_username")) && isset($_POST("login_password"))) ){
        echo "Username or Password field can't be empty"; 
        return;
    }

    
     
    // check username and password from datbase
    // return if user exist and direct to home.php
    // else , throw error and say user doesn't exist\


    

    

?>