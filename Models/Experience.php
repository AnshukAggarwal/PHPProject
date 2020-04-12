<?php
require_once '../../Database/Database.php';
class Experience
{

    public function GetExperience($user_id)
    {
        $dbcon = Database::getDb();
        $stmt =$dbcon->prepare("SELECT * FROM experience WHERE user_id=:user_id");
        $stmt->execute(array(":user_id"=>$user_id));
        $expDetails=$stmt->fetchAll();
        return $expDetails;
    }
    public function AddExperience($user_id,$jobTitle,$orgName,$city,$country,$isCurrentJob,$startDate,$endDate)
    {
        $dbcon = Database::getDb();
        $stmt = $dbcon->prepare("INSERT INTO experience (user_id,job_title,company_name,city,country,is_current_job,start_date,end_date) VALUES( :user_id,:job_title,:company_name,:city,:country,:is_current_job,:start_date,:end_date)");
        $stmt->bindparam("user_id",$user_id);
        $stmt->bindparam("job_title",$jobTitle);
        $stmt->bindparam("company_name",$orgName);
        $stmt->bindparam("city",$city);
        $stmt->bindparam("country",$country);
        $stmt->bindparam("is_current_job",$isCurrentJob);
        $stmt->bindparam("start_date",$startDate);
        $stmt->bindparam("end_date",$endDate);
        $stmt->execute();
    }
    public function GetExperienceById($experience_id)
    {
        $dbcon = Database::getDb();
        $stmt = $dbcon->prepare("SELECT * FROM experience WHERE experience_id=:id");
        $stmt->execute(array(":id"=>$experience_id));
        $educationDetails=$stmt->fetch(PDO::FETCH_ASSOC);
        return $educationDetails;
    }
    public function UpdateExperience($experience_id,$jobTitle,$orgName,$city,$country,$isCurrentJob,$startDate,$endDate)
    {
        $dbcon = Database::getDb();
        $stmt = $dbcon->prepare(" UPDATE experience SET job_title =:job_title,company_name =:company_name,city =:city,country =:country,is_current_job =:is_current_job,start_date =:start_date,end_date =:end_date WHERE experience_id=:experience_id");
        $stmt->bindparam("experience_id",$experience_id);
        $stmt->bindparam("job_title",$jobTitle);
        $stmt->bindparam("company_name",$orgName);
        $stmt->bindparam("city",$city);
        $stmt->bindparam("country",$country);
        $stmt->bindparam("is_current_job",$isCurrentJob);
        $stmt->bindparam("start_date",$startDate);
        $stmt->bindparam("end_date",$endDate);
        $stmt->execute();
    }
    public function DeleteExperience($experience_id)
    {
        $dbcon = Database::getDb();
        $stmt = $dbcon->prepare("DELETE FROM experience WHERE experience_id=:experience_id ");
        $stmt->bindparam(":experience_id",$experience_id);
        $stmt->execute();
        return $stmt;
    }
}