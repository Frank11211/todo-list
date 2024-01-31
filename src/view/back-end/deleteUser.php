<?php
include "../../database/db.php";

$json = file_get_contents('php://input');
$taskObj = json_decode($json, true);

$response = array(); // Initialize response array

if (isset($taskObj["deleteId"])) {

    $deleteId = $taskObj["deleteId"];

    //Prepare statment 
    $stmt = $conn->prepare("DELETE FROM task WHERE task_id = ?");

    if($stmt){
        $stmt->bind_param("i", $deleteId);
        $stmt->execute();
        
        // check any row is effected
        if ($stmt->affected_rows > 0) {
            $response['success'] = true;
            $response['message'] = "Data deleted successfully";
        } else {
            $response['success'] = false;
            $response['message'] = "No record deleted. Invalid deleteId or record not found.";
        }

       $stmt->close();

    }  else {
        $response['success'] = false;
        $response['message'] = "Error in preparing the DELETE statement.";
    }

} else {
    $response['success'] = false;
    $response['message'] = "Invalid request. 'deleteId' not provided.";
}

// Send JSON response back to the frontend
header('Content-Type: application/json');
echo json_encode($response);
?>