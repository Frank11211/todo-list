<?php 
include "../../database/db.php";

$json = file_get_contents('php://input');
$userObj = json_decode($json, true);
// TODO , use ajax format, 

$response = array();

if(!empty($userObj) && json_last_error() === JSON_ERROR_NONE){

    $stmt = $conn->prepare("INSERT INTO users (user_username, user_password, user_image) VALUES (?, ?, null)");
    
    if ($stmt) {

        $stmt->bind_param("ss", $userObj['username'], $userObj['password']);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $response['success'] = true;
            $response['message'] = "User create successfully";
            
        } else {
            $response['success'] = false;
            $response['message'] = "User create fail, invalid data or record not found.";
        }

        $stmt->close();
    } else {
        $response['success'] = false;
        $response['message'] = "Error in preparing the INSERT user statement.";
    }
    
}

header('Content-Type: application/json');
echo json_encode($response);

?>