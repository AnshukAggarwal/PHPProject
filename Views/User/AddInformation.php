<?php
require_once '../../Models/Profile.php';
require_once '../../Models/Users.php';
session_start();
if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}
$seeker_profile = new Profile();
$user=new Users();
$user_id=$_SESSION['user_id'];
$user_email=$_SESSION['user_email'];
if(isset($_POST['add']))
{
    $userFname=($_POST['first_name']);
    $userLname=($_POST['last_name']);
    $dob=($_POST['dob']);
    $designation=($_POST['designation']);
    $phone=($_POST['phone']);
    $address=($_POST['address']);
    $website=($_POST['website']);
    $status="ACTIVE";
    $seeker_profile->AddDetails($user_id,$userFname,$userLname,$dob,$designation,$phone,$address,$website);
    $user->ChangeStatus($user_id,$status);
    header('location:UserProfile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../Styles/Style_Index_Search.css">
</head>
<body>
<?php include '../../Includes/AfterLoginHeader.php';?>
<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
            <h2 style="margin: 0"><?php echo($_SESSION['user_email']);?></h2>
        </div>
    </div>
    <h2 class="section-title text-center">Please Provide Basic Information</h2>
<div class="col-sm-9" style="width: 100%">
    <div class="tab-content">
        <div class="tab-pane active" id="home">
            <form class="form" method="post">
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="first_name">
                            <h5>First Name</h5></label>
                        <input type="text" class="form-control" name="first_name" id="first_name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="last_name">
                            <h5>Last Name</h5></label>
                        <input type="text" class="form-control" name="last_name">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="phone">
                            <h5>Date of Birth</h5></label>
                        <input type="text" class="form-control" name="dob" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="designation">
                            <h5>Designation</h5></label>
                        <input type="text" class="form-control" name="designation">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="phone">
                            <h5>Phone</h5></label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="address">
                            <h5>Address</h5></label>
                        <input type="text" class="form-control" name="address">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-6">
                        <label for="website">
                            <h5>Website</h5></label>
                        <input type="text" class="form-control" name="website">
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