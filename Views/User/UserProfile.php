<?php

    session_start();
    if(!isset($_SESSION['user_id']))
    {
        header('location:login.php');
    }
   // print_r($_SESSION['user_email']);
    require_once '../../Models/Profile.php';
    require_once '../../Models/Education.php';
    require_once '../../Models/Experience.php';
    require_once '../../Models/Skills.php';
    $seeker_profile = new Profile();
    $seeker_education=new Education();
    $seekerExp=new Experience();
    $seekerSkills=new Skills();
    if(!isset($_SESSION['user_id']))
    {
        header('location:login.php');
    }
    $user_id=$_SESSION['user_id'];
    $user_email=$_SESSION['user_email'];

    $profile = $seeker_profile->GetPersonalDetails($user_id);
    $profileSkills=$seekerSkills->GetSkills($user_id);
    $seekerEducation=$seeker_education->GetEducation($user_id);
    $seekerExperience=$seekerExp->GetExperience($user_id);
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
    <link rel="stylesheet" href="../../Styles/Style_Header_Footer.css">
</head>
<body>
<?php include '../../Includes/AfterLoginHeader.php';?>
<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
            <h2 style="margin: 0"><?php if(empty($profile['first_name'])){echo($_SESSION['user_email']);} else{echo($profile['first_name'].' '.$profile['last_name']);}?></h2>
            <p><?php if(empty($profile['designation'])){ } else{ echo($profile['designation']);}?></p>
            <a href="Logout.php" class="btn btn-info btn-lg" style="margin: 0">
                <span class="glyphicon glyphicon-log-out"></span> Log out
            </a>
        </div>
        <div class="col-sm-2">
            <img title="profile image" class="pull-left" width="125px;" class="img-circle" src="../../Images/profile_pic.png">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <ul class="list-group">
                <li class="list-group-item text-muted"><strong style="color:dodgerblue">PROFILE</strong></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Name</strong></span><?php if(empty($profile['first_name'])){ echo('N/A'); } else{ echo($profile['first_name'].' '.$profile['last_name']);} ?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Date of birth</strong></span><?php if(empty($profile['first_name'])){ echo('N/A'); } else{ echo($profile['date_of_birth']);}?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Phone</strong></span><?php if(empty($profile['first_name'])){ echo('N/A'); } else{ echo($profile['phone']);}?></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Email</strong></span><?php echo $user_email;?></li>
            </ul>
            <div class="panel panel-default">
                <div class="panel-heading"><strong style="color:dodgerblue">WEBSITES</strong> <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body"><a href="<?php if(empty($profile['website'])){echo('N/A');}else{echo($profile['website']);}?>"><?php if(empty($profile['website'])){echo('N/A');}else{echo($profile['website']);}?></a></div>
            </div>
            <ul class="list-group">
                <li class="list-group-item text-muted"><strong style="color:dodgerblue">TOP SKILLS </strong><a href="UpdateSkills.php" style="float: right">UPDATE</a> </i></li>
                <?php foreach ($profileSkills as $skill)
                {
                    $value=htmlentities($skill['skill_title']);
                    print_r('<li class="list-group-item text-left"><strong>'.$value.'</strong></li>') ;
                }  ?>
            </ul>
        </div>
        <div class="col-sm-9">
            <div class="tab-content">
                <div id="BasicInfo">
                    <hr>
                    <h2 class="section-title" style="display: inline">Basic Info</h2><a href="UpdatePersonalDetails.php" style="float: right">UPDATE</a>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <label>FIRST NAME</label>
                        </div>
                        <div class="col-md-3">
                            <p><?php if(empty($profile['first_name'])){ } else{  echo($profile['first_name']); }?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>LAST NAME</label>
                        </div>
                        <div class="col-md-3">
                            <p><?php if(empty($profile['first_name'])){ } else{  echo($profile['last_name']);} ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>DATE OF BIRTH</label>
                        </div>
                        <div class="col-md-3">
                            <p><?php if(empty($profile['first_name'])){ } else{  echo($profile['date_of_birth']);} ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>PHONE</label>
                        </div>
                        <div class="col-md-3">
                            <p><?php if(empty($profile['first_name'])){ } else{ echo($profile['phone']);} ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label>EMAIL</label>
                        </div>
                        <div class="col-md-3">
                            <p><?php if(empty($profile['first_name'])){ } else{  echo($_SESSION['user_email']);} ?></p>
                        </div>
                    </div>
