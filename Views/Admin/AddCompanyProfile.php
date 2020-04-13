<?php
require_once '../../Database/Database.php';
require_once '../../Models/Company.php';
$dbconn= Database::getDb();
if(isset($_POST['create'])){
    $name=$_POST['cname'];
    $description=$_POST['description'];
    $head_office=$_POST['headoffice'];
    $lob=$_POST['lob'];
    $website=$_POST['website'];
    $employees=$_POST['employees'];
    $company=new Company();
    $profile=$company->addCompanyProfile($dbconn,$name,$description,$head_office,$lob,$website,$employees);
    header('location:ListProfiles.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Company Profile</title>
    <meta name="description"content="Job Management System">
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Styles/Style_Admin_Job_Poster.css">
</head>
<body>

<div class="flex">
    <section id="form">
        <h2>Create Company Profile</h2>
        <form method="post" action="AddCompanyProfile.php" class="login-form">
            <div class="form-group">
                <label for="cname">Company Name</label>
                <input type="text" name="cname" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" rows="10" cols="20"></textarea>
            </div>
            <div class="form-group">
                <label for="headoffice">Head Office</label>
                <input type="text" name="headoffice" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="lob">Line of Business</label>
                <input type="text" name="lob" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="website">Website</label>
                <input type="text" name="website" class="form-control"/>
            </div>
            <div class="form-group">
                <label for="employess">Number of Employees</label>
                <select name="employees" class="form-control">
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
                <input type="submit" name="create" value="Create Profile" class="btn btn-primary mb-2"/>
            </div>
            <div>
            <span><?php
                if(isset($error)){
                    echo $error;
                }?>
            </span>
            </div>
        </form>
    </section>
</div>
<footer id="footer">
    <p>This website is for educational purposes only.</p>
</footer>
</body>
</html>