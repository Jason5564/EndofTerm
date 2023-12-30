<?php
    include ("conn.php");
    session_start();

?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_SESSION['id'];
        $content = $_POST['reponse_content'];
        $qa_id = $_POST['response_qa_id'];

        $insert_sql = "INSERT INTO response (user_name, content, qa_id) VALUES
        ('$username', '$content', '$qa_id')";

        mysqli_query($conn, $insert_sql);


        header("Location: qa_show.php");
    }
?>