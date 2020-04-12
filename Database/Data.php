<?php

require_once 'Database.php';
require_once 'JobDB.php';
require_once 'CompanyDB.php';

if (isset($_POST['id'])) {

    $dbconn = Database::getDb();
    $jobDB = new JobDB($dbconn);
    $job = $jobDB->getJobByID($_POST['id']);
    echo json_encode($job);
}

if (isset($_POST['companyId'])) {

    $dbconn = Database::getDb();
    $companyDB = new CompanyDB($dbconn);
    $company= $companyDB->findCompany($_POST['companyId']);
    $companyName = $company[0]->name;
    echo $companyName;
}

?>

