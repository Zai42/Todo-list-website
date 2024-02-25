<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ToDo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .container {
        max-width: 600px;
        margin: auto;
        text-align: center;
      }

      .jumbotron {
        background-color: #007bff;
        color: #ffffff;
        padding: 1rem;
      }
      .form{
        padding: 2rem;
      }
      </style>
</head>

  <body>
    <div class="container">
      <div class="jumbotron">
        <h1>Signup Now!</h1>
        <p>Create your account to get started.</p>
      </div>
                                             <!--Form-->
    <div class = "form">
   <form action = "signup.php" method = "POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="firstname" class="form-label">First Name</label>
    <input type="text" name = "firstname" class="form-control" id="exampleInputEmail1" require>
  </div>
  <div class="mb-3">
    <label for="lastname" class="form-label">Last Name</label>
    <input type="text" name="lastname" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" require>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name = "password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" require>
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Profile Picture</label>
    <input type="file" name = "image" class="form-control" id="exampleInputEmail1" ccept="image/*">
    </div>
  <div class="mb-3">
    <label for="designation" class="form-label">Choose your designation</label>
    <br>
    <input type="radio" name="designation" value="Student"> Student
    <br>
    <input type="radio" name="designation" value="Professional"> Professional
      </div>
  <button type="submit" name = "submit" class="btn btn-primary">Signup</button>
  <br>
  <br>
  <br>  
  <h3>Already have an account?</h3>
  <br>
  <a href="login.php" class="btn btn-success logout-button" id="loginlink">Login</a>

</form>    
    </div>  
        
                                    <!-- Connection -->
<?php
// Disable warnings
error_reporting(E_ERROR | E_PARSE);

    require("connection.php");
    if(isset($_POST["submit"])){
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $designation = $_POST["designation"];
    }
        // Getting the image file from the user 
       if(isset($_FILES["image"])){
          $file_name = $_FILES["image"]["name"];
          $file_size = $_FILES["image"]["size"];
          $file_tmp = $_FILES["image"]["tmp_name"];
          $file_type = $_FILES["image"]["type"]; 
          move_uploaded_file($file_tmp,"uploads/".$file_name); 
          $file_in_db = "uploads/".$file_name;
       }  
    $check = "select * from user_info where email = '$email'";
    $execute = mysqli_query($conn, $check);
    $no_of_rows = mysqli_num_rows($execute);
    if($no_of_rows>0){
        echo '<div class="container mt-5">
        <div class="alert alert-warning" role="alert">
          <strong>No Signup required!</strong> You already have an account.
        </div>
      </div>';
    }
    else{
        $query = "insert into user_info (firstname, lastname, email, password, designation, image)
        value ('$firstname','$lastname','$email','$password','$designation', '$file_in_db')";
        $execute = mysqli_query($conn,$query);
        if ($execute) {
            // Redirect to the login page
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
    error_reporting(E_ALL);
    ?>
 </body>    
  </html>