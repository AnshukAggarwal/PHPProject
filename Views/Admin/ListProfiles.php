<?php
require_once '../../Database/Database.php';
require_once '../../Models/Company.php';
    $dbconn= Database::getDb();
    $c=new Company();
    $profiles=$c->listProfiles($dbconn);
    if(isset($_POST['search'])) {
        $searchkey = $_POST['searchkey'];

        $profiles = $c->listProfiles($dbconn, $searchkey);
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>List Of Company profiles</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="../../Styles/Style_Admin_Job_Poster.css" rel="stylesheet">
        <link rel="stylesheet" href="../../Styles/Style_Admin_Index.css">
    </head>
    <body>
        <h1>List of Company Profiles</h1>
        <a href="AddCompanyProfile.php" class="btn btn-primary mb-2">Add Profile</a>
        <div>
            <form method="post" action="ListProfiles.php">
                <input type="text" name="searchkey">
                <input type="submit" name="search" value="Search">
            </form>
        </div>
        <div id="results">
            <table class="table">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Head Office</td>
                        <td>Line of Business</td>
                        <td>Website</td>
                        <td>Employees</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($profiles as $profile){?>
                <tr>
                    <td>
                        <a href="ViewProfile.php?id=<?= $profile->id;?>"><?= $profile->name;?></a>
                    </td>
                    <td><?= substr($profile->description,0,40);?></td>
                    <td><?= $profile->head_office;?></td>
                    <td><?= $profile->lob;?></td>
                    <td><?= $profile->website;?></td>
                    <td><?= $profile->employees;?></td>
                    <td>
                        <form method="post" action="UpdateProfile.php">
                            <input type="hidden" name="updateprofile" value="<?=$profile->id;?>"/>
                            <input type="submit" name="update" value="Update"/>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="DeleteProfile.php">
                            <input type="hidden" name="deleteprofile" value="<?=$profile->id;?>"/>
                            <input type="submit" name="delete" value="Delete"/>
                        </form>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
            <footer id="footer">
                <p>This website is for educational purposes only.</p>
            </footer>
    </body>
</html>