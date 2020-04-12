<?php
require_once '../../Models/Education.php';
session_start();
if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}
$seeker_education = new Education();

$user_id=$_SESSION['user_id'];
$user_email=$_SESSION['user_email'];
$education_id=$_GET['id'];
$education = $seeker_education->GetEducationById($education_id);
if(isset($_POST['add']))
{
    $certName=($_POST['cert_name']);
    $courseName=($_POST['course_name']);
    $instName=($_POST['institute']);
    $city=($_POST['city']);
    $country=($_POST['country']);
    $startDate=($_POST['start_date']);
    $endDate=($_POST['end_date']);
    $seeker_education->UpdateEducation($education_id,$certName,$courseName,$instName,$city,$country,$startDate,$endDate);
    header('location:UserProfile.php');
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Update Education</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../../Styles/Style_Index_Search.css">
    </head>
    <body>
    <?php include '../../Includes/AfterLoginHeader.php';?>
    <hr>
    <div class="container bootstrap snippet">
        <h2 class="section-title text-center">Update Education Details</h2>
        <div class="col-sm-9" style="width: 100%">
            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <form class="form" method="post">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h5>Certificate Name</h5></label>
                                <input type="text" class="form-control" name="cert_name" value="<?php echo $education['certificate_name']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h5>Course Name</h5></label>
                                <input type="text" class="form-control" name="course_name" value="<?php echo $education['course_name']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="phone">
                                    <h5>Institute Name</h5></label>
                                <input type="text" class="form-control" name="institute" value="<?php echo $education['institute']?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="phone">
                                    <h5>City</h5></label>
                                <input type="text" class="form-control" name="city" value="<?php echo $education['city']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="phone">
                                    <h5>Country</h5></label>
                                <input type="text" class="form-control" name="country" value="<?php echo $education['country']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="designation">
                                    <h5>Start Date</h5></label>
                                <input type="text" class="form-control" name="start_date" value="<?php echo $education['start_date']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="phone">
                                    <h5>End Date</h5></label>
                                <input type="text" class="form-control" name="end_date" value="<?php echo $education['end_date']?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-info" type="submit" name="add">update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <?php include '../../Includes/footer.php';?>
    </div>
    </body>
    </html>
<?php
