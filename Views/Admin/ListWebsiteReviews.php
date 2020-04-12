<?php
require_once '../../Database/Database.php';
require_once '../../Models/WebsiteReview.php';
$db= Database::getDb();
$r=new WebsiteReview();
$reviews=$r->ListReviews($db);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>List Of Website Reviews</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../../Styles/Style_Admin_Job_Poster.css" rel="stylesheet">
</head>
<body>
<main>
    <h1>List Of Website Reviews</h1>
    <section class="flex_container">
        <?php foreach ($reviews as $review) {?>
        <section id="results" class="flex">
            <section id="comments">
                <?=$review->comments;?>
            </section>
            <section id="actions">
                <form method="post" action="ViewWebsiteReview.php">
                    <input type="hidden" name="viewreview" value="<?=$review->id;?>"/>
                    <input type="submit" name="view" class="btn btn-info" value="View"/>
                </form>
                <form method="post" action="UpdateWebsiteReview.php">
                    <input type="hidden" name="updatereview" value="<?=$review->id;?>"/>
                    <input type="submit" name="update" class="btn btn-secondary" value="Update"/>
                </form>
                <form method="post" action="DeleteWebsiteReview.php">
                    <input type="hidden" name="deletereview" value="<?=$review->id;?>"/>
                    <input type="submit" name="delete" class="btn btn-danger" value="Delete"/>
                </form>
            </section>

        </section>
        <?php } ?>
    </section>


</main>

<footer id="footer">
    <p>This website is for educational purposes only.</p>
</footer>
</body>
</html>
