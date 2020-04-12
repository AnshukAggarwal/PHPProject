<?php
    class reviews
    {
        function viewall($db)
        {
            $query = "SELECT * FROM Company limit 4";
            $pdostm = $db->prepare($query);
            $pdostm->execute();

            $results = $pdostm->fetchAll(PDO::FETCH_NUM);
            return $results;
        }
        function searchcompany($db,$companyname)
        {
            $query = "SELECT * FROM Company where name = :cname";
            $pdostm = $db->prepare($query);
            $pdostm->bindParam(":cname",$companyname);
            $pdostm->execute();

            $results = $pdostm->fetchAll(PDO::FETCH_NUM);
            return $results;
            
        }
        function addreview($db,$rate,$summary,$review,$pros,$cons,$jobtitle,$joblocation,$compid,$userid)
        {
            
            $query= "INSERT INTO Reviews (company_review_summary,company_review,pros,cons,job_title,job_location,company_rating,company_id,user_id) VALUES(:summary, :review, :pros, :cons, :jobtitle, :joblocation, :rate, :compid, :userid);";
            $stmt=$db->prepare($query);
            $stmt->bindParam(':summary',$summary);
            $stmt->bindParam(':review',$review);
            $stmt->bindParam(':pros',$pros);
            $stmt->bindParam(':cons',$cons);
            $stmt->bindParam(':jobtitle',$jobtitle);
            $stmt->bindParam(':joblocation',$joblocation);
            $stmt->bindParam(':rate', $rate);
            $stmt->bindParam(':compid',$compid);
            $stmt->bindParam(':userid',$userid);
            $stmt->execute();
            
        }
        function viewreviewbycompany($db,$companyid)
        {
            $query = "SELECT * FROM Reviews where company_id = :cid";
            $pdostm = $db->prepare($query);
            $pdostm->bindParam(":cid",$companyid);
            $pdostm->execute();
            $results = $pdostm->fetchAll(PDO::FETCH_NUM);
            return $results;
            
        }
        function searchcompanybyid($db,$companyid)
        {
            $query = "SELECT * FROM Company where id = :cid";
            $pdostm = $db->prepare($query);
            $pdostm->bindParam(":cid",$companyid);
            $pdostm->execute();

            $results = $pdostm->fetchAll(PDO::FETCH_NUM);
            return $results;
            
        }
        function searchreviewbyid($db,$rid)
        {
            $query = "SELECT * FROM Reviews where company_review_id = :rid";
            $pdostm = $db->prepare($query);
            $pdostm->bindParam(":rid",$rid);
            $pdostm->execute();

            $results = $pdostm->fetchAll(PDO::FETCH_NUM);
            return $results;
        }
        function updatereview($db,$rate,$summary,$review,$pros,$cons,$jobtitle,$joblocation,$id)
        {
            $query= 'update Reviews set company_review_summary=:summary,company_review=:review,pros=:pros,cons=:cons,job_title=:jobtitle,job_location=:joblocation,company_rating=:rate where company_review_id=:id';
            $stmt=$db->prepare($query);
            $stmt->bindParam(':summary',$summary);
            $stmt->bindParam(':review',$review);
            $stmt->bindParam(':pros',$pros);
            $stmt->bindParam(':cons',$cons);
            $stmt->bindParam(':jobtitle',$jobtitle);
            $stmt->bindParam(':joblocation',$joblocation);
            $stmt->bindParam(':rate',$rate);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            header("location:CompanyReviews.php");
        }
        function viewallreviews($db,$offset)
        {
            $query = "SELECT * FROM Reviews INNER JOIN Company ON Company.id = Reviews.company_review_id LIMIT ".$offset.",10 ";
            $pdostm = $db->prepare($query);
            //$pdostm->bindParam(':offset',$offset);
            $pdostm->execute();

            $results = $pdostm->fetchAll(PDO::FETCH_NUM);

            return $results;
            
        }
        function totalreviews($db)
        {
            $query = "SELECT * FROM Reviews";
            $pdostm = $db->prepare($query);
            $pdostm->execute();
            $count = $pdostm->rowCount();
            $results = $pdostm->fetchAll(PDO::FETCH_NUM);
           
            return $count;
            
        }
        function deletereviews($db,$reviewid)
        {
            $query = "delete from Reviews where company_review_id = :id";
            $pdostm = $db->prepare($query);
            $pdostm->bindParam(':id',$reviewid);
            $pdostm->execute();
            header("location:CompanyReviews.php");
        }
    }