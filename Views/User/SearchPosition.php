<html>
    <head>
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
        if(isset($_POST['searchsalary']))
        {
            $searchkey = $_POST['search'];
        }
        $dbcon = Database::getDb();
        $stats = new Statistics();
        $results = $stats->searchposition($dbcon, $_POST['search']);
        
        
    ?>
        <main id="main">
            <section id="section1">
                <form action="#" method="POST">
                    <input type="hidden" name="search" value="<?= $searchkey ?>"/>
                </form>
                <h1>Position detail's</h1>
                <table class="table table-striped">
                    
                    <tr>
                        <th>Position</th>
                        <th>Company name</th>
                        <th>Wages</th>
                    </tr>
                <?php
                    foreach ($results as $result)
                    {
                ?>
                    <tr>
                        <td><?= $result[2]?></td>
                        <td><a href="AllPosition.php?companyid=<?= $result[1] ?>"><?= $result[5]?></a></td>
                        <td><?= $result[3]?>/hr</td>
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
