<?php

class Company{

    public function addCompanyProfile($db,$user_id,$name,$description,$head_office,$lob,$website,$employees){
        //query
        $query= "INSERT INTO Company (name,user_id,description,head_office,lob,website,employees) values (:name,:user_id,:description,:head_office, :lob, :website, :employees)";
        //prepare, execute &bind
        $pdostm=$db->prepare($query);

        $pdostm->bindParam(':name',$name);
        $pdostm->bindParam(':user_id',$user_id);
        $pdostm->bindParam(':description',$description);
        $pdostm->bindParam(':head_office',$head_office);
        $pdostm->bindParam(':lob',$lob);
        $pdostm->bindParam(':website',$website);
        $pdostm->bindParam(':employees',$employees);

        $count=$pdostm->execute();
        return $count;
    }

    public function listProfiles($db,$searchkey=null){
        $query = "SELECT * FROM Company WHERE name LIKE '%$searchkey%'";
        $pdostm=$db->prepare($query);
        $pdostm->execute();
        $results=$pdostm->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }

    public function showProfile($db, $user_id){
        $query= "SELECT * FROM Company WHERE user_id=:user_id";
        $pdostm=$db->prepare($query);
        $pdostm->bindParam(':user_id',$user_id);
        $pdostm->execute();
        $results=$pdostm->fetch(PDO::FETCH_OBJ);
        return $results;
    }

    public function updateProfile($name,$description,$head_office,$lob,$website,$employees,$id,$db,$status){
        $query= "UPDATE Company set name=:name, description=:description, head_office= :head_office,
                 lob=:lob, website=:website, employees=:employees, status=:status WHERE id=:id";
        $pst= $db->prepare($query);
        $pst->bindParam(':description', $description);
        $pst->bindParam(':name', $name);
        $pst->bindParam(':head_office', $head_office);
        $pst->bindParam(':lob', $lob);
        $pst->bindParam(':website', $website);
        $pst->bindParam(':employees', $employees);
        $pst->bindParam(':id', $id);
        $pst->bindParam(':status', $status);

        $count= $pst->execute();
        return $count;
    }

    public function deleteProfile($id,$db){
        $query="UPDATE Company set status=0 WHERE id=:id";
        $pst= $db->prepare($query);
        $pst->bindParam(':id',$id);
        $count=$pst->execute();
        return $count;
    }

    //function to find similar companies
    public function findSimilarCompanies($db,$lob,$id){
        $query= "SELECT * FROM Company where lob=:lob and id!=:id";
        $pst= $db->prepare($query);
        $pst->bindParam(':lob',$lob);
        $pst->bindParam(':id',$id);
        $pst->execute();
        $results=$pst->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }

}
