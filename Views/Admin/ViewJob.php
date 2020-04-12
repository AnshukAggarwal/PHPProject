<?php
require_once '../../Database/Database.php';
require_once '../../Database/JobDB.php';
require_once '../../Database/CompanyDB.php';

$dbconn = Database::getDb();
$jobDB = new JobDB($dbconn);
$companyDB = new CompanyDB($dbconn);

$jobId = $_GET["id"];

$job = $jobDB->getJobByID($jobId)[0];

?>
<html>
<head>
    <title>Jobs Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Styles/Style_Header_Footer.css">
    <link rel="stylesheet" href="../../Styles/Style_Admin_Jobs.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../Scripts/Script_Header_Footer.js"></script>
</head>
<body>
<?php include '../../Includes/header.php';?>

<main>
    <section id="viewJob">
        <h2>Job Details</h2>


        <table class="table table-bordered  table-hover">
            <tr>
                <td>Name:</td>
                <td><?=$job->title ?></td>
            </tr>
            <tr></tr>
            <tr>
                <?php
                $company= $companyDB->findCompany($job->company_id);
                ?>
                <td>Company:</td>
                <td><?=$company[0]->name ?></td>
            </tr>
            <tr>
                <td>Location:</td>
                <td><?=$job->location ?></td>
            </tr>
            <tr>
                <td>Salary:</td>
                <td><?=$job->salary ?></td>
            </tr>
            <tr>
                <td>Description:</td>
                <td><?=$job->description ?></td>
            </tr>
            <tr>
                <td>Date:</td>
                <td><?=$job->date ?></td>
            </tr>
        </table>


        <a href="UpdateJob.php?id=<?=$jobId ?>" class="btn btn-primary">Update</a>
        <a href="ListJobs.php" class="btn btn-secondary">Back</a>
        <form method="post" action="DeleteJob.php" id="formDelete">
            <input type="hidden" name="deleteId" value="<?=$job->id;?>"/>
            <input type="submit" name="delete" class="btn btn-danger" value="Delete"/>
        </form>
        </div>
    </section>
</main>

<?php include '../../Includes/footer.php';?>
</body>
</html>
