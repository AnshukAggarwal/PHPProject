<html>
    <head>
        <?php
        session_start();
        $companyid = $_SESSION['compid'];
        ?>
        <title>
            Find salaries
        </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Styles/Style_CompanyReviews.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../../Scripts/Script_Index_Search.js"></script>
    </head>
    <body>
    <?php 
        include '../../Includes/header.php';
        require '../../Database/Database1.php';
        require '../../Models/Reviews.php';
        require '../../Models/statistics.php';
        $dbcon = Database::getDb();
        $stats = new Statistics();
       
        if(isset($_POST['add']))
        {
            $position = $_POST['position'];
            $wages = $_POST['wages'];
            $stats->addposition($dbcon, $position, $wages, $companyid);
        }
    ?>
        <main id="main">
            <form action="ViewMyPosition.php" method="post">
                    <input type="submit" style="float: right;" class="btn btn-primary" name="addposition" value="View your Position's">
                </form>
            <h1>Add position</h1>
            <form action="#" method="post"> 
                <div class="col-md-2">
                    Position :
                </div>
                <div class="col-md-4">
                    <input type="text" name="position" class="form-control" />
                </div>
                <div class="col-md-2">
                    Wages :
                </div>
                <div class="col-md-4">
                    <input type="text" name="wages" class="form-control" />
                </div>

                <div class="col-lg-1" style="padding-top: 1%">
                    <input type="submit" name="add" value="Add" class="btn btn-primary" />
                </div>
            </form>
        </main>
    <?php include '../../Includes/footer.php';?>
    </body>
</html>
