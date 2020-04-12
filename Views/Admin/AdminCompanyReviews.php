<html>
    <head>
        <?php
        session_start();
        
        if(isset($_GET['pageno']))
        {
            $pageno = $_GET['pageno'];
        }
        else
        {
            $pageno=1;
        }
        $offset =($pageno - 1) * 10;
        
        ?>
        <title>
            Admin view review
        </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../../Styles/Style_CompanyReviews.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.12.0/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="../../Scripts/Script_Index_Search.js"></script>
        <style>
            .checked {
                 color: orange;
            }
            
        </style>
    </head>
    <body>
    <?php 
        include '../../Includes/header.php';
        require '../../Database/Database.php';
        require '../../Models/Reviews.php';
        $dbcon = Database::getDb();
        $reviews = new reviews();
        $cc = $reviews->totalreviews($dbcon);
        $totalpages = ceil($cc/10);
        $datas = $reviews->viewallreviews($dbcon,$offset);
        
    ?>
        <main id="main">
            <h1 style="text-align: center;">Company reviews</h1>
                <table class="table table-striped">
                <tr>
                    <th>Company summary</th>
                    <th>Company Review</th>
                    <th>Pros</th>
                    <th>Cons</th>
                    <th>Job title</th>
                    <th>Job location</th>
                    <th>Company rating</th>
                    <th>Company</th>
                    <th>Action</th>
                </tr>
                <?php 
                foreach($datas as $data)
            { 
            ?>
                <tr>
                    <td><?= $data[1]; ?></td>
                    <td><?= $data[2]; ?></td>
                    <td><?= $data[3]; ?></td>
                    <td><?= $data[4]; ?></td>
                    <td><?= $data[5]; ?></td>
                    <td><?= $data[6]; ?></td>
                    <td>
                    <?php 
                        $rate = $data[7];
                        if($rate == 1)
                        {
                    ?>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    <?php
                        }
                        elseif($rate == 2)
                        {
                            ?>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star "></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <?php
                        }
                        elseif ($rate == 3) {
                            ?>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <?php   
                        }
                        elseif($rate == 4)
                        {
                            ?>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <?php
                        }
                        elseif($rate == 5)
                        {
                        ?>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <?php
                        }
                    ?>
                    </td>
                    <td><?= $data[11]; ?></td>
                    <td>
                      
                        <a href="../User/UpdateReview.php?id=<?= $data[0] ?>">Edit </a>/<a href="../User/DeleteReviews.php?id=<?= $data[0] ?>"> Delete</a>
                       
                    </td>
                </tr>
            <?php
            }
            ?>
            </table>
            <ul class="pagination">
                <li><a href="?pageno=1">First</a></li>
                <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                    <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
                </li>
                <li class="<?php if($pageno >= $totalpages){ echo 'disabled'; } ?>">
                    <a href="<?php if($pageno >= $totalpages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
                </li>
                <li><a href="?pageno=<?php echo $totalpages; ?>">Last</a></li>
            </ul>
        </main>
      
    <?php include '../../Includes/footer.php';?>
    </body>
</html>

