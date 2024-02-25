<?php
require("connection.php");

// Get the JSON data from the POST request
$json_data = file_get_contents("php://input");
$data = json_decode($json_data);

// Get the task ID from the decoded JSON data
$task_id = isset($data->task_id) ? $data->task_id : '';

// Fetch updated values
$updated_title = isset($data->title) ? $data->title : '';
$updated_description = isset($data->description) ? $data->description : '';

// Perform the update in the database
// if (isset($_POST["update_submit"])) {
    $query = "UPDATE `user todo list` SET task_title = '$updated_title', task_description = '$updated_description' WHERE task_id = '$task_id'";
    $execute = mysqli_query($conn, $query);

    if ($execute) {
        echo "Task Updated!";
    } else {
        echo "Error Updating task: " . mysqli_error($conn);
    }
// }
?>
