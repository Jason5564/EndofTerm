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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="NavBar.css" />
    <link rel="stylesheet" href="note.css">
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

        <div class="menuBtn" style="margin-left: auto">
            <a href="Logout.php" style="color: #ff4f4f">Logout</a>
        </div>
    </div>

    <div class="content">
        <div class="sidebar">
            <div class="note-list">
                <button class="new-note-btn" onclick="createNote()">新增筆記</button>
                <ul id="notes">
                    <!-- 這裡將顯示筆記列表 -->
                </ul>
            </div>
        </div>
        <div class="main-content">
            <div id="noteContent">
                <!-- 這裡將顯示筆記的內容 -->
            </div>
        </div>
    </div>

</body>

<script src="note.js"></script>

</html>