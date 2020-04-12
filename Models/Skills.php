<?php
require_once '../../Database/Database.php';
class Skills
{

    public function GetSkills($user_id)
    {
        $dbcon = Database::getDb();
        $stmt = $dbcon->prepare("SELECT skill_title FROM skills WHERE user_id=:user_id");
        $stmt->execute(array(":user_id"=>$user_id));
        $skillDetails=$stmt->fetchAll();
        return $skillDetails;
    }
    public function AddSkill($user_id,$newSkill)
    {
        $dbcon = Database::getDb();
        $stmt=$dbcon->prepare("INSERT INTO skills(user_id,skill_title) VALUES(:user_id,:skill_title )");
        $stmt->bindparam("user_id",$user_id);
        $stmt->bindparam("skill_title",$newSkill);
        $stmt->execute();
        return $stmt;
    }
    public function DeleteSkill($user_id,$skill_title)
    {
        $dbcon = Database::getDb();
        $stmt = $dbcon->prepare("DELETE FROM skills WHERE user_id=:user_id AND skill_title =:skill_title");
        $stmt->bindparam(":user_id",$user_id);
        $stmt->bindparam(":skill_title",$skill_title);
        $stmt->execute();
        return $stmt;
    }
}