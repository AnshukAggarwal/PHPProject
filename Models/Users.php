<?php
require_once '../../Database/Database.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Users
{
    //function to prepare and exceute an SQL query
    public function query($sql)
    {
        $dbcon = Database::getDb();
        $stmt=$dbcon->prepare($sql);
        return $stmt;
    }
    //function to get a user by id
    public function findUser($db,$userid){
        $query= "SELECT * from users where user_id=:userid";
        $pdostm=$db->prepare($query);
        $pdostm->bindParam(':userid',$userid);
        $pdostm->execute();
        return $results=$pdostm->fetch(PDO::FETCH_OBJ);
    }
    //Function to fetch last inserted ID from the database
    public function lastId()
    {
        $dbcon = Database::getDb();
        $stmt=$dbcon->lastInsertId();
        return $stmt;
    }
    //function for Registration
    public function register($user_username,$user_email,$user_password,$user_role,$user_activation_code)
    {
        try
        {
            $dbcon = Database::getDb();
            $password_hash=password_hash($user_password,PASSWORD_BCRYPT);
            $stmt=$dbcon->prepare("INSERT INTO Users(user_name,user_email,user_password,user_role,activation_code) VALUES(:username, :email, :password, :role, :activation_code)");
            $stmt->bindparam("username",$user_username);
            $stmt->bindparam("email",$user_email);
            $stmt->bindparam("password",$password_hash);
            $stmt->bindparam("role",$user_role);
            $stmt->bindparam("activation_code",$user_activation_code);
            $stmt->execute();
            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    //function to send verification email
    function verification_mail($user_email,$message,$subject)
    {
        require 'phpmailer/vendor/autoload.php';
        $mail=new PHPMailer(true);
        $mail->IsSMTP();
        //$mail->SMTPDebug  = 0;
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = "tls";
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->SMTPOptions=array(
            'ssl'=>array(
                'verify_peer'=>false,
                'verify_peer_name'=>false,
                'allow_self_signed'=>true
            )
        );
        //print_r($user_email);
        $mail->AddAddress($user_email);
        $mail->Username="jobportal.brogrammers@gmail.com";
        $mail->Password="Jobportal@123";
        $mail->SetFrom('jobportal.brogrammers@gmail.com','Admin@jobportal.brogrammers');
        $mail->Subject    = $subject;
        $mail->MsgHTML($message);
        $mail->Send();
    }
// login function
    public function login($user_email,$user_password)
    {
            $dbcon = Database::getDb();
            $stmt = $dbcon->prepare("SELECT * FROM Users WHERE user_email=:email");
            $stmt->execute(array(":email"=>$user_email));
            $user=$stmt->fetch(PDO::FETCH_ASSOC);
            if($stmt->rowCount() == 1)
            {
                if($user['account_status']=="ACTIVE")
                {
                    $stored_password=$user['user_password'];
                    if($user_password==$stored_password)
                    {
                        error_log("Entered password");
                        $_SESSION['user_role']=$user['user_role'];
                        $_SESSION['user_id']=$user['user_id'];
                        $_SESSION['user_email'] = $user['user_email'];
                        return true;
                    }
                    else
                    {   $msg="Invalid Password";
                        header("Location: Login.php?msg=$msg");
                        exit;
                    }
                }
                else
                {
                    $msg="Account not activated please check your email and activate ";
                    header("Location: Login.php?msg=$msg");
                    exit;
                }
            }
            else
            {
                $msg="email id not found";
                header("Location: Login.php?msg=$msg");
                exit;
            }
    }
    //check profile status
    public function ProfileStatus($user_id)
    {
        $dbcon = Database::getDb();
        $stmt =$dbcon->prepare("SELECT profile_status FROM users WHERE user_id=:user_id");
        $stmt->execute(array(":user_id"=>$user_id));
        $status=$stmt->fetch(PDO::FETCH_ASSOC);
        return $status;

    }
    //update profile status
    public function ChangeStatus($user_id,$status)
    {
        $dbcon = Database::getDb();
        $stmt =$dbcon->prepare("UPDATE  users SET  profile_status =:status  WHERE user_id=:user_id");
        $stmt->bindparam("user_id",$user_id);
        $stmt->bindparam("status",$status);
        $stmt->execute();
        return $stmt;
    }
}
