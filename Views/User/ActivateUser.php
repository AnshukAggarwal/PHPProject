<?php
require_once '../../Models/Users.php';
$user = new users();
//Prevents direct access to page
if(empty($_GET['id']) && empty($_GET['code']))
{
    header('location:Login.php');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
    $id = base64_decode($_GET['id']); //decoding the encrypted id
    $code = $_GET['code'];
    $active_status= "ACTIVE";
    $inactive_status = "INACTIVE";
    $stmt = $user->query("SELECT user_id,status FROM Users WHERE user_id=:user_id AND activation_code=:code LIMIT 1");
    $stmt->execute(array(":user_id"=>$id,":code"=>$code));
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) //checking if the user with 'id' and 'activation_code' combination exists
    {
        if($row['status']==$inactive_status) //checking if the user status is INACTIVE
        {
            $stmt = $user->query("UPDATE users SET status=:status WHERE user_id=:user_id");//Changing user status to ACTIVE
            $stmt->bindparam(":status",$active_status);
            $stmt->bindparam(":user_id",$id);
            $stmt->execute();
            $msg = "Account Activated: <a href='Login.php'>click here to login</a>";
        }
    }
    else
    {
        $msg = " Account not found : <a href='Register.php'>click here to register</a>";
    }
}

?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Job Portal-Login</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Styles/Style_LoginRegister.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../../Scripts/Script_LoginRegister.js"></script>
    </head>

    <body>
        <?php if(isset($msg)) { echo $msg; } ?>
    </body>

    </html>
