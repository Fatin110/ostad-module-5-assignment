<?php 
session_start();
$error = false;

$email = filter_input(INPUT_POST,"email", FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST,"password", FILTER_SANITIZE_STRING);

$fp = fopen("users.txt","r");
if ($email && $password){
  $_SESSION['loggedin'] = false;
  $_SESSION['email'] = false;
  $_SESSION['role'] = false;

  while ($data = fgetcsv($fp)){
    if ($data[1] == $email && $data[2] == sha1($password)){
      $_SESSION['loggedin'] = true;
      $_SESSION['email'] = $email;
      $_SESSION['role'] = $data[3];

      // echo "hello". $_SESSION['email'];
      header('location:index.php');
    }
    
  }

  if (!$_SESSION['loggedin'] || !$_SESSION['email']){
    echo "<h3 style='color:red; text-align: center;'>Wrong password or email! Please try again</h3>";
  }


  if (!$_SESSION['loggedin']){
    $error = true;
  }
}

if (isset($_POST['logout'])){
  $_SESSION['loggedin'] = false;
  $_SESSION['email'] = false;
  $_SESSION['role'] = false;
  session_destroy();
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Login Form</h2>
  <form method="POST">
    
    <div class="form-group">
      <label for="email">Email:</label>
      <input required type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input required type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    
    <button type="submit" name="login" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
