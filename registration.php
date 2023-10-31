<?php 

$fileName = "users.txt";

if (isset($_POST['registration'])){
  $username = $_POST['username'];
  $password = sha1($_POST['password']);
  $email = $_POST['email'];

  $fp = fopen($fileName, "a");
  
  $data = sprintf("%s,%s,%s",$username,$email,$password);
  
  fwrite($fp, $data);

  header('location:login.php');
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Registration Form</h2>
  <form method="POST">
    <div class="form-group">
      <label for="username">Username:</label>
      <input required type="text" class="form-control" placeholder="Enter name" name="username">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input required type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input required type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    
    <button type="submit" name="registration" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
