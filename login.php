<?php
/* SQL INJECTION ' or 1=1 -- (space)*/

    require_once 'user_model.php';// file vetayne vane tala ko code run hudaina/// include_once ma run huncha 
    session_start();
   
    if(isset($_POST['login_button'])) 
    {     // LOGIN button pressed or not
        $username=$_POST['username'];
        $password=$_POST['password'];

        if($username !=NULL && $password != NULL)   //user and password validation
        {
            $user_model=new UserModel();
            if($user_model->login($username,$password))
            {
                $_SESSION['username']=$username;
                $_SESSION['active'] = 1; //admin is logged in
                header('Location: admin.php');
            }
            else
            {
                $error_msg= "Wrong attempt! probably not an Admin.";
            }
        }
        else{
            $error_msg="Input username and password.";
        }
    }      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <fieldset>
    <legend>LOGIN</legend>
    <div class="login_form">
        
        <form method="POST" action="login.php">
            <label>
                Username: <input type="text" name="username" value="<?php if(isset($username)) echo $username ;?>"> 
            </label>
            <label>
                Password: <input type="text" name="password"> 
            </label>
            <input type="submit" name="login_button" value="Login">
        </form>
    </div>
    </fieldset>
    <div>
        <button><a href="user-new.php">Register</a></button>
    </div>
    <?php if(isset($error_msg)):?>
        <p><?php echo $error_msg;?></p>
    <?php endif; ?>
</body>
</html>
