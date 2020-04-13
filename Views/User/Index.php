<?php
session_start();
require_once '../../Database/Database.php';
require_once '../../Models/WebsiteReview.php';
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
    <link rel="stylesheet" href="../../Styles/Style_Header_Footer.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../Scripts/Script_Index_Search.js"></script>
    <script src="../../Scripts/Script_Header_Footer.js"></script>
</head>
<body>
<?php include '../../Includes/header.php';?>
<main id="main">
    <?php
    if(isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] == "employer") {
            echo "<a href=\"CreateJob.php\" class=\"btn btn-primary\" id=\"newJob\">Add New Job</a>";
            echo "<a href=\"ViewCompanyProfile.php\" class=\"btn btn-primary\" id=\"viewprofile\">View Profile</a>";
        }
        if ($_SESSION['user_role'] == "user") {
            echo "<a href=\"UserProfile.php\" class=\"btn btn-primary\" id=\"viewprofile\">View Profile</a>";
        }
    }
    ?>
    <section id="section1">
        <h1 id="heading">Find your dream job</h1>
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
    <!--Anshuk Start-->
    <section id="website_reviews">
        <div id="reviews_header">
            <h2>What people say about us</h2>
            <a href="WriteWebsiteReview.php" class="btn btn-primary">Write a Review</a>
        </div>
        <section id="selected_reviews">
            <?php  foreach ($reviews as $r) { ?>
                <div class="reviews_to_show">
                    <p><?php echo $r->comments;?></p>
                    <h6><?php echo $r->date;?></h6>
                </div>
            <?php } ?>
        </section>
    </section>
    <!-- Anshuk End-->
</main>
<?php include '../../Includes/footer.php';?>
</body>

</html>
