<?php
session_start();
require_once '../../Models/Education.php';
if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}
$user_id=$_SESSION['user_id'];
$education_id=$_GET['id'];
$education=new Education();
if($education->DeleteEducation($education_id))
{
    echo('deleted succesfully');
    header('location:UserProfile.php');
}
