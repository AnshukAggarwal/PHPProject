<?php
require_once '../../Database/Database.php';
require_once '../../Models/Company.php';
$id=$_GET['id'];
$db= Database::getDb();
$c= new Company();
$selectedProfile=$c->showProfile($db,$id);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>View Profile</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Styles/Style_Admin_Job_Poster.css">
    </head>
    <body>
        <h1><?=$selectedProfile->name; ?></h1>
        <div id="company_section">
            <div id="about_company">
                <h5>About Us</h5>
                <p><?= $selectedProfile->description;?></p>
            </div>
            <div id="company_info">
                <div id="info1">
                    <h5>Head Office</h5>
                    <p><?= $selectedProfile->head_office;?></p>
                    <h5>Line of Business</h5>
                    <p><?= $selectedProfile->lob;?></p>
                </div>
                <div id="info2">
                    <h5>Website</h5>
                    <p><?= $selectedProfile->website;?></p>
                    <h5>Employees</h5>
                    <p><?= $selectedProfile->employees;?></p>
                </div>
            </div>
        </div>
    </body>
</html>
