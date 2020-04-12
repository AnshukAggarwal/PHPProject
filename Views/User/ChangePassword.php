<?php
$msg="You’ve come to the right place to reset a forgotten password. Please enter and confirm your password and click on reset.";
require_once '../../Models/Users.php';
$user = new Users();
if(empty($_GET['id']) && empty($_GET['code']))
{
    header('location:Login.php');
}
if(isset($_POST['btn-reset']))
{
    $id = base64_decode($_GET['id']);
    $activation_code = $_GET['code'];
    $password  = $_POST['password'];
    $stmt = $user->query("UPDATE Users SET password=:password WHERE user_id=:user_id");
    $stmt->execute(array(":password"=>$password,":user_id"=>$id));
    $msg = "Password succesfuly chnaged";
    header("refresh:5;Login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Jobportal - Reset- Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Styles/Style_LoginRegister.css">
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
                    <form class="form-signin" method="post">
                        <div class='alert alert-info'>
                            <?php print_r($msg); ?>
                        </div>
                        <div class="form-label-group">
                            <label for="Password">Password</label>
                            <input type="password" id="Password" class="form-control" name="password" required autofocus>
                        </div>
                        <div class="form-label-group">
                            <label for="Password">Password</label>
                            <input type="password" id="CPassword" class="form-control" name="cpassword" required autofocus>
                        </div>
                        <div>
                            <p></p>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary text-uppercase" type="submit" name="btn-reset">reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../../Includes/footer.php';?>
</body>
</html>