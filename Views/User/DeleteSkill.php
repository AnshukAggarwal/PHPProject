<?php
session_start();
require_once '../../Models/Skills.php';
if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}
$user_id=$_SESSION['user_id'];
$skill_title=$_GET['skill'];
echo($skill_title);
$seekerSkills=new Skills();
if($seekerSkills->DeleteSkill($user_id,$skill_title))
{
    echo('deleted succesfully');
    header('location:UpdateSkills.php');
}
