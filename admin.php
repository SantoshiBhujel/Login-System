<?php
    session_start();
    if(!$_SESSION['active']){
        header('Location: login.php');
    }
    $username= $_SESSION['username'];
    if(isset($_POST["logout"]))
    {
        header("location: logout.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ADMIN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <div>
            Welcome to the admin page!.
        </div>
        
        <form method= "POST" action="admin.php">
            <input type="submit" name="logout" value="Logout">
        </form>
       
   
</body>
</html>
