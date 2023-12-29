<?php
    include ("conn.php");


?>


<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $title = $_POST['title'];
        $content = $_POST['content'];

        $insert_sql = "INSERT INTO qa_shows (post_user, title, content, thumb_up, thumb_down) VALUES
        ('$username', '$title', '$content', 0, 0)";

        mysqli_query($conn, $insert_sql);


        header("Location: qa_show.php");
    }
?>