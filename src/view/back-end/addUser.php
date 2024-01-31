<?php
include "../../database/db.php";

$json = file_get_contents('php://input');
$taskObj = json_decode($json, true);  // true to decode as associative array
// Now $taskObj is an associative array.
$response = array();

if (!empty($taskObj) && json_last_error() === JSON_ERROR_NONE) {

    $stmt = $conn->prepare("INSERT INTO task (`task_name`, `task_desc`, `task_created_date`, `task_status`, `task_prio`, `user_id`) VALUES (?,?,?,?,?,?)");

    if ($stmt) {
        $stmt->bind_param("sssssi", $taskObj['name'], $taskObj['desc'], $taskObj['date'], $taskObj['status'], $taskObj['priority'], $taskObj['user']);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $response['success'] = true;
            $response['message'] = "Data added successfully";
        } else {
            $response['success'] = false;
            $response['message'] = "No record added. Invalid data or record not found.";
        }

        $stmt->close();
    } else {
        $response['success'] = false;
        $response['message'] = "Error in preparing the INSERT statement.";
    }

} else {
    $response['success'] = false;
    $response['message'] = "Invalid JSON data or empty JSON object.";
}

// Send JSON response back to the frontend
header('Content-Type: application/json');
echo json_encode($response);
?>
