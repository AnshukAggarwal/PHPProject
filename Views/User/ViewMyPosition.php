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
        $review = new reviews();
        $company = $review->searchcompanybyid($dbcon, $companyid);
        $results = $stats->allposition($dbcon, $companyid);  
    ?>
        <?php
            foreach ($company as $comp)
            {
        ?>
            <div style="background-color:aliceblue">
                <h2 class="shift"><?= $comp[1]; ?></h2>
                <h3 class="shift"><?= $comp[2]; ?></h3>
            </div>
        <?php
            }
        ?>
        <main id="main">
            <section id="section1" style="padding-top: 0">
                
                
                <h1>Position detail's</h1>
                <table class="table table-striped">
                    
                    <tr>
                        <th>Position</th>
                        <th>Wages</th>
                        <th>Action</th>
                    </tr>
                <?php
                    foreach ($results as $result)
                    {
                ?>
                    <tr>
                        <td><?= $result[2]?></td>
                        
                        <td><?= $result[3]?>/hr</td>
                        <td><a href="EditPosition.php?positionid=<?= $result[0] ?>">Edit</a> / <a href="DeletePosition.php?positionid=<?= $result[0] ?>">Delete</a></td>
                    </tr>
                <?php
                    }
                ?>
                </table>
            </section>
        </main>
    <?php include '../../Includes/footer.php';?>
    </body>
</html>
