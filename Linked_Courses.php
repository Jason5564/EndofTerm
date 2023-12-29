<?php

session_start();
include "conn.php";

// 從資料庫中選擇所需的資料
$sql = "SELECT id ,school, Course_Title, url FROM opening_course";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // 輸出資料每一列
    while($row = $result->fetch_assoc()) {
        echo "編號: " . $row["id"]. "學校: " . $row["school"].  " - 課程名稱: " . $row["Course_Title"].  " - <a href='" . $row["url"]. "' target='_blank'>連結</a><br>";
    }
} else {
    echo "0 筆結果";
}

// 關閉資料庫連線
$conn->close();
?>
