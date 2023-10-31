<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    echo "<script>alert('you cannot access this page!')</script>";
    echo "<script>location.href='index.php'</script>";
} else {
    echo "<script>alert('Welcome $_SESSION[role]!')</script>";
}

$fileName = "users.txt";
$fp = fopen("users.txt", "r");

        while ($data = fgetcsv($fp)) {
?>
<form method="POST">
    <input name="name" type="text" value="<?php echo $data[0]; ?>">
    <input name="email" type="text" value="<?php echo $data[1]; ?>">
<?php
        // echo "$data[0] | $data[1] | "; 
        echo "<select name='roles'>
        <option value='$data[3]'>$data[3]</option>
        <option value='admin'>Admin</option>
        <option value='editor'>Editor</option>
    </select></br></br>";     
}
echo "<button type='submit' name='update' class='btn btn-default'>Update Changes</button>";
?>
</form>