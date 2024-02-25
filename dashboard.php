<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .container {
    text-align: center;
    margin: auto;
}

h1 {
    color: #007bff; /* Heading color */
}
.logout-button {
            position: fixed;
            top: 10px;
            right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            // Start the session (if not already started)
            session_start();

            // Check if the email is set in the session
            if(isset($_SESSION["email"])) {
                $firstname = $_SESSION["firstname"];
                $image = $_SESSION["image"];
                echo "<h1>Welcome, $firstname</h1>";  
                echo "<img src='$image' alt='Your Profile Photo' class='img-thumbnail'>";
                ?>
             <a href="logout.php" class="btn btn-danger logout-button" id="logoutLink">Logout</a>
                <div class="container mt-5">
                <h1>To-Do List</h1>
                <form action="dashboard.php" method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Task Title</label>
                        <input type="text" name="task_title" class="form-control" id="task" required>
                    </div>
                    <div class="mb-3">
                    <label for="task" class="form-label">Task Description:</label>
                    <textarea name="task_description" class="form-control" id="task" required></textarea>
                </div>
                    <button type="submit" onclick = "refresh()" name ="submit" class="btn btn-primary">Add Task</button>
                </form>
            </div>
              <!-- Displaying Data -->
        <?php 
        require("connection.php");
        $id = $_SESSION["id"];
        echo '<div class="container mt-5">
        <h1>All tasks</h1>
        <ul class="list-group">';
    
    // Fetch and display tasks from the database
    $query = "SELECT * FROM `user todo list` WHERE id = '$id'";
    $execute = mysqli_query($conn, $query);
    while ($rows = mysqli_fetch_assoc($execute)) {
        $task_title = $rows["task_title"];
        $task_description = $rows["task_description"];
        $task_id = $rows['task_id'];

        // Output each task as a list item
        echo '<li class="list-group-item">' . $task_title . '<br/>' . $task_description;
        ?>
        <div class="d-flex justify-content-end">
            <button type="button" onclick="updateTask(<?php echo $task_id; ?>, '<?php echo $task_title; ?>', '<?php echo $task_description; ?>')" class="btn btn-primary update">Edit</button>
            <button type="button" onclick="deleteTask(<?php echo $task_id; ?>)" class="btn btn-danger ms-2 delete">Delete</button>
        </div>

        <?php
          };     
        echo '  </li>
        </ul>';
          ?>  
    </div>
        <?php 
    //inserting data in table
    if(isset($_POST["submit"])){
        $id = $_SESSION["id"];
        $task_title = $_POST["task_title"];
        $task_description = $_POST["task_description"];
        $query = "INSERT INTO `user todo list` (id, task_title, task_description) VALUES ('$id', '$task_title', '$task_description')";
        $execute = mysqli_query($conn,$query);
    };
}
    else {
        // Handle the case where the first name is not set in the session
        echo '<p>Please Login to continue</p>';
        echo '<a href="login.php" class="btn btn-success logout-button" id="logoutLink">Login</a>';
    };

        ?>
    </div>
    <script>
    function refresh(){
        location.reload();
    }
    function deleteTask(taskId) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Reload the page or update the task list on success
                location.reload();
            } else if (xhr.readyState == 4 && xhr.status != 200) {
                console.error("Error deleting task: " + xhr.status);
            }
        };

        // Prepare the data to be sent in the request
        var data = "task_id=" + encodeURIComponent(taskId);
        
        // Send the request with the data
        xhr.send(data);
    }
    function updateTask(taskId, tasktitle, taskdescription) {
    // Prompt the user for new title and description
    var newTitle = prompt("Enter the new task title:");
    var newDescription = prompt("Enter the new task description:");

    if (newTitle !== null && newDescription !== null) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update.php", true);
        xhr.setRequestHeader("Content-type", "application/json");

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Reload the page or update the task list on success
                location.reload();
            } else if (xhr.readyState == 4 && xhr.status != 200) {
                console.error("Error updating task: " + xhr.status);
            }
        };
        // Prepare the data to be sent in the request as JSON
        var data = {
            task_id: taskId,
            title: newTitle,
            description: newDescription
        };

        // Send the request with the data
        xhr.send(JSON.stringify(data));
    } 
    else if (newTitle == null && newDescription !== null) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update.php", true);
        xhr.setRequestHeader("Content-type", "application/json");

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Reload the page or update the task list on success
                location.reload();
            } else if (xhr.readyState == 4 && xhr.status != 200) {
                console.error("Error updating task: " + xhr.status);
            }
        };
        // Prepare the data to be sent in the request as JSON
        var data = {
            task_id: taskId,
            title: tasktitle,
            description: newDescription
        };

        // Send the request with the data
        xhr.send(JSON.stringify(data));
    }
    else if (newTitle !== null && newDescription == null) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "update.php", true);
        xhr.setRequestHeader("Content-type", "application/json");

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Reload the page or update the task list on success
                location.reload();
            } else if (xhr.readyState == 4 && xhr.status != 200) {
                console.error("Error updating task: " + xhr.status);
            }
        };
        // Prepare the data to be sent in the request as JSON
        var data = {
            task_id: taskId,
            title: newTitle,
            description: taskdescription
        };

        // Send the request with the data
        xhr.send(JSON.stringify(data));
    } 
    }
</script>
</body>
</html>
