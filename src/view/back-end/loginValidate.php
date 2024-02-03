<?php 
    include "../../database/db.php";

    $json = file_get_contents('php://input');
    $userObj = json_decode($json, true);

    $response = array();

    if(!empty($userObj) && json_last_error() === JSON_ERROR_NONE){


        // Best practice for prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_username = ? AND user_password = ?");

        if($stmt){

            $stmt->bind_param("ss", $userObj['username'], $userObj['password']);
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

                $response['success'] = true;
        
            } else {
                $response['success'] = false;
                $response['message'] = "Incorrect Username or Password, please try again";
            }

        }else{

            $response['success'] = false;
            $response['message'] = "Error in preparing the Select user statement.";
        }
        
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);

?>