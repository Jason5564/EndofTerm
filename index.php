<?php
session_start();
if (!isset($_SESSION['id'])) {
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
    <link rel="stylesheet" href="NavBar.css" />
    <link rel="stylesheet" href="note.css" />
    <title>首頁</title>
</head>

<body>
    <div class="navbar">
        <div class="menuBtn" style="margin-left: 25px;">
            <a href="index.php">筆記</a>
        </div>

        <div class="menuBtn" style="margin-left: 25px;">
            <a href="LinkCoursesPage.php">課程連結</a>
        </div>

        <div class="menuBtn" style="margin-left: 25px;">
            <a href="qa_show.php">問題討論區</a>
        </div>

        <div class="menuBtn" style="margin-left: auto">
            <a>
                <?php echo $_SESSION['id']; ?>
            </a>
            <a href="Logout.php" style="color: #ff4f4f">Logout</a>
        </div>
    </div>

    <div class="content1">
        <div class="sidebar">
            <div class="note-list">
                <button class="new-note-btn" onclick="createNotebook()">新增筆記本</button>
                <div id="accordion">

                </div>
            </div>
        </div>
        <div class="main-content">
            <div id="noteContent">
                <!-- 這裡將顯示筆記的內容 -->
            </div>
        </div>
    </div>

    <script src="note.js"></script>
</body>

</html>