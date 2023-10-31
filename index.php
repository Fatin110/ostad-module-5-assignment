<?php
session_start();

if (isset($_SESSION['email'])){
echo "<script>alert('Welcome! $_SESSION[email]')</script>";
// header('location:roleManagement.php');
}
else{
    echo "<script>alert('Please Login first!')</script>";
    echo "<script>location.href='login.php'</script>";
}
?>
<a href="roleManagement.php">Click here if you are admin</a></br></br>
<a href="logout.php">Logout here</a>
