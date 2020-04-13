<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}
require_once '../../Database/Database.php';
require_once '../../Models/Company.php';
require_once '../../Models/Users.php';
$user_id=$_SESSION['user_id'];
if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}
$user= new Users();
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

    $profile=$company->addCompanyProfile($dbconn, $user_id,$name,$description,$head_office,$lob,$website,$employees);
    $status="ACTIVE";
    $user->ChangeStatus($user_id,$status);
    header('location:ViewCompanyProfile.php');
//    $profile=$company->addCompanyProfile($dbconn,$user_id,$name,$description,$head_office,$lob,$website,$employees);
//    header('location:ListProfiles.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create Company Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="../../Styles/Style_Index_Search.css">
    <link rel="stylesheet" href="../../Styles/Style_Header_Footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../Scripts/Script_Index_Search.js"></script>
</head>
<body>
<?php include '../../Includes/AfterLoginHeader.php';?>

<main class="container bootstrap snippet">
    <h2>Create Company Profile</h2>
    <section id="form">
        <form method="post"  class="login-form">
        <form method="post" action="CreateCompanyProfile.php" class="login-form">
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
                <input type="submit" name="create" value="Create Profile" class="btn btn-primary"/>
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
    <?php include '../../Includes/footer.php';?>
</body>
</html>