<html>
    <head>
        <title>
            Search company
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
        require '../../Database/Database.php';
        require '../../Models/Reviews.php';
        $dbcon = Database::getDb();
        $r = new reviews();
        $reviews =  $r->viewall(Database::getDb());
        
    ?>
        <?php
            
        ?>
        <main id="main">
            <section id="section1">
                <h1>Search for the dream</h1>
                <h2>Discover thousands of jobs and reviews</h2>
                <form method="post" action="SearchReview.php">
                    <input type="text" name="search" id="search" placeholder="title,keywords, or company">
                    <input type="submit" class="btn btn-primary" value="Find Reviews">
                </form>
            </section>
            <section id="section2">
                <article id="popularCompanies">
                    <h1>Popular Companies</h1>
                    
                    
                    <div class="card-deck">
                        <?php
                            foreach ($reviews as $review)
                            {
                        ?>
                        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header"><a href="ReviewPage.php?id=<?= $review[0]; ?>"><?= $review[1]; ?></a></div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $review[2]; ?></h5>
                                
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
