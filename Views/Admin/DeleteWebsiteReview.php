<?php
require_once '../../Database/Database.php';
require_once '../../Models/WebsiteReview.php';
if(isset($_POST['delete'])){
    $id=$_POST['deletereview'];
    $db= Database::getDb();
    $r=new WebsiteReview();
    $reviews=$r->DeleteReview($db,$id);
    header('location:ListWebsiteReviews.php');
}
