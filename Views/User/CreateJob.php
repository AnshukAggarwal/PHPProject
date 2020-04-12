<?php

require_once "../../Models/Job.php";
require_once "../../Models/CompanyProfile.php";
require_once "../../Database/JobDB.php";
require_once "../../Database/CompanyDB.php";
require_once '../../Database/Database.php';

$dbconn = Database::getDb();
$jobDB = new JobDB($dbconn);
$companyDB = new CompanyDB($dbconn);

//Getting list of current companies to show AddJob form
$companies=$companyDB->listCompanies();

if(isset($_POST['submit'])) {

    $job = new Job();
    $company = new CompanyProfile();

    $companyId = 0;
    echo "'".$_POST['companyName']."'";
    if($_POST['companyName']!="") {

        foreach ($companies as $c)
        {
            if($c->id>$companyId)
            {
                $companyId=$c->id;
            }
        }
        $companyId++;
        $company->setId($companyId);
        $company->setName($_POST['companyName']);
        $company->setDescription($_POST['companyDescription']);
        $company->setHeadOffice($_POST['headOffice']);
        $company->setEmployees($_POST['employees']);
        $company->setLob($_POST['lob']);
        $company->setWebsite($_POST['website']);
        $companyDB->addCompany($company);

    }

    if($_POST['companyName']!="")
    {
        $job->setCompanyId($companyId);
    }
    else {
        $job->setCompanyId($_POST['company_id']);
    }
    $job->setTitle($_POST['jobName']);
    $job->setLocation($_POST['jobLocation']);
    $job->setSalary($_POST['jobSalary']);
    $job->setDescription($_POST['jobDescription']);
    $jobDB->addJob($job);
}

?>

<html>
<head>
    <title>Search</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Styles/Style_CreateJob.css">
    <link rel="stylesheet" href="../../Styles/Style_Header_Footer.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../../Scripts/Script_Header_Footer.js"></script>
    <script src="../../Scripts/Script_CreateJob.js"></script>

</head>
<body>
<?php include '../../Includes/header.php';?>
<main>
    <section id="createJobForm">
        <form method="post" action="#" name="createForm">
            <div id="create_form_1" class="create_form">
                <div class="heading">
                    <h1 class="title">Post a job</h1>
                    <p class="step">Step 1 of 3</p>
                    <div class="clear"></div>
                </div>
                <div class="body">
                    <h2>Lets get started!</h2>
                    <div class="form-label-group">
                        <label> Job Title </label>
                        <input type="text" class="form-control" name="jobName" id="jobName"/>
                    </div>
                    <div class="form-label-group">
                        <label> Location </label>
                        <input type="text" class="form-control" name="jobLocation" id="jobLocation" placeholder="City"/>
                    </div>
                    <div class="formContinue">
                        <div class="formRight">
                            <button class="btn btn-primary"  name="continue1" id="continue1" class="continueButton">Continue</button>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>

            <div id="create_form_2" class="create_form">
                <div class="heading">
                    <h1 class="title">Tell us more about the job</h1>
                    <p class="step">Step 2 of 3</p>
                    <div class="clear"></div>
                </div>
                <div class="body">
                    <h2>Job Details</h2>
                    <div class="form-label-group">
                        <label for="type">Job Type:</label>
                        <select class="form-control" id="jobType" name="jobType">
                            <option value="Intern">Intern</option>
                            <option value="Part-Time">Part-Time</option>
                            <option value="Contract">Contract</option>
                            <option value="Full-Time">Full-Time</option>
                        </select>
                    </div>
                    <div class="form-label-group">
                        <label> Salary (CAD)</label>
                        <input type="text" class="form-control" name="jobSalary" id="jobSalary"/>
                    </div>
                    <div class="form-label-group">
                        <label> Description </label>
                        <textarea rows="10" class="form-control" id="jobDescription" name="jobDescription" placeholder="Write the job description" ></textarea>
                    </div>
                    <div class="formContinue">
                        <div class="formLeft">
                            <p><a href="#">Back</a></p>
                        </div>
                        <div class="formRight">
                            <button class="btn btn-primary" name="continue2" id="continue2" class="continueButton">Continue</button>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>


            <div id="create_form_3" class="create_form">
                <div class="heading">
                    <h1 class="title">Company Information</h1>
                    <p class="step">Step 3 of 3</p>
                    <div class="clear"></div>
                </div>
                <div class="body">
                    <h2>Tell us about you!</h2>

                    <div class="form-label-group">
                        <label> Company List </label>
                        <select name="company_id" id="company_id" class="form-control">
                            <?php foreach ($companies as $c) {
                                ?>
                                <option value="<?= $c->id ?>"><?= $c->name ?></option>
                                <?php
                            }
                            ?>
                            <option value="Other">========Other========</option>
                        </select>

                    </div>
                    <div id="formCompany">
                        <div class="form-label-group">
                            <label> Company Name  </label>
                            <input class="form-control" id="companyName" name="companyName" />
                        </div>
                        <div class="form-label-group">
                            <label> Description </label>
                            <textarea rows="10"  class="form-control" id="companyDescription" name="companyDescription" placeholder="Write the company description" ></textarea>
                        </div>
                        <div class="form-label-group">
                            <label> Head Office </label>
                            <input type="text" class="form-control" name="headOffice" id="headOffice" placeholder="City"/>
                        </div>
                        <div class="form-label-group">
                            <label> Line of Business </label>
                            <input type="text" class="form-control" name="lob" id="lob"/>
                        </div>
                        <div class="form-label-group">
                            <label> Website </label>
                            <input type="text" class="form-control" name="website" id="website"/>
                        </div>
                        <div class="form-label-group">
                            <label> Employees </label>
                            <select name="employees" class="form-control" name="employees">
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
                    </div>
                    <div class="formContinue">
                        <div class="formLeft">
                            <p><a href="#">Back</a></p>
                        </div>
                        <div class="formRight">
                            <button type="submit" class="btn btn-primary" name="submit" id="submit" class="continueButton">Submit</button>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>

            </div>
        </form>
    </section>
</main>
<?php include '../../Includes/footer.php';?>
</body>
</html>
