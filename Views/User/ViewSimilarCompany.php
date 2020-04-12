<?php
require_once '../../Database/Database.php';
require_once '../../Models/Company.php';
if(isset($_POST['view'])) {
    $lob=$_POST['lob'];
    $id=$_POST['id'];
    $db = Database::getDb();
    $c = new Company();
    $selectedCompany = $c->findSimilarCompanies($db,$lob,$id);
    $newid=$selectedCompany[0]->id;
    $similarCompanies=$c->findSimilarCompanies($db,$lob,$newid);
}
?>
<!DOCTYPE html>
<html>
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
<?php include '../../Includes/header.php';?>
<main class="company_info_main">
    <h1><?=$selectedCompany[0]->name;?></h1>
    <div id="company_section">
        <div id="about_company">
            <h5>About Us</h5>
            <p><?=$selectedCompany[0]->description;?></p>
        </div>
        <div id="company_info">
            <div id="info1">
                <h5>Head Office</h5>
                <p><?=$selectedCompany[0]->head_office;?></p>
                <h5>Line of Business</h5>
                <p><?=$selectedCompany[0]->lob;?></p>
            </div>
            <div id="info2">
                <h5>Website</h5>
                <p><?=$selectedCompany[0]->website;?></p>
                <h5>Employees</h5>
                <p><?=$selectedCompany[0]->employees;?></p>
            </div>
        </div>
    </div>
</main>
<section class="company_info_main">
    <?php foreach ($similarCompanies as $similarCompany){ ?>
        <div>
            <form method="post" action="ViewSimilarCompany.php">
                <input type="hidden" name="lob" value="<?= $lob; ?>">
                <input type="hidden" name="id" value="<?= $newid; ?>">
                <?=$similarCompany->name; ?>
                <input type="submit" name="view" value="View"/>
            </form>
        </div>
    <?php } ?>
</section>
<?php include '../../Includes/footer.php';?>
</body>
</html>