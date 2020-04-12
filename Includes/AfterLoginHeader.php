<header>
    <nav id="navigation">
        <div id="logo">
            <a href="../User/Index.php"> <span id="logo"><img src="../../Images/logo.png" /></span></a>
        </div>
        <div id="nav_links">
            <ul id="menu">
                <li><a class="link" href="../../Views/User/Search.php">Find Jobs</a></li>
                <li><a class="link" href="../../Views/User/CompanyReviews.php">Company Reviews</a></li>
                <li><a class="link" href="../../Views/User/FindSalaries.php">Find Salaries</a></li>
            </ul>
        </div>
        <div id="nav_icons">
            <ul>
                <li class="link"><i class="fad fa-comments-alt fa-lg"></i></li>
                <li class="link"><i class="far fa-bell fa-lg"></i></li>
                <li class="link"><a href="CheckProfile.php"> <i class="far fa-user fa-lg"></i></a></li>
            </ul>
        </div>
        <div id="login_register">
            <span class="link"><a href="../User/UserHome.php"><?php echo($_SESSION['user_email']);?></a></span>
            <span class="link"><a href="../User/Logout.php">Logout</a></span>
        </div>
    </nav>
</header>
