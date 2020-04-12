<?php
require_once '../../Database/Database.php';
require_once '../../Models/Company.php';
if(isset($_POST['update'])){
    $id=$_POST['updateprofile'];
    $db= Database::getDb();
    $c= new Company();
    $currentProfile= $c->showProfile($db,$id);
    $name=$currentProfile->name;
    $description=$currentProfile->description;
    $head_office=$currentProfile->head_office;
    $lob=$currentProfile->lob;
    $website=$currentProfile->website;
    $employees=$currentProfile->employees;
}
if(isset($_POST['updatepro'])){
    $id=$_POST['pid'];
    $name=$_POST['name'];
    $description=$_POST['desc'];
    $head_office=$_POST['head_office'];
    $lob=$_POST['lob'];
    $website=$_POST['website'];
    $employees=$_POST['emp'];
    $status=$_POST['status'];
    $db=Database::getDb();
    $c= new Company();
    $updatedProfile= $c->updateProfile($name,$description,$head_office,$lob,$website,$employees,$id,$db,$status);
    echo $status;
    header('location:ListProfiles.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Company profile</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Styles/Style_Admin_Job_Poster.css">
    </head>
    <body>
        <h1>Details for <?= $name;?></h1>
        <div>
            <form method="post" action="UpdateProfile.php">
                <input type="hidden" name="pid" value="<?= $id?>"/>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="<?=$name; ?>">
                </div>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <input type="text" class="form-control" name="desc" id="desc" value="<?=$description; ?>">
                </div>
                <div class="form-group">
                    <label for="head_office">Head Office</label>
                    <input type="text" class="form-control" name="head_office" id="head_office" value="<?=$head_office; ?>">
                </div>
                <div class="form-group">
                    <label for="lob">Line of Business</label>
                    <input type="text" class="form-control" name="lob" id="lob" value="<?=$lob; ?>">
                </div>
                <div class="form-group">
                    <label for="website">Website</label>
                    <input type="text" class="form-control" name="website" id="website" value="<?=$website; ?>">
                </div>
                <div class="form-group">
                    <label for="emp">Employees</label>
                    <select name="emp" class="form-control">
                        <option value="<?=$employees;?>"><?=$employees;?></option>
                        <option value="0-10">1-10</option>
                        <option value="11-50">11-50</option>
                        <option value="51-100">51-100</option>
                        <option value="101-500">101-500</option>
                        <option value="501-1,000">501-1000</option>
                        <option value="1,001-5,000">1001-5000</option>
                        <option value="5,001-10,000">5001-10000</option>
                        <option value="10,000+">10000+</option>
                    </select>
                </div>
                <div class="form-group">
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">In-Active</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="updatepro" value="Update">
                </div>
            </form>
        </div>

    </body>
