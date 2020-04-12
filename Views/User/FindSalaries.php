<html>
    <head>
        <?php
        session_start();
        $_SESSION['compid'] = 3;
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
        $results = $stats->viewall($dbcon);
    ?>
        <?php
            
        ?>
        <main id="main">
            <?php
            if(isset($_SESSION['compid']))
            {
            ?>
                <form action="AddPosition.php" method="post">
                    <input type="submit" style="float: right;" class="btn btn-primary" name="addposition" value="Add / View Position's">
                </form>
            <?php
                }
            ?>
            <section id="section1">    
            <h1>Search and compare salaries</h1>
            <form method="post" action="SearchPosition.php">
                <input type="text" name="search" id="search" placeholder="Enter a position title">
                <input type="submit" class="btn btn-primary" name="searchsalary" value="Find salary">
            </form>
            </section>
            <section id="section2">
                <article id="popularCompanies">
                    <h1>Popular job titles</h1>
                    
                    <div class="card-deck">
                        <?php
                        foreach($results as $result)
                        {
                            
                        
                        ?>
                        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header position"><?= $result[2] ?></div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $result[5] ?></h5>
                                <p id="wages"><?= $result[3]?>/hr</p>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                   
                </article>
            </section>
        </main>
    <?php include '../../Includes/footer.php';?>
    </body>
</html>
