<?php
    include ("conn.php");
    session_start();

?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_SESSION['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $insert_sql = "INSERT INTO qa_shows (post_user, title, content) VALUES
        ('$username', '$title', '$content')";

        mysqli_query($conn, $insert_sql);


        header("Location: qa_show.php");
    }
?>