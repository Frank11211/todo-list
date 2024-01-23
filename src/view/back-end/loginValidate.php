<?php 
    include "../../database/db.php";

    if(isset($_POST["submit"])){

        $username = $_POST["login_username"];
        $password = $_POST["login_password"];

        if (!(isset($_POST["login_username"]) && isset($_POST["login_password"]))) {
            echo '<script>alert("Username or Password field can\'t be empty")</script>';
            return;
        }

        // Best practice for prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_username = ? AND user_password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // If user exists, direct to homepage + set up session.
        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();

            session_start();
            $_SESSION["userId"] = $row['id'];
            $_SESSION["userName"] = $row['user_username'];
            $_SESSION["userPass"] = $row['user_password'];
            $_SESSION["userImg"] = $row['user_image'];

            header("Location: ../front-end/home.php");
      
        } else {
            // return back to login page
            header("Location: ../../../login.php?error=unknownuser");
            
        }

    }
    

?>