<?php
// Include the database connection file
include "../../database/db.php";

// Retrieve the raw POST data
$jsonData = file_get_contents("php://input");

// Decode the JSON data
$data = json_decode($jsonData);

// Check if "userId" is set in the received data
if (isset($data->userId)) {
    $userId = $data->userId;
    

    // Need to get the user Id and return back 
    $stmt = $conn->prepare("SELECT * FROM task WHERE user_id = ?");

    if ($stmt) {
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result) {
            $resultData = array();
            
            while ($row = $result->fetch_assoc()) {
                $resultData[] = $row;
            }
        
            // Encode data to JSON
            $jsonData = json_encode($resultData);
        
            // Set the response header to JSON
            header('Content-Type: application/json');
        
            // Echo the JSON data
            echo $jsonData;
        } else {
            // Handle database query error
            $errorData = array("error" => "Error in executing the database query.");
            
            // Encode error data to JSON
            $jsonError = json_encode($errorData);
        
            // Set the response header to JSON
            header('Content-Type: application/json');
        
            // Echo the JSON error data
            echo $jsonError;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        // Handle prepare statement error
        echo json_encode(array("error" => "Error in preparing the database statement."));
    }

    // Close the database connection
    $conn->close();
} else {
    // Handle the case when "userId" is not set in the received data
    echo json_encode(array("error" => "userId is not set in the received data."));
}
?>
