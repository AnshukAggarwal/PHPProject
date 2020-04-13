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
    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $review = new WebsiteReview();
        $db = Database::getDb();
        $selectedReview = $review->ViewReviewByid($db, $id);
        $comments = $selectedReview->comments;
    }
}else{
    header('location:login.php');
}

if(isset($_POST['update_review'])){
    $id=$_POST['rid'];
    $comments=$_POST['comments'];
    $review= new WebsiteReview();
    $db= Database::getDb();
    $updateReview=$review->UpdateReview($db,$comments,$id);
    header('location:ViewWebsiteReview.php');
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
<main id="container bootstrap snippet">
    <a href="ViewWebsiteReview.php">Back to List</a>
    <form method="post" action="EditWebsiteReview.php">
        <input type="hidden" name="rid" value="<?= $id?>"/>
        <div class="form-group">
            <label for="comments">Comments:</label>
            <input type="text" class="form-control" name="comments" id="comments" value="<?= $comments; ?>">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="update_review" value="Update">
        </div>
    </form>

</main>
<?php include '../../Includes/footer.php';?>
</body>

</html>
