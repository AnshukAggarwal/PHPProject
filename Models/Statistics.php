<?php

class Statistics
{
    function viewall($db)
    {
        $query = "SELECT * FROM statistics INNER JOIN company ON statistics.companyid = company.id ORDER BY RAND() LIMIT 4";
        $pdostm = $db->prepare($query);
        $pdostm->execute();

        $results = $pdostm->fetchAll(PDO::FETCH_NUM);
        return $results;
    }
    function searchposition($db,$searchkey)
    {
        $query = "SELECT * FROM statistics INNER JOIN company ON statistics.companyid = company.id where statistics.position = :search";
        $pdostm = $db->prepare($query);
        $pdostm->bindParam(":search",$searchkey);
        $pdostm->execute();

        $results = $pdostm->fetchAll(PDO::FETCH_NUM);
        return $results;
    }
    function allposition($db,$companyid)
    {
        $query = "SELECT * FROM statistics where companyid = :companyid";
        $pdostm = $db->prepare($query);
        $pdostm->bindParam(":companyid",$companyid);
        $pdostm->execute();

        $results = $pdostm->fetchAll(PDO::FETCH_NUM);
        return $results;
    }
    function addposition($db,$position,$wages,$companyid)
    {
        $query = "INSERT INTO statistics (companyid,position,wages) VALUES(:companyid,:position,:wages)";
        $pdostm = $db->prepare($query);
        $pdostm->bindParam(':companyid',$companyid);
        $pdostm->bindParam(':position',$position);
        $pdostm->bindParam(':wages',$wages);
        $pdostm->execute();
    }
    function updateposition($db,$position,$wages,$positionid)
    {
        $query = "Update statistics SET position = :position,wages = :wages where statisticsid = :postid";
        $pdostm = $db->prepare($query);
        $pdostm->bindParam(':position',$position);
        $pdostm->bindParam(':wages',$wages);
        $pdostm->bindParam(':postid',$positionid);
        $pdostm->execute();
        header("location:ViewMyPosition.php");
    }
    function searchpositionbyid($db,$positionid)
    {
        $query = "SELECT * FROM statistics where statisticsid = :postid";
        $pdostm = $db->prepare($query);
        $pdostm->bindParam(":postid",$positionid);
        $pdostm->execute();

        $results = $pdostm->fetchAll(PDO::FETCH_NUM);
        return $results;
    }
    function deleteposition($db,$postid)
        {
            $query = "delete from statistics where statisticsid = :postid";
            $pdostm = $db->prepare($query);
            $pdostm->bindParam(':postid',$postid);
            $pdostm->execute();
            header("location:ViewMyPosition.php");
        }
}

