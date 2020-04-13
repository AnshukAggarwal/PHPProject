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
    if (isset($_POST['write_review'])) {
        if ($_POST['user_review'] == "") {
            $error = "Please add a comment";
        } else {
            $user_id = $_SESSION['user_id'];
            $db = Database::getDb();
            $review = new WebsiteReview();
            $comments = $_POST['user_review'];
            $newReview = $review->AddReview($db, $comments, $user_id);
            header('location:ViewWebsiteReview.php');
        }
    }
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

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="../../Styles/Style_Index_Search.css">
    <link rel="stylesheet" href="../../Styles/Style_Header_Footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../Scripts/Script_Index_Search.js"></script>
</head>

<body>
<?php include '../../Includes/AfterLoginHeader.php';?>
<main class="container bootstrap snippet">
    <h1>Write a review for The Job Portal</h1>
    <form method="post" action="WriteWebsiteReview.php">
        <div class="form-group">
            <label for="user_review">Comments:</label>
            <textarea rows="1" cols="60" id="user_review" class="form-control" name="user_review"></textarea>
            <div><?php if(isset($error)){echo $error;}?></div>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" class="form-control" name="write_review" value="Submit"/>
        </div>
    </form>
</main>
<?php include '../../Includes/footer.php';?>
</body>

</html>

