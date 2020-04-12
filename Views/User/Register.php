<?php
session_start();
require_once '../../Models/Users.php';
$reg_user = new Users();

if(isset($_POST['btn_register']))
{
    //fetching and storing username from the user
    $user_username = trim($_POST['txt_username']);
    //fetching  and storing email from the user
    $user_email = trim($_POST['txt_email']);
    //fetching password from user and storing it
    $user_password = trim($_POST['txt_password']);
    $user_role=$_POST['role'];
    //random unique key to be used an activation code.
    $user_activation_code = md5(uniqid(rand()));
    $stmt = $reg_user->query("SELECT * FROM Users WHERE email=:email");
    $stmt->execute(array(":email"=>$user_email));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    //fetching emails and if the row count is greater than 0 it means that user email already exists
    if($stmt->rowCount() > 0)
    {
        $msg = " email already exists, Try sign in or reset password";
    }
    else
    {
        //calling register function from users class
        if($reg_user->register($user_username,$user_email,$user_password,$user_role,$user_activation_code))
        {
            //fetching and storing last inserted id from database
            $id = $reg_user->lastId();//fetching the last inserted id from database
            //encrypting id and storing it
            $encrypted_key = base64_encode($id);//encoding the last inserted id
            //storing the encrypted key back to id
            $id = $encrypted_key;//storing encoded value into id again
            //message body fro the email
            $message = "Hello $user_username,<a href='https://arunswaminathanr.com/PHP/Project/Views/User/ActivateUser.php?id=$id&code=$user_activation_code'>click here</a>";
            //subject for the email
            $subject = "Activate Account";
            //calling verification_email function in users class
            $reg_user->verification_mail($user_email,$message,$subject);
            //message displayed upon successful registration
            $msg = "Registration successful please check email your mail to activate";
        }
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
                        <h5 class="card-title text-center">Register</h5>
                        <?php if(isset($msg)) echo $msg;  ?>
                        <form class="form-signin" method="post">
                            <div class="form-label">
                                <label for="username">Username</label>
                                <input type="text" id="username" class="form-control"  name="txt_username" required autofocus>
                            </div>
                            <div class="form-label">
                                <label for="Email">Email address</label>
                                <input type="email" id="Email" class="form-control" name="txt_email" required autofocus>
                            </div>
                            <div class="form-label">
                                <label for="Password">Password</label>
                                <input type="password" id="Password" class="form-control"  name="txt_password" required>
                            </div>
                            <div class="form-label">
                                <label for="cPassword"> Confirm Password</label>
                                <input type="password" id="CPassword" class="form-control"  required>
                            </div>
                            <div class="form-label-group">
                                <label for="role">Select list:</label>
                                <select class="form-control" name="role" >
                                    <option>employer</option>
                                    <option>user</option>
                                </select>
                            </div>
                            <div>
                                <p></p>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary  text-uppercase" type="submit" name="btn_register">Register</button>
                            </div>
                            <hr class="my-4">
                            <span>Already have an account? </span><span class="link"><a href="Login.php">Sign In</a></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include '../../Includes/footer.php';?>
</body>
</html>