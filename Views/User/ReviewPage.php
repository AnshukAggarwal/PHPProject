<html>
    <head>
        <?php
        session_start();
        $userid = $_SESSION['userid'] = 1;
        ?>
        <title>
            Job Portal
        </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Styles/Style_CompanyReviews.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../../Scripts/Script_Index_Search.js"></script>
        <style>
            .checked {
                 color: orange;
            }
        </style>
    </head>
    <body>
    <?php
        include '../../Includes/header.php';
        require '../../Database/Database.php';
        require '../../Models/Reviews.php';
        $companyid = $_GET['id'];
        
        $dbcon = Database::getDb();
        $reviews = new reviews();
        $company = $reviews->searchcompanybyid($dbcon, $companyid);
        $datas = $reviews->viewreviewbycompany($dbcon, $companyid);
        
    ?>
        <main id="main">
            <h1 style="text-align: center;">Company review</h1>
            <?php 
                foreach($company as $comp)
            { 
            ?>
            <h2 class="shift"><?= $comp[1]; ?></h2>
            <h3 class="shift"><?= $comp[2]; ?></h3>
            <form action="WriteReview.php" method="post">
                <input type="hidden" name="companyid" value="<?= $companyid?>" />
                <input type="submit" name="wreview" value="Write a review" class="btn btn-primary" id="btnwritereview"/>
            </form>
            <?php
            }
            ?>
               
                <?php 
                if($datas == NULL)
                {
                    echo '<h4 class="shift" style="color:orange;">There are no reviews for this company</h4>';
                } else {
                    echo '<h4 class="shift">Reviews:</h4>';
                }
                foreach($datas as $data)
            { 
            ?>
                <div class="displayreview">
                    <p style="font-weight:bold;"><?= $data[1]; ?></p>
                    <p class="shift"><?= $data[2]; ?></p>
                    <p class="shift">
                    <?php 
                        $rate = $data[7];
                        if($rate == 1)
                        {
                    ?>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    <?php
                        }
                        elseif($rate == 2)
                        {
                            ?>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <?php
                        }
                        elseif ($rate == 3) {
                            ?>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <?php   
                        }
                        elseif($rate == 4)
                        {
                            ?>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <?php
                        }
                        elseif($rate == 5)
                        {
                        ?>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <?php
                        }
                    ?>
                    </p>
                    <p class="shift">Pros:<?= $data[3]; ?></p>
                    <p class="shift" style="display: inline">Cons:<?= $data[4];  ?></p>
                    <?php
                          if($userid == $data[9]) 
                          {
                    ?>
                    <a class="shift" href="UpdateReview.php?id=<?= $data[0] ?>">Edit </a>/<a href="DeleteReviews.php?id=<?= $data[0] ?>"> Delete</a>
                    <?php
                          }
                    ?>
                    
                </div>
                
            <?php
            }
            ?>
            
        </main>
    <?php include '../../Includes/footer.php';?>
    </body>
</html>
