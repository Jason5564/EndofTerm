<?php
session_start();
if(!isset($_SESSION['id'])){
    header("location: Login.php?error=Need to login first");
    exit();
}

include "GetDataFromDB.php";
include "conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="NavBar.css" rel="stylesheet"/>
</head>

<body>
    <div class="navbar">
        <div class="menuBtn" style="margin-left: 25px;">
            <a href="index.php">Home</a>
        </div>

        <div class="menuBtn" style="margin-left: auto">
            <a href="Logout.php" style="color: #ff4f4f">Logout</a>
        </div>
    </div>

</body>

<script>
</script>
</html>