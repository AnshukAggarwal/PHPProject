<?php
session_start();
echo "Logged out successfully";
session_destroy();
header("Location: Index.php");


