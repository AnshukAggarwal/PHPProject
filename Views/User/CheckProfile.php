<?php
session_start();
require_once '../../Models/Users.php';
if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}
$user__id=$_SESSION['user_id'];
$user_login = new Users();
$status=$user_login->ProfileStatus($user__id);
//print_r($status['profile_status']);
$active="ACTIVE";
if($status['profile_status']==$active)
{
    header('location:UserProfile.php');
}
else
{
    header('location:AddInformation.php');
}