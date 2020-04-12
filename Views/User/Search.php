<?php
require_once '../../Database/Database.php';
require_once '../../Database/JobDB.php';
require_once '../../Database/CompanyDB.php';

$dbconn = Database::getDb();
$jobDB = new JobDB($dbconn);
$companyDB = new CompanyDB($dbconn);
if(isset($_GET['location'])) {
    $jobs=$jobDB->getJobByLocation($_GET['location'],$_GET['search']);
}
else {
    $jobs = $jobDB->listJobs($_GET["search"]);
}


?>
<html>
<head>
    <title>Search</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Styles/Style_Index_Search.css">
    <link rel="stylesheet" href="../../Styles/Style_Header_Footer.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../Scripts/Script_Index_Search.js"></script>
    <script src="../../Scripts/Script_Header_Footer.js"></script>
</head>
<body>
<?php include '../../Includes/header.php';?>
<main id="search_main">
    <section id="search_section1">
        <form method="get" action="Search.php">
            <input type="text" name="search" id="search" placeholder="Enter Job title">
            <input type="submit" class="btn btn-primary" value="Find Jobs">
        </form>
    </section>
    <section id="search_section2">
        <div id="job_type" class="section">
            <div class="heading">
                <span>Job Type</span>
            </div>
            <div class="body">
                <ul>
                    <li>Full-time</li>
                    <li>Part-time</li>
                    <li>Contract</li>
                    <li>Internship</li>
                </ul>
            </div>
        </div>
        <div id="job_type" class="section">
            <div class="heading">
                <span>Location</span>
            </div>
            <div class="body">
                <ul>
                    <li><a href="Search.php?search=<?=$_GET['search']?>&location=Toronto">Toronto</a></li>
                    <li><a href="Search.php?search=<?=$_GET['search']?>&location=Montreal">Montreal</a></li>
                    <li><a href="Search.php?search=<?=$_GET['search']?>&location=Vancouver">Vancouver</a></li>
                    <li><a href="Search.php?search=<?=$_GET['search']?>&location=Edmonton">Edmonton</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section id="search_section3">
        <?php foreach ($jobs as $job) { ?>
            <div class="search_job">
                <div id="jobId" style="display: none">
                    <?=$job->id ?>
                </div>
                <div id="title">
                    <span><?=$job->title ?></span>
                </div>
                <div id="company">
                    <?php
                    $company= $companyDB->findCompany($job->company_id);
                    ?>
                    <span><?=$company[0]->name ?></span>
                </div>
                <div id="location">
                    <span><?=$job->location ?></span>
                </div>
                <div id="salary">
                    <?php
                    $salary = $job->salary;
                    if( $salary >= 50000 && $salary < 75000 )
                        echo "<span>$50,000 - $75,000 a year</span>";
                    if( $salary >= 75000 && $salary < 100000 )
                        echo "<span>$75,000 - $100,000 a year</span>";
                    if( $salary >= 100000 && $salary < 120000 )
                        echo "<span>$100,000 - $125,000 a year</span>";
                    if( $salary >= 120000 && $salary < 150000 )
                        echo "<span>$120,000 - $150,000 a year</span>";
                    if( $salary >= 150000 && $salary < 200000 )
                        echo "<span>$150,000 - $200,000 a year</span>";
                    ?>

                </div>
                <div id="description">
                    <?php
                    $description = $job->description;
                    echo "<ul><li><span>".substr($description,0,200)."...</span></ul></li>";
                    ?>
                </div>
                <div id="days">
                    <?php
                    $date =  $job->date;
                    $now = time(); // or your date as well
                    $your_date = strtotime($date);
                    $datediff = $now - $your_date;
                    $days = round($datediff / (60 * 60 * 24));
                    if($days == 0)
                        echo "Posted Today";
                    else
                        echo $days." days ago";
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </section>
    <section id="search_section4">
        <div id="email">
            <div class="heading">
                Get notifications for new <span><?= $_GET["search"] ?></span> Jobs
            </div>
            <form action="#" method="post">
                <div id="emailForm">
                    <lablel>Email:</lablel>
                </div>
                <div>
                    <input type="text" name="email" id="textEmail" />
                </div>
                <div>
                    <button type="submit" class="btn btn-primary" name="emailSend">Send Jobs</button>
                </div>
            </form>
        </div>
        <div id="jobDetails">
            <div id="jobApply">
                <div id="title"></div>
                <div id="companyDetails">
                    <span id="company"></span>
                    <span> - </span>
                    <span id="location"></span>
                </div>
                <button type="submit" class="btn btn-primary">Apply</button>
            </div>
            <div id="jobDescription">
                <div id="location">
                </div>
                <div id="jobSummary">Job Summary:</div>
                <div id="description"></div>
            </div>
        </div>
    </section>
    <div class="clear"></div>
</main>

<?php include '../../Includes/footer.php';?>
</body>

</html>
