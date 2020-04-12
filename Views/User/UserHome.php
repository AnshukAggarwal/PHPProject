<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}
require_once '../../Database/Database.php';
require_once '../../Models/WebsiteReview.php';
$user_email=$_SESSION['user_email'];
$db=Database::getDb();
$review = new WebsiteReview();
$reviews=$review->List5Reviews($db);

?>

<html>

<head>
    <title>
        Job Portal
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Styles/Style_Index_Search.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../Scripts/Script_Index_Search.js"></script>
</head>

<body>
<?php include '../../Includes/AfterLoginHeader.php';?>
<main id="main">
    <section id="section1">
        <h1>Find your dream job</h1>
        <h2>Discover thousands of jobs and reviews</h2>
        <form method="get" action="Search.php">
            <input type="text" name="search" id="search" placeholder="Enter Job title">
            <input type="submit" class="btn btn-primary" value="Find Jobs">
        </form>
    </section>
    <section id="section2">
        <article id="popularCompanies">
            <h1>Popular Companies</h1>
            <div class="card-deck">
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">Amazon</div>
                    <div class="card-body">
                        <h5 class="card-title">Reviews</h5>
                        <p class="card-text">1. Reviews for amazon</p>
                        <p class="card-text">2. Reviews for amazon</p>
                    </div>
                </div>
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">Amazon</div>
                    <div class="card-body">
                        <h5 class="card-title">Reviews</h5>
                        <p class="card-text">1. Reviews for amazon</p>
                        <p class="card-text">2. Reviews for amazon</p>
                    </div>
                </div>
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">Amazon</div>
                    <div class="card-body">
                        <h5 class="card-title">Reviews</h5>
                        <p class="card-text">1. Reviews for amazon</p>
                        <p class="card-text">2. Reviews for amazon</p>
                    </div>
                </div>
            </div>
            <div class="card-deck">
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">Amazon</div>
                    <div class="card-body">
                        <h5 class="card-title">Reviews</h5>
                        <p class="card-text">1. Reviews for amazon</p>
                        <p class="card-text">2. Reviews for amazon</p>
                    </div>
                </div>
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">Amazon</div>
                    <div class="card-body">
                        <h5 class="card-title">Reviews</h5>
                        <p class="card-text">1. Reviews for amazon</p>
                        <p class="card-text">2. Reviews for amazon</p>
                    </div>
                </div>
                <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                    <div class="card-header">Amazon</div>
                    <div class="card-body">
                        <h5 class="card-title">Reviews</h5>
                        <p class="card-text">1. Reviews for amazon</p>
                        <p class="card-text">2. Reviews for amazon</p>
                    </div>
                </div>
            </div>
        </article>
    </section>

</main>
<?php include '../../Includes/footer.php';?>
</body>

</html>
