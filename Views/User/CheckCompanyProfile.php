<?php
session_start();
require_once '../../Models/Users.php';
if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}
$user__id=$_SESSION['user_id'];
$user_role=$_SESSION['user_role'];
$user_login = new Users();
$status=$user_login->ProfileStatus($user__id);
//print_r($status['profile_status']);
$active="ACTIVE";
$inactive="INACTIVE";
if($status['profile_status']==$active && $user_role=="employer")
{
    header('location:ViewCompanyProfile.php');
}
elseif($status['profile_status']==$active && $user_role=="user")
{
    header('location:UserProfile.php');
}
elseif($status['profile_status']==$inactive && $user_role=="user")
{
    header('location:AddInformation.php');
}
elseif($status['profile_status']==$inactive && $user_role=="employer")
{
    header('location:CreateCompanyProfile.php');
}