<html>
    <head>
        <title>
            Delete review
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
        $postid = $_GET['positionid'];
        $dbcon = Database::getDb();
        if(isset($_POST['delete']))
        {
            $stats->deleteposition($dbcon, $_POST['pid']);
        }
        elseif(isset ($_POST['nodelete']))
        {
            header("location:ViewMyPosition.php");
        }
        ?>
        <main id="main">
            <form method="post" action="#">
                <h3>Are you sure you want to delete this position?</h3>
                <input type="hidden" name="pid" value="<?= $postid; ?>" />
                <input type="submit" name="delete" value="Yes" class="btn btn-danger" />
                <input type="submit" name="nodelete" value="No" class="btn btn-warning" />
            </form>
        </main>
    <?php include '../../Includes/footer.php';?>
    </body>
</html>



