<?php
require_once '../../Database/Database.php';
require_once '../../Models/WebsiteReview.php';
require_once '../../Models/Users.php';
if(isset($_POST['view'])) {
    $id = $_POST['viewreview'];
    $db = Database::getDb();
    $r = new WebsiteReview();
    $selectedReview = $r->ViewReviewByid($db, $id);
    $user_id=$selectedReview->user_id;
    $user = new Users();
    $u = $user->findUser($db,$user_id);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>View Review</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Styles/Style_Admin_Job_Poster.css">
</head>
<body>
<main>
    <h1>The details of the review you selected are as follows</h1>
    <section id="review_details">
        <div class="form-group">
            Comments: <?= $selectedReview->comments;?>
        </div>
        <div class="form-group">
            Date: <?= $selectedReview->date;?>
        </div>
        <div class="form-group">
            User: <?= $u->user_name;?>
        </div>
    </section>
    <span>
        <form method="post" action="UpdateWebsiteReview.php">
            <input type="hidden" name="updatereview" value="<?=$id; ?>"/>
            <input type="submit" name="update" class="btn btn-secondary" value="Update"/>
        </form>
        <form method="post" action="DeleteWebsiteReview.php">
            <input type="hidden" name="deletereview" value="<?=$id; ?>"/>
            <input type="submit" name="delete" class="btn btn-danger" value="Delete"/>
        </form>
    </span>
</main>
</body>
</html>

