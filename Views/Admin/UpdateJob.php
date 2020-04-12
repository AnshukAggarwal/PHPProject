<?php
require_once '../../Database/Database.php';
require_once '../../Database/JobDB.php';
require_once '../../Database/CompanyDB.php';
require_once '../../Models/Job.php';


$dbconn = Database::getDb();
$jobDB = new JobDB($dbconn);
$companyDB = new CompanyDB($dbconn);

$jobId = $_GET["id"];

$job = $jobDB->getJobByID($jobId)[0];

//Getting list of current companies to show AddJob form
$companies=$companyDB->listCompanies();

if(isset($_POST['submit']))
{

    $newJob = new Job();

    $validationFlag=0;
    $newJob->setTitle($_POST['name']);
    $newJob->setLocation($_POST['location']);
    $newJob->setCompanyId($_POST['company_id']);
    $newJob->setSalary($_POST['salary']);
    $newJob->setDescription($_POST['description']);
    $newJob->setId($_POST['id']);
    $jobDB->updateJob($newJob);


}
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
        <h2>UpdateJob</h2>
        <form method="post" href="#">
            <div class="form-group">
                <input type="hidden" name="id" value="<?=$job->id ?>"/>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Job Name:</label>
                    <input class="form-control" id="name" value="<?=$job->title ?>" name="name" type="text" />
                </div>
                <div class="form-group row">
                    <?php
                    $company= $companyDB->findCompany($job->company_id);
                    ?>

                    <label class="col-sm-2 col-form-label">Company List:</label>
                    <select name="company_id" id="company_id" class="form-control">
                        <?php foreach ($companies as $c) {
                            ?>
                            <option value="<?= $c->id ?>" <?php if($c->name==$company[0]->name){echo "selected";} ?>><?= $c->name ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Location:</label>
                    <input class="form-control" id="skill" value="<?=$job->location ?>" name="location" type="text" />
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Salary:</label>
                    <input class="form-control" id="skill" value="<?=$job->salary ?>" name="salary" type="text" />
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description:</label>
                    <textarea class="form-control" rows="10" id="description" name="description" ><?=$job->description ?></textarea>
                </div>
                <div class="form-group row">
                    <input type="submit" class="btn btn-primary" value="Update" name="submit">
                    <a href="ListJobs.php" class="btn btn-secondary">Back</a>
                    <form method="post" action="DeleteJob.php">
                        <input type="hidden" name="deleteId" value="<?=$job->id;?>"/>
                        <input type="submit" name="delete" class="btn btn-danger" value="Delete"/>
                    </form>
                </div>
            </div>

        </form>
    </section>
</main>

<?php include '../../Includes/footer.php';?>
</body>
</html>