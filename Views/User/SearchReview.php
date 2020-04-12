<html>
    <head>
        <title>
            search company
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
    $companyname=$_POST['search'];
    $search = new reviews();
    $companies = $search->searchcompany($dbcon, $companyname);
    
    ?>
        <main id="main">
            
            <section id="section2">
                <article id="popularCompanies">
                    <table border="1" class="table table-striped">
                        <tr>
                            <th>Company name</th>
                            <th>Company description</th>
                            <th>Action</th>
                        </tr>
                        <?php
                                foreach ($companies as $comp)
                                {
                            ?>
                        <tr>
                            
                            <td><a href="ReviewPage.php?id=<?= $comp[0]; ?>"><?= $comp[1]; ?></a></td>
                            <td><?= $comp[2]; ?></td>
                            <form action="WriteReview.php" method="post">
                                <input type="hidden" name="compid" value="<?= $comp[0]; ?>"/>
                                <td><input type="submit" name="writereview" class="btn btn-success" value="Write a review"/></td>    
                            </form>
                        </tr>
                        <?php
                                }
                        ?>
                            
                    </table>
                    
                </article>
            </section>
        </main>
    <?php include '../../Includes/footer.php';?>
    </body>
</html>

