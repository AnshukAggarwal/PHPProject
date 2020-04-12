<?php
require_once '../../Models/Experience.php';
session_start();
if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}
$seeker_experience = new Experience();

$user_id=$_SESSION['user_id'];
$user_email=$_SESSION['user_email'];
if(isset($_POST['add']))
{
    $jobTitle=($_POST['job_title']);
    $orgName=($_POST['org_title']);
    $city=($_POST['city']);
    $country=($_POST['country']);
    $isCurrentJob=($_POST['current_job']);
    $startDate=($_POST['start_date']);
    $endDate=($_POST['end_date']);
    $seeker_experience->AddExperience($user_id,$jobTitle,$orgName,$city,$country,$isCurrentJob,$startDate,$endDate);
    header('location:UserProfile.php');
//    echo $isCurrentJob;
//    echo $user_id;
//    echo $jobTitle;
//    echo  $orgName;
//    echo  $city;
//    echo  $country;
//    echo  $startDate;
//    echo  $endDate;
}
?>
    <!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add Experience</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../Styles/Style_Index_Search.css">
</head>
<body>
<?php include '../../Includes/AfterLoginHeader.php';?>
<hr>
<div class="container bootstrap snippet">
    <h2 class="section-title text-center">Add Experience Details</h2>
    <div class="col-sm-9" style="width: 100%">
        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <form class="form" method="post">
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="job_title">
                                <h5>Job Title</h5></label>
                            <input type="text" class="form-control" name="job_title" id="job_title">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="org_title">
                                <h5>Organization Title</h5></label>
                            <input type="text" class="form-control" name="org_title" id="org_title">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="city">
                                <h5>City</h5></label>
                            <input type="text" class="form-control" name="city" id="city" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="country">
                                <h5>Country</h5></label>
                            <input type="text" class="form-control" name="country" id="country" >
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="slectebox">Select list:</label>
                            <select class="form-control" name="current_job" >
                                <option>YES</option>
                                <option>NO</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="start_date">
                                <h5>Start Date</h5></label>
                            <input type="text" class="form-control" name="start_date" id="start_date">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <label for="end_date">
                                <h5>End Date</h5></label>
                            <input type="text" class="form-control" name="end_date" id="end_date">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <br>
                            <button class="btn btn-info" type="submit" name="add">Submit</button>
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

