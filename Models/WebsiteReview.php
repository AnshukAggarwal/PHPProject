<?php

Class WebsiteReview{

    //function to list 5 reviews on Index.php
    public function List5Reviews($db){
        $query = "SELECT * FROM websitereviews LIMIT 5";
        $pdostm=$db->prepare($query);
        $pdostm->execute();
        $results=$pdostm->fetchAll(PDO::FETCH_OBJ);
        return $results;

    }

    //function to list all review (for Admin)
    public function ListReviews($db){
        $query = "SELECT * FROM websitereviews";
        $pdostm=$db->prepare($query);
        $pdostm->execute();
        $results=$pdostm->fetchAll(PDO::FETCH_OBJ);
        return $results;

    }
    //function to insert a review into DB
    public function AddReview($db,$comments,$user_id){
        $query= "INSERT into websitereviews (comments,user_id) values (:comments,:user_id)";
        $pdostm= $db->prepare($query);
        $pdostm->bindParam(':comments',$comments);
        $pdostm->bindParam(':user_id',$user_id);
        return $pdostm->execute();

    }
    //function to view reviews of a specific user
    public function ViewReviewByUserid($db,$user_id){
        $query= "SELECT * FROM websitereviews where user_id=:user_id";
        $pdostm=$db->prepare($query);
        $pdostm->bindParam(':user_id',$user_id);
        $pdostm->execute();
        $results=$pdostm->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
    //function to view a particular review by it's id. To be used for admin as well
    public function ViewReviewByid($db,$id){
        $query= "SELECT * FROM websitereviews where id=:id";
        $pdostm=$db->prepare($query);
        $pdostm->bindParam(':id',$id);
        $pdostm->execute();
        $results=$pdostm->fetch(PDO::FETCH_OBJ);
        return $results;
    }
    //function to update a review. To be used for admin as well
    public function UpdateReview($db,$comments,$id){
        $query= "UPDATE websitereviews set comments=:comments WHERE id=:id";
        $pdostm=$db->prepare($query);
        $pdostm->bindParam(':comments',$comments);
        $pdostm->bindParam(':id',$id);
        return $pdostm->execute();

    }
    //function to delete a review. To be used for admin as well.
    public function DeleteReview($db,$id){
        $query="DELETE FROM websitereviews where id=:id";
        $pdostm=$db->prepare($query);
        $pdostm->bindParam(':id',$id);
        return $pdostm->execute();
    }

}
