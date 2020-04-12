<?php
require_once '../../Database/Database.php';
require_once '../../Models/WebsiteReview.php';
if(isset($_POST['update'])){
    $id=$_POST['updatereview'];
    $db= Database::getDb();
    $r= new WebsiteReview();
    $currentReview= $r->ViewReviewByid($db,$id);
    $comments=$currentReview->comments;
    $date=$currentReview->date;
}
if(isset($_POST['updaterev'])){
    $id=$_POST['rid'];
    $comments=$_POST['comments'];
    $date=$_POST['date'];
    $db=Database::getDb();
    $r= new WebsiteReview();
    $updatedReview= $r->UpdateReview($db,$comments,$id);
    header('location:ListWebsiteReviews.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Website Reviews</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Styles/Style_Admin_Job_Poster.css">
</head>
<body>
<div>
    <form method="post" action="UpdateWebsiteReview.php">
        <input type="hidden" name="rid" value="<?= $id?>"/>
        <div class="form-group">
            <label for="comments">Comments:</label>
            <input type="text" class="form-control" name="comments" id="comments" value="<?=$comments;?>">
        </div>
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="text" class="form-control" name="date" id="date" value="<?=$date; ?>">
        </div>
        </div>
        <div class="form-group">
            <input type="submit" name="updaterev" class="btn btn-secondary" value="Update">
        </div>
    </form>
</div>

</body>

