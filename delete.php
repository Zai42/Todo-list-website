<?php
// delete_task.php

    require("connection.php");

    // Get the task ID from the Vanilla Javascript
    $task_id = $_POST["task_id"];

    // Perform the deletion in the database
    $query = "DELETE FROM `user todo list` WHERE task_id = '$task_id'";
    $execute = mysqli_query($conn, $query);

    if ($execute) {
        echo "Task deleted successfully";
    } else {
        echo "Error deleting task";
    }
?>