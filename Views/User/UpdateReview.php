<html>
    <head>
        <title>
            Update review
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
            $reviewid = $_GET['id'];
            $dbcon = Database::getDb();
            $review = new reviews();
            $rs = $review->searchreviewbyid($dbcon, $reviewid);
            if(isset($_POST['updatereview']))
            {
                $rate = $_POST['rate'];
                $summary= $_POST['reviewsummary'];
                $review = $_POST['review'];
                $pros = $_POST['pros'];
                $cons = $_POST['cons'];
                $jobtitle = $_POST['jobtitle'];
                $joblocation = $_POST['joblocation'];
                $rev = new reviews();
                $rev->updatereview($dbcon, $rate, $summary, $review, $pros, $cons, $jobtitle, $joblocation,$_POST['rrid']);
            }
        ?>
        <main id="main">
            <form method="post" action="#">
                <h1>Update your Review</h1>
                <input type="hidden" name="rrid" value="<?= $reviewid; ?>"
                <?php 
                    foreach($rs as $r)
                    {
                ?>
                <fieldset>
                    <legend>Rate this company</legend>
                    <div><label>Overall rating</label></div>
                    
                    <div>
                        <div class="input-group-text" style="display: inline"><input type="radio" name="rate" value="1" <?php if($r[7]==1){ ?> checked<?php } ?> /><label>1</label></div>
                        <div class="input-group-text" style="display: inline"><input type="radio" name="rate" value="2"<?php if($r[7]==2){ ?> checked<?php } ?> /><label>2</label></div>
                        <div class="input-group-text" style="display: inline"><input type="radio" name="rate" value="3"<?php if($r[7]==3){ ?> checked<?php } ?> /><label>3</label></div>
                        <div class="input-group-text" style="display: inline"><input type="radio" name="rate" value="4"<?php if($r[7]==4){ ?> checked<?php } ?> /><label>4</label></div>
                        <div class="input-group-text" style="display: inline"><input type="radio" name="rate" value="5"<?php if($r[7]==5){ ?> checked<?php } ?> /><label>5</label></div>
                       
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Write your review</legend>

                    <table>
                        <tr>
                            <td><label>Review Summary</label></td>
                            <td><input type="text" class="form-control" name="reviewsummary" value="<?= $r[1]; ?>" /></td>
                        </tr>
                        <tr>
                            <td><label>Write your review</label></td>
                            <td><span class="input-group-text">Review</span><textarea name="review" class="form-control" cols="20" rows="5" ><?= $r[2]; ?></textarea></td>
                        </tr>
                        <tr>
                            <td><label>Pros</label></td>
                            <td><input type="text" class="form-control" name="pros" value="<?= $r[3]; ?>"/></td>
                        </tr>
                        <tr>
                            <td><label>Cons</label></td>
                            <td><input type="text" class="form-control" name="cons" value="<?= $r[4]; ?>"/></td>
                        </tr>
                    </table>
                </fieldset>
                <fieldset>
                    <legend>Tell us about yourself</legend>
                    <table>
                        <tr>
                            <td><label>Job title</label></td>
                            <td><input type="text" class="form-control" name="jobtitle" value="<?= $r[5]; ?>"/></td>
                        </tr>
                        <tr>
                            <td><label>Location</label></td>
                            <td><input type="text" class="form-control" name="joblocation" value="<?= $r[6]; ?>"/></td>
                        </tr>
                    </table>
                </fieldset>
                <?php
                    }
                ?>
                <div><input type="submit" name="updatereview" class="btn btn-primary" value="Update Review"/></div>
            </form>
        </main>
    <?php include '../../Includes/footer.php';?>
    </body>
</html>



