<?php
session_start();
require_once '../../Models/Experience.php';
if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}
$user_id=$_SESSION['user_id'];
$experience_id=$_GET['id'];
$experience=new Experience();
if($experience->DeleteExperience($experience_id))
{
    echo('deleted succesfully');
    header('location:UserProfile.php');
}
