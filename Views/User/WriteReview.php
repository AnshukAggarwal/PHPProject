<html>
    <head>
        <?php
           session_start();
           $userid = $_SESSION['userid'];
        ?>
        <title>
            Write a review
        </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Styles/Style_CompanyReviews.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../../Scripts/Script_Index_Search.js"></script>
    </head>
    <body>
        <?php
        include '../../Includes/header.php';
        require '../../Database/Database.php';
        require '../../Models/Reviews.php';
            if(isset($_POST['writereview']))
            {
                $compid = $_POST['compid'];
            }
            elseif(isset($_POST['wreview']))
            {
                $compid = $_POST['companyid'];
            }
            $rateerr = "";
            $summaryerr = "";
            $reviewerr = "";
            $proerr = "";
            $conerr = "";
            $jobtitleerr = "";
            $locationerr = "";
            $rate = "";
            $summary= "";
            $review = "";
            $pros = "";
            $cons = "";
            $jobtitle = "";
            $joblocation = "";
            if(isset($_POST['addreview']))
            {
                $counter=0;
                $rate = $_POST['rate'];
                $summary= $_POST['reviewsummary'];
                $review = $_POST['review'];
                $pros = $_POST['pros'];
                $cons = $_POST['cons'];
                $jobtitle = $_POST['jobtitle'];
                $joblocation = $_POST['joblocation'];
                $cid = $_POST['id'];
                
                if($rate == "" || $rate == null)
                {
                    $counter = 1;
                    $rateerr = "Please rate the company";
                }
                if($summary == "" || $summary == null)
                {
                    $counter = 1;
                    $summaryerr = "Please enter summary";
                }
                if($review == "" || $review == null)
                {
                    $counter = 1;
                    $reviewerr = "Please enter review";
                }
                if($pros == "" || $pros == null)
                {
                    $counter = 1;
                    $proerr = "Please enter pros";
                }
                if($cons == "" || $cons == null)
                {
                    $counter = 1;
                    $conerr = "Please enter cons";
                }
                if($jobtitle == "" || $jobtitle == null)
                {
                    $counter = 1;
                    $jobtitleerr = "Please enter job title";
                }
                if($joblocation == "" || $joblocation == null)
                {
                    $counter = 1;
                    $locationerr = "Please enter location";
                }
                if($counter==0)
                {
                    $dbcon = Database::getDb();
                    $addreview = new reviews();
                    $addreview->addreview($dbcon, $rate, $summary, $review, $pros, $cons, $jobtitle, $joblocation,$cid,$userid);
                    ?>   
                <script>
                    alert("Successfully added");
                </script>
                <?php
                            header("location:CompanyReviews.php");
                } 
               ?>

        <?php 
            }
        ?>
        <main id="main">
            <form method="post" action="#">
                <input type="hidden" name="id" value="<?= $compid; ?>" />
                <h1 style="text-align: center;">Write a Review</h1>
                <fieldset>
                    <legend>Rate this company</legend>
                    <div><label>Overall rating</label></div>
                    <div>
                        <div class="input-group-text" style="display: inline"><input type="radio" name="rate" value="1" <?php if($rate==1){ ?>checked <?php } ?>/><label>1</label></div>
                        <div class="input-group-text" style="display: inline"><input type="radio" name="rate" value="2" <?php if($rate==2){ ?>checked <?php } ?> /><label>2</label></div>
                        <div class="input-group-text" style="display: inline"><input type="radio" name="rate" value="3" <?php if($rate==3){ ?>checked <?php } ?> /><label>3</label></div>
                        <div class="input-group-text" style="display: inline"><input type="radio" name="rate" value="4" <?php if($rate==4){ ?>checked <?php } ?> /><label>4</label></div>
                        <div class="input-group-text" style="display: inline"><input type="radio" name="rate" value="5" <?php if($rate==5){ ?>checked <?php } ?> /><label>5</label></div>
                        <label><?= $rateerr ?></label>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Write your review</legend>

                    <table>
                        <tr>
                            <td><label>Review Summary</label></td>
                            <td><input type="text" class="form-control" name="reviewsummary" value="<?= $summary ?>"/></td>
                            <td><label><?= $summaryerr ?></label></td>
                        </tr>
                        <tr>
                            <td><label>Write your review</label></td>
                            <td><span class="input-group-text">Review</span><textarea name="review" class="form-control" cols="20" rows="5" ><?= $review ?></textarea></td>
                            <td><label><?= $reviewerr ?></label></td>
                        </tr>
                        <tr>
                            <td><label>Pros</label></td>
                            <td><input type="text" class="form-control" name="pros" value="<?= $pros; ?>"/></td>
                            <td><label><?= $proerr ?></label></td>
                        </tr>
                        <tr>
                            <td><label>Cons</label></td>
                            <td><input type="text" class="form-control" name="cons" value="<?= $cons; ?>"/></td>
                            <td><label><?= $conerr ?></label></td>
                        </tr>
                    </table>
                </fieldset>
                <fieldset>
                    <legend>Tell us about yourself</legend>
                    <table>
                        <tr>
                            <td><label>Job title</label></td>
                            <td><input type="text" class="form-control" name="jobtitle" value="<?= $jobtitle; ?>"/></td>
                            <td><label><?= $jobtitleerr ?></label></td>
                        </tr>
                        <tr>
                            <td><label>Location</label></td>
                            <td><input type="text" class="form-control" name="joblocation" value="<?= $joblocation; ?>"/></td>
                            <td><label><?= $locationerr ?></label></td>
                        </tr>
                    </table>
                </fieldset>
                <div><input type="submit" name="addreview" class="btn btn-primary" value="Submit Review"/></div>
                
            </form>
        </main>
    <?php include '../../Includes/footer.php';?>
    </body>
</html>

