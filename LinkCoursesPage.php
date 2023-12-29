<!DOCTYPE html>
<html>
<head>
    <title>學校課程表</title>
</head>
<body>

<table border="1">
    <tr>
        <th>學校名稱</th>
        <th>課程內容</th>
        <th>連結</th>
    </tr>

    <?php
    session_start();
    include "conn.php";

    // 從資料庫中選擇所需的資料
    $sql = "SELECT id, school, Course_Title, url FROM opening_course";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        // 輸出資料每一列
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["school"] . "</td>";
            echo "<td>" . $row["Course_Title"] . "</td>";
            echo "<td><a href='" . $row["url"] . "' target='_blank'>連結</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>0 筆結果</td></tr>";
    }

    // 關閉資料庫連線
    $conn->close();
    ?>

</table>

</body>
</html>
