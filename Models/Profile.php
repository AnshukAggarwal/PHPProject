<?php
require_once '../../Database/Database.php';

class Profile
{

    public function GetPersonalDetails($user_id)
    {
        $dbcon = Database::getDb();
        $stmt = $dbcon->prepare("SELECT * FROM profile WHERE user_id=:user_id");
        $stmt->execute(array(":user_id"=>$user_id));
        $PersonalDetails=$stmt->fetch(PDO::FETCH_ASSOC);
        return $PersonalDetails;
    }
    public  function UpdateDetails($user_id,$userFname,$userLname,$dob,$designation,$phone,$address,$website)
    {
        $dbcon = Database::getDb();
        $stmt = $dbcon->prepare("  UPDATE profile SET first_name = :firstName, last_name =:lastName,date_of_birth=:dob,designation=:designation,phone=:phone,address=:address,website=:website  WHERE user_id=:user_id");
        $stmt->bindparam("user_id",$user_id);
        $stmt->bindparam("firstName",$userFname);
        $stmt->bindparam("lastName",$userLname);
        $stmt->bindparam("dob",$dob);
        $stmt->bindparam("designation",$designation);
        $stmt->bindparam("phone",$phone);
        $stmt->bindparam("address",$address);
        $stmt->bindparam("website",$website);
        $stmt->execute();
    }
    public  function AddDetails($user_id,$userFname,$userLname,$dob,$designation,$phone,$address,$website)
    {
        $dbcon = Database::getDb();
        $stmt = $dbcon->prepare("INSERT INTO profile (user_id,first_name,last_name,date_of_birth,designation,phone,address,website) VALUES( :user_id,:firstName, :lastName,:dob,:designation,:phone,:address,:website)");
        $stmt->bindparam("user_id",$user_id);
        $stmt->bindparam("firstName",$userFname);
        $stmt->bindparam("lastName",$userLname);
        $stmt->bindparam("dob",$dob);
        $stmt->bindparam("designation",$designation);
        $stmt->bindparam("phone",$phone);
        $stmt->bindparam("address",$address);
        $stmt->bindparam("website",$website);
        $stmt->execute();
    }

}