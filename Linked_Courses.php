<?php
// 假設這裡是你的資料庫連線設定
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

// 建立連線
$conn = new mysqli($servername, $username, $password, $dbname);

// 檢查連線是否成功
if ($conn->connect_error) {
    die("連線失敗: " . $conn->connect_error);
}

// 從資料庫中選擇所需的資料
$sql = "SELECT school, college, course_name, course_category, course_link FROM courses";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 輸出資料每一列
    while($row = $result->fetch_assoc()) {
        echo "學校: " . $row["school"]. " - 學院: " . $row["college"]. " - 課程名稱: " . $row["course_name"]. " - 課程分類: " . $row["course_category"]. " - <a href='" . $row["course_link"]. "'>連結</a><br>";
    }
} else {
    echo "0 筆結果";
}

// 關閉資料庫連線
$conn->close() ;
?>