<!--                    <div class="row">-->
<!--                        <div class="col-md-3">-->
<!--                            <label>ADDRESS</label>-->
<!--                        </div>-->
<!--                        <div class="col-md-3">-->
<!--                            <p>--><?php //echo($profile['address']) ?><!--</p>-->
<!--                        </div>-->
<!--                    </div>-->
                    <hr>
                </div>
                <hr>
                <!--Education Panel-->
                <div id="education">
                    <h2 class="section-title" style="display: inline">Education Info</h2><a href="AddEducation.php" style="float: right;margin-right: 10px;">ADD</a>
                    <hr>
                    <?php
                    foreach ($seekerEducation as $education)
                    {   $id=htmlentities($education['education_id']);
                        $schoolName = htmlentities($education['institute']);
                        $majorName = htmlentities($education['course_name']);
                        $certName = htmlentities($education['certificate_name']);
                        $start = htmlentities($education['start_date']);
                        $end = htmlentities($education['end_date']);
                        echo('<div class="panel panel-default">');
                        echo('<div class="panel-heading"><strong>'.$majorName.'</strong><a href="UpdateEducation.php?id='.$id.'" style="float:right; margin-right: 10px;">EDIT</a><a href="DeleteEducation.php?id='.$id.'" style="float:right; margin-right: 10px;">REMOVE</a>  </div>');
                        echo('<div class="panel-body">');
                        echo('<div class="row">');
                        echo('<div class="col-md-3">');
                        echo('<label>Institute Name</label>');
                        echo('</div>');
                        echo('<div class="col-md-3">');
                        echo('<p>'.$schoolName.'</p>');
                        echo('</div>');
                        echo('</div>');
                        echo('<div class="row">');
                        echo('<div class="col-md-3">');
                        echo('<label>Certificate</label>');
                        echo('</div>');
                        echo('<div class="col-md-3">');
                        echo('<p>'.$certName.'</p>');
                        echo('</div>');
                        echo('</div>');
                        echo('<div class="row">');
                        echo('<div class="col-md-3">');
                        echo('<label>Start Date</label>');
                        echo('</div>');
                        echo('<div class="col-md-3">');
                        echo('<p>'.$start.'</p>');
                        echo('</div>');
                        echo('</div>');
                        echo('<div class="row">');
                        echo('<div class="col-md-3">');
                        echo('<label>End Date</label>');
                        echo('</div>');
                        echo('<div class="col-md-3">');
                        echo('<p>'.$end.'</p>');
                        echo('</div>');
                        echo('</div>');
                        echo('</div>');
                        echo('</div>');
                    }
                    ?>
                    <hr>
                    <hr>
                </div>
                <!--Experience Panel-->
                <div  id="experience">
                    <h2 class="section-title"style="display: inline">Work Experience Info</h2><a href="UpdateExperience.php" style="float: right">UPDATE</a><a href="AddExperience.php" style="float: right;margin-right: 10px;">ADD</a>
                    <hr>
                    <?php
                    foreach ($seekerExperience as $experience)
                    {
                        $id=htmlentities($experience['experience_id']);
                        $jobTitle = htmlentities($experience['job_title']);
                        $companyName = htmlentities($experience['company_name']);
                        $isCurrentJob = htmlentities($experience['is_current_job']);
                        $city = htmlentities($experience['city']);
                        $country = htmlentities($experience['country']);
                        $startDate = htmlentities($experience['start_date']);
                        $endDate = htmlentities($experience['end_date']);
                        echo('<div class="panel panel-default">');
                        echo('<div class="panel-heading"><strong>'.$jobTitle.'</strong><a href="UpdateExperience.php?id='.$id.'" style="float:right; margin-right: 10px;">EDIT</a><a href="DeleteExperience.php?id='.$id.'" style="float:right; margin-right: 10px;">REMOVE</a></div>');
                        echo('<div class="panel-body">');
                        echo('<div class="row">');
                        echo('<div class="col-md-3">');
                        echo('<label>Company Name</label>');
                        echo('</div>');
                        echo('<div class="col-md-3">');
                        echo('<p>'.$companyName.'</p>');
                        echo('</div>');
                        echo('</div>');
                        echo('<div class="row">');
                        echo('<div class="col-md-3">');
                        echo('<label>Is Current Job</label>');
                        echo('</div>');
                        echo('<div class="col-md-3">');
                        echo('<p>'.$isCurrentJob.'</p>');
                        echo('</div>');
                        echo('</div>');
                        echo('<div class="row">');
                        echo('<div class="col-md-3">');
                        echo('<label>Start Date</label>');
                        echo('</div>');
                        echo('<div class="col-md-3">');
                        echo('<p>'.$startDate.'</p>');
                        echo('</div>');
                        echo('</div>');
                        echo('<div class="row">');
                        echo('<div class="col-md-3">');
                        echo('<label>End Date</label>');
                        echo('</div>');
                        echo('<div class="col-md-3">');
                        echo('<p>'.$endDate.'</p>');
                        echo('</div>');
                        echo('</div>');
                        echo('</div>');
                        echo('</div>');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../../Includes/Footer.php';?>
</body>
</html>