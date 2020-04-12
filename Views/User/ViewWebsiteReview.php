<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}
$user_role=$_SESSION['user_role'];
if(isset($_SESSION['user_id']) && $user_role=="user") {
    require_once '../../Database/Database.php';
    require_once '../../Models/WebsiteReview.php';
    $review = new WebsiteReview();
    $db = Database::getDb();
    $user_id = $_SESSION['user_id'];
    $reviews = $review->ViewReviewByUserid($db, $user_id);
}else{
    header('location:login.php');

}

?>

<html>

<head>
    <title>
        Job Portal
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Styles/Style_Index_Search.css">
    <link rel="stylesheet" href="../../Styles/Style_Header_Footer.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../Scripts/Script_Index_Search.js"></script>
</head>

<body>
<?php include '../../Includes/AfterLoginHeader.php';?>
<main id="main_content">
    <h1>Reviews written by you</h1>
    <a href="WriteWebsiteReview.php">Write a Review</a>
    <?php foreach ($reviews as $review){ ?>
    <div class="reviews_to_show">
        <p><?php echo $review->comments;?></p>
        <h6><?php echo $review->date;?></h6>
        <div id="form_controls">
            <form method="post" action="EditWebsiteReview.php">
                <input type="hidden" name="id" value="<?= $review->id;?>">
                <input type="submit" class="btn btn-primary" name="edit" value="Edit"/>
            </form>
            <form method="post" action="DeleteWebsiteReview.php">
                <input type="hidden" name="id" value="<?= $review->id;?>">
                <input type="submit" class="btn btn-primary" name="delete" value="Delete"/>
            </form>
        </div>
    </div>
    <?php } ?>

</main>
<?php include '../../Includes/footer.php';?>
</body>

</html>


