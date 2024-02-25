<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logged Out</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="text-center">
    <?php
    session_start();
    session_unset();
    session_destroy();
    ?>
    <div class="container mt-5">
        <h1>You are logged out!</h1>
         <br>
         <h3>Already Have an account?</h3>
        <br>  
        <a href="login.php" class="btn btn-success logout-button" id="loginlink">Login</a>
        <br>
         <br>
         <h3>Create new account!</h3>
        <br>  
          <a href="signup.php" class="btn btn-primary logout-button" id="loginlink">Login</a>    
        </div>
    <!-- Bootstrap scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xssHTMqFuxZjvKGbNlDA5Z6GqyslT7MfpiFJfuFU37FkN2EEu7b8dGf4D1eBD99D" crossorigin="anonymous"></script>
</body>
</html>
