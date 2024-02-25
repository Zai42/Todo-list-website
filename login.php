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
        <h1>Login!</h1>
        <p>If you have an account <br> Enter your email and password to enter..</p>
      </div>
                                             <!--Form-->
    <div class = "form">
   <form action = "login.php" method = "POST">
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" require>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name = "password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" require>
  </div>
  <button type="submit" name = "submit" class="btn btn-primary">Submit</button>
  <br>
  <br>
  <br>  
  <h3>Need an account?</h3>
  <br>
  <a href="signup.php" class="btn btn-success logout-button" id="loginlink">Signup</a>
</form>    
    </div>  
        
                                    <!-- Connection -->
<?php
    require("connection.php");
    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
    $check = "select * from user_info where email = '$email' and password = '$password'";
    $execute = mysqli_query($conn, $check);
    $user_info = mysqli_fetch_assoc($execute);
    $no_of_rows = mysqli_num_rows($execute);
    if($no_of_rows==0){
        echo '<div class="container mt-5">
        <div class="alert alert-warning" role="alert">
          <strong>No Account Found!</strong> Signup to create an account account or enter the correct credentials.
        </div>
      </div>';
    }
    else{
        session_start();
        $_SESSION["firstname"] = $user_info["firstname"];
        $_SESSION["id"] = $user_info["id"];
        $_SESSION["email"] = $user_info["email"];
        $_SESSION["image"] = $user_info["image"];
        // Redirect to the dashboard page
        header("Location: dashboard.php");
        exit();
    } 
  }
    ?>
 </body>    
  </html>