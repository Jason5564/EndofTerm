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
    <link rel="stylesheet" href="note.css"/>
    <title>首頁</title>
</head>

<body>
<nav class="navigation">
    <ul>
        <li><a href="index.php">首頁</a></li>
        <li><a href="LinkCoursesPage.php">課程連結</a></li>
    </ul>
</nav>
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

<script src="note.js"></script>
</body>
</html>