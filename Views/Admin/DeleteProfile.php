<?php
require_once '../../Database/Database.php';
require_once '../../Models/Company.php';
if(isset($_POST['delete'])){
    $id=$_POST['deleteprofile'];
    $db= Database::getDb();
    $c= new Company();
    $c->deleteProfile($id,$db);
    header('location:ListProfiles.php');
}