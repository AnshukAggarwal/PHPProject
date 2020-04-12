<?php
require_once '../../Database/Database.php';
require_once '../../Database/JobDB.php';

$dbconn = Database::getDb();
$jobDB = new JobDB($dbconn);

if(isset($_POST['delete'])){
    $id=$_POST['deleteId'];
    $jobDB->deleteJob($id);
    header('location:ListJobs.php');
}