<?php
require_once '../../Database/Database.php';
class Education
{

    public function GetEducation($user_id)
    {
        $dbcon = Database::getDb();
        $stmt =$dbcon->prepare("SELECT * FROM education WHERE user_id=:user_id");
        $stmt->execute(array(":user_id"=>$user_id));
        $educationDetails=$stmt->fetchAll();
        return $educationDetails;
    }
    public function AddEducation($user_id,$certName,$courseName,$instName,$city,$country,$startDate,$endDate)
    {
        $dbcon = Database::getDb();
        $stmt = $dbcon->prepare("INSERT INTO education (user_id,certificate_name,course_name,institute,city,country,start_date,end_date) VALUES( :user_id,:certificate_name,:course_name,:institute,:city,:country,:start_date,:end_date)");
        $stmt->bindparam("user_id",$user_id);
        $stmt->bindparam("certificate_name",$certName);
        $stmt->bindparam("course_name",$courseName);
        $stmt->bindparam("institute",$instName);
        $stmt->bindparam("city",$city);
        $stmt->bindparam("country",$country);
        $stmt->bindparam("start_date",$startDate);
        $stmt->bindparam("end_date",$endDate);
        $stmt->execute();
    }
    public function DeleteEducation($education_id)
    {
        $dbcon = Database::getDb();
        $stmt = $dbcon->prepare("DELETE FROM education WHERE education_id=:education_id ");
        $stmt->bindparam(":education_id",$education_id);
        $stmt->execute();
        return $stmt;
    }
    public function GetEducationById($education_id)
    {
        $dbcon = Database::getDb();
        $stmt = $dbcon->prepare("SELECT * FROM education WHERE education_id=:education_id");
        $stmt->execute(array(":education_id"=>$education_id));
        $educationDetails=$stmt->fetch(PDO::FETCH_ASSOC);
        return $educationDetails;
    }

    public function UpdateEducation($education_id,$certName,$courseName,$instName,$city,$country,$startDate,$endDate)
    {
        $dbcon = Database::getDb();
        $stmt = $dbcon->prepare("UPDATE education SET certificate_name=:certificate_name, course_name =:course_name,institute =:institute,city =:city,country=:country,start_date=:start_date,end_date=:end_date WHERE education_id =:education_id");
        $stmt->bindparam("education_id",$education_id);
        $stmt->bindparam("certificate_name",$certName);
        $stmt->bindparam("course_name",$courseName);
        $stmt->bindparam("institute",$instName);
        $stmt->bindparam("city",$city);
        $stmt->bindparam("country",$country);
        $stmt->bindparam("start_date",$startDate);
        $stmt->bindparam("end_date",$endDate);
        $stmt->execute();
    }
}