<?php
$msg="You’ve come to the right place to reset a forgotten password. Please enter your email address. You will receive a link to reset your password.";
session_start();
require_once '../../Models/Users.php';
$user = new Users();

if(isset($_POST['btn-submit']))
{
    $user_email = $_POST['txt_email'];
    $stmt = $user->query("SELECT user_id FROM users WHERE email=:email LIMIT 1");
    $stmt->execute(array(":email"=>$user_email));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($stmt->rowCount() == 1)
    {
        //encrypting user id so that it will not be visible in the link on the address broswer
        $id = base64_encode($row['user_id']);
        //creating unique key to be used as activation code
        $activation_code = md5(uniqid(rand()));
        $stmt = $user->query("UPDATE users SET activation_code=:activation_code WHERE email=:email");
        $stmt->execute(array(":activation_code"=>$activation_code,"email"=>$user_email));
        //message body  for the email
        $message= "Hello , $user_email <a href='https://arunswaminathanr.com/PHP/Project/Views/User/ActivateUser.php?id=$id&code=$activation_code'>click here to reset your password</a>";
        //subject for the email
        $subject = "Password Reset";
        //calling function verification_mail in users class
        $user->verification_mail($user_email,$message,$subject);
        $msg = "We've sent an email to $user_email.Please click on the password reset link in the email to generate new password. ";
    }
    else
    {
        $msg = "Email not found";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Job Portal-Register</title>
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
                            <label for="inputEmail">Email address</label>
                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address"  name="txt_email" required autofocus>
                        </div>
                        <div>
                            <p></p>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary btn-warning  text-uppercase" type="submit" name="btn-submit">Submit</button>
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
