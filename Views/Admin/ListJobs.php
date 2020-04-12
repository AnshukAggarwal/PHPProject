<?php
require_once '../../Database/Database.php';
require_once '../../Database/JobDB.php';
require_once '../../Database/CompanyDB.php';

$dbconn = Database::getDb();
$jobDB = new JobDB($dbconn);
$companyDB = new CompanyDB($dbconn);

$jobs = $jobDB->listJobs("");

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
    <section id="jobsList">
        <table class="table table-bordered table-striped table-hover">
            <thead class="thead-dark">
            <tr>
                <th style="width: 17.5%">Title</th>
                <th style="width: 10%">Company</th>
                <th style="width: 10%">Location</th>
                <th style="width: 10%">Salary</th>
                <th style="width: 35%">Description</th>
                <th style="width: 10%">date</th>
                <th style="width: 10%" colspan="2">Action</th>

            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($jobs as $job)
            {

                ?>
                <tr>
                    <td><a href="viewJob.php?id=<?=$job->id?>"><?=$job->title ?></a></td>
                    <?php
                    $company= $companyDB->findCompany($job->company_id);
                    ?>
                    <td><?=$company[0]->name ?></td>
                    <td><?=$job->location ?></td>
                    <td><?=$job->salary ?></td>
                    <td><?=substr($job->description,0,200)."..." ?></td>
                    <td><?=$job->date ?></td>
                    <td><a href="updateJob.php?id=<?=$job->id?>" class="btn btn-warning">Update</a></td>
                    <td>
                        <form method="post" action="DeleteJob.php">
                            <input type="hidden" name="deleteId" value="<?=$job->id;?>"/>
                            <input type="submit" name="delete" class="btn btn-danger" value="Delete"/>
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </section>
</main>

<?php include '../../Includes/footer.php';?>
</body>
</html>
