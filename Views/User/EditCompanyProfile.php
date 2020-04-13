<?php
require_once '../../Database/Database.php';
require_once '../../Models/Company.php';

session_start();
if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}
$user_id=$_SESSION['user_id'];
if(isset($_POST['edit'])){
    $db= Database::getDb();
    $c= new Company();
    $user_id=$_SESSION['user_id'];
    $id=$_POST['id'];
    $currentProfile= $c->showProfile($db,$user_id);
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
    header('location:ViewCompanyProfile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Company Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="../../Styles/Style_User_ViewCompanyProfile.css">
    <link rel="stylesheet" href="../../Styles/Style_Header_Footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../Scripts/Script_Index_Search.js"></script>
</head>
<body>

<div class="container bootstrap snippet">
    <h1>Details for <?= $name;?></h1>
    <form method="post" action="EditCompanyProfile.php">
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
            <input type="submit" class="btn btn-primary" name="updatepro" value="Update">
        </div>
    </form>
</div>

</body>

