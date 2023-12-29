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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="NavBar.css"/>
    <title>首頁</title>
</head>

<body>
    <div class="navbar">
        <div class="menuBtn" style="margin-left: 25px;">
            <a href="index.php">首頁</a>
        </div>

        <div class="menuBtn" style="margin-left: 25px;">
            <a href="note.html">筆記</a>
        </div>

        <div class="menuBtn" style="margin-left: 25px;">
            <a href="LinkCoursesPage.php">課程連結</a>
        </div>

        <div class="menuBtn" style="margin-left: auto">
            <a><?php echo $_SESSION['id']; ?></a>
            <a href="Logout.php" style="color: #ff4f4f">Logout</a>
        </div>
    </div>


</body>

<script>
</script>
</html>