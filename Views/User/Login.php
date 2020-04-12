<?php
session_start();
require_once '../../Models/Users.php';
if(empty($_GET['msg'])){
    $msg="";
}
else
{
    $msg=$_GET['msg'];
}
if(isset($_SESSION['user_id']))
{
    header("Location:Index.php");
}
$user_login = new Users();
$user="user";
$employer="employer";
if(isset($_POST['btn_signin']))
{   $msg=$_GET['msg'];
    $user_email = trim($_POST['txt_email']);
    $user_password = trim($_POST['txt_password']);
    if($user_login->login($user_email,$user_password))
    {
        $user_role=$_SESSION['user_role'];
        $user_id=$_SESSION['user_id'];
        $user_email=$_SESSION['user_email'];
        if($user_role==$user)
        {
            header('location:UserProfile.php');
        }
        else if($user_role=="admin")
        {

            header('location:../Admin/Index.php');
        }
        else
        {
            header('location:ViewCompanyProfile.php');
        }

    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Job Portal-Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Styles/Style_LoginRegister.css">
    <link rel="stylesheet" href="../../Styles/Style_Header_Footer.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../Scripts/Script_LoginRegister.js"></script>
</head>
<body>
    <?php include '../../Includes/header.php';?>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign In</h5>
                        <?php print_r('<div style="text-align: center; padding-bottom: 10px;">'.$msg.'</div>') ?>
                        <form class="form-signin" method="post">
                            <div class="form-label-group">
                                <label for="inputEmail">Email address</label>
                                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="txt_email" required autofocus>
                            </div>
                            <div class="form-label-group">
                                <label for="inputPassword">Password</label>
                                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="txt_password" required>
                            </div>
                            <div>
                                <p></p>
                            </div>
                            <div class="text-center">
                            <button class="btn  btn-primary  text-uppercase" type="submit" name="btn_signin">Sign in</button>
                            </div>
                            <div class="text-center">
                            <a href="ForgotPassword.php">Lost your password?</a>
                            </div>
                            <hr class="my-4">
                            <span>Dont have an account? </span><span class="link"><a href="Register.php">Register</a></span>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
        
    <?php include '../../Includes/footer.php';?>
</body>
</html>