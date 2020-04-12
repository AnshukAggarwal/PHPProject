<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    header('location:login.php');
}
$user_id=$_SESSION['user_id'];
$sno=1;
require_once '../../Models/Skills.php';
$seekerSkills=new Skills();
$profileSkills=$seekerSkills->GetSkills($user_id);
if(isset($_POST['add_skill'])){
    $newSkill=$_POST['new_skill'];
    $seekerSkills->AddSkill($user_id,$newSkill);
    header('location:UpdateSkills.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add | Delete Skills</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../Styles/Style_Index_Search.css">
</head>
<body>

<?php include '../../Includes/AfterLoginHeader.php';?>
<hr>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10">
            <h2>Add Skills / Delete Skills</h2></div>
    </div>
    <!--/col-3-->
    <div class="col-sm-9" style="width: 100%">

        <div class="tab-content">

                <form class="form" method="post">
                    <div class="form-group">

                        <div class="col-xs-6">
                            <label for="Skill">
                                <h5>Add Skill</h5></label>
                            <input type="text" class="form-control" name="new_skill" placeholder="Add Skill" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <br>
                            <button class="btn btn-info" style="margin: 0" type="submit" name="add_skill" >Add</button>

                        </div>
                    </div>
                </form>
                <div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Skill Title</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($profileSkills as $skill)
                            {
                                $value=htmlentities($skill['skill_title']);
                                echo('<tr>');
                                echo('<td>'.$sno.'</td>');
                                echo('<td>'.$value.'</td>');
                         ?>
                         <td><a href="DeleteSkill.php?skill=<?php echo $value ?>">Delete</a> </td>
                        <?php echo('</tr>');
                                $sno=$sno+1;
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
<?php include '../../Includes/footer.php';?>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
    </body>
    </html>