<?php
    session_start();
    include("conn.php");

// 從資料庫中選擇所需的資料
$sql = "SELECT school, course_name, course_link FROM opening_course";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    // 輸出資料每一列
    while($row = $result->fetch_assoc()) {
        echo "學校: " . $row["school"].  " - 課程名稱: " . $row["course_name"].  " - <a href='" . $row["course_link"]. "' target='_blank'>連結</a><br>";
    }
} else {
    echo "0 筆結果";
}

// 關閉資料庫連線
$conn->close();
?>
