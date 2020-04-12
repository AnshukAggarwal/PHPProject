<?php
    session_start();
    if(!isset($_SESSION['user_id']))
    {
        header('location:login.php');
    }
    require_once '../../Models/Profile.php';
    $user_id=$_SESSION['user_id'];
    $seeker_profile = new Profile();
    $profile = $seeker_profile->GetPersonalDetails($user_id);
    if(isset($_POST['update_per']))
    {
        $userFname=($_POST['first_name']);
        $userLname=($_POST['last_name']);
        $dob=($_POST['dob']);
        $designation=($_POST['designation']);
        $phone=($_POST['phone']);
        $address=($_POST['address']);
        $website=($_POST['website']);
        $profile=$seeker_profile->UpdateDetails($user_id,$userFname,$userLname,$dob,$designation,$phone,$address,$website);
        header("location:UserProfile.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Update Profile</title>
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
            <h2 class="section-title text-center">Update Personal Details</h2>
        </div>
    </div>
        <!--/col-3-->
        <div class="col-sm-9" style="width: 100%">

            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <form class="form" method="post">
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="first_name">
                                    <h5>First Name</h5></label>
                                <input type="text" class="form-control" name="first_name" id="first_name" value="<?php if(empty($profile['first_name'])){echo('First Name');} else{ echo $profile['first_name'] ;}?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="last_name">
                                    <h5>Last Name</h5></label>
                                <input type="text" class="form-control" name="last_name" value="<?php if(empty($profile['last_name'])){echo('Last Name');} else{  echo $profile['last_name'];} ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="phone">
                                    <h5>Date of Birth</h5></label>
                                <input type="text" class="form-control" name="dob"  value="<?php if(empty($profile['date_of_birth'])){echo('YYYY-MM-DD');} else{  echo $profile['date_of_birth'];} ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="designation">
                                    <h5>Designation</h5></label>
                                <input type="text" class="form-control" name="designation" value="<?php if(empty($profile['designation'])){echo('Designation');} else{  echo $profile['designation'];} ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="phone">
                                    <h5>Phone</h5></label>
                                <input type="text" class="form-control" name="phone" value="<?php if(empty($profile['phone'])){echo('Phone Number');} else{  echo $profile['phone'];} ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="address">
                                    <h5>Address</h5></label>
                                <input type="text" class="form-control" name="address" value="<?php if(empty($profile['address'])){echo('Address');} else{  echo $profile['address'];} ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="website">
                                    <h5>Website</h5></label>
                                <input type="text" class="form-control" name="website" value="<?php if(empty($profile['website'])){echo('www.example.com');} else{  echo $profile['website'];} ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-info" type="submit" name="update_per">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>
<?php include '../../Includes/footer.php';?>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
</body>
</html>