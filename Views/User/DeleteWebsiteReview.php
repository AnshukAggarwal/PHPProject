<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}
$user_role=$_SESSION['user_role'];
if(isset($_SESSION['user_id'])) {
    require_once '../../Database/Database.php';
    require_once '../../Models/WebsiteReview.php';
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $review = new WebsiteReview();
        $db = Database::getDb();
        $deletedReview = $review->DeleteReview($db, $id);
        header('location:ViewWebsiteReview.php');
    }
}
else{
    header('location:login.php');
}
