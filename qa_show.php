<?php
    include("conn.php");
    session_start();
    if(!isset($_SESSION['id'])){
        header("location: Login.php?error=Need to login first");
        exit();
    }

        header('X-Content-Type-Options: nosniff');

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QA-Show</title>
    <!-- 引入 Bootstrap 的 CSS 文件 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link href="NavBar.css" rel="stylesheet"/>
    <link rel="stylesheet" href="NavBar.css">
</head>
<script>
    
</script>
<style>
    .card:hover {
        background-color: #f0f0f0; /* 懸停時的背景顏色 */
        cursor: pointer; /* 將滑鼠指針設定為手型 */
    }
</style>

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
        <a><?php echo $_SESSION['id']; ?></a>
        <a href="Logout.php" style="color: #ff4f4f">Logout</a>
    </div>
</div>
    
    <div class="container mt-5">
        


        <!-- 推文發布區域 -->
        <div class="card mb-3">
            <div class="card-body">
                <form action="post_message.php" method="post">
                        <label for="username" class="form-label"> <?php echo $_SESSION['id'] ?></label>
                        <input type="text" id="username" name="username" class="form-control" hidden="true">
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title: </label>
                        <input type="text" id="title" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">留言內容：</label>
                        <textarea id="content" name="content" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">發布留言</button>
                </form>
            </div>
        </div>

        <!-- 推文顯示區域 -->
        <?php
            $select_qa_sql = "SELECT * FROM qa_shows";
            $qa_show = mysqli_query($conn, $select_qa_sql);
        ?>

        <?php foreach ($qa_show as $tweet) : ?>
            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tweetModal<?= $tweet['id'] ?>">
            Launch static backdrop modal
            </button> -->

            <div class="card mb-3" data-bs-toggle="modal" data-bs-target="#tweetModal<?= $tweet['id'] ?>" >
                <div class="card-body">
                    <h5 class="card-title"><?php echo "Title: " ?><?= $tweet['title']; ?></h5>
                    <p class="card-text text-end"><?php echo "Post_user: " ?><?= $tweet['post_user'] ?></p>
                    <p class="card-text text-break text-wrap"><?= $tweet['content'] ?></p>

                    <p class="card-text text-end"><small class="text-muted"><?php echo "created at " ?><?= $tweet['created_at']; ?></small></p>
                </div>
            </div>

             <!-- Modal -->
             <div class="modal fade" id="tweetModal<?= $tweet['id']; ?>" tabindex="-1" aria-labelledby="tweetModalLabel<?= $tweet['id']; ?>" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tweetModalLabel<?= $tweet['id']; ?>"><?= $tweet['title']; ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <!-- 在這裡顯示 Tweet 的內容，例如 content、留言等 -->
                                    
                                    <p class="mt-3 text-wrap text-break" style="width: 100%;"><?= $tweet['content']; ?></p>

                                </div>

                                


                                <div class="modal-body">
                                    <!-- 留言區的 card，這只是一個簡單的例子，你可能需要更複雜的結構 -->
                                    <!-- post response -->
                                    

                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <form action="post_response.php" method="post">
                                                    <label for="response_username<?= $tweet['id'] ?>" class="form-label"> <?php echo $_SESSION['id'] ?></label>
                                                    <input type="text" id="response_username<?= $tweet['id'] ?>" name="response_username" class="form-control" hidden="true">

                                                
                                                    <label for="response_qa_id<?= $tweet['id'] ?>" class="form-label"></label>
                                                    <input type="text" id="response_qa_id<?= $tweet['id'] ?>" name="response_qa_id" class="form-control" value='<?= $tweet['id'] ?>' hidden="true">
                                                
                                                <div class="mb-3">
                                                    <label for="reponse_content<?= $tweet['id'] ?>" class="form-label">留言內容：</label>
                                                    <textarea id="reponse_content<?= $tweet['id'] ?>" name="reponse_content" class="form-control" rows="3" required></textarea>
                                                </div>
                                                <button type="submit" name="submit" class="btn btn-primary">發布留言</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <!-- 其他 Modal 底部的按鈕或操作 -->
                                    <?php
                                        $qa_id = $tweet['id'];
                                        $select_response_sql = "SELECT * FROM response WHERE qa_id = '$qa_id'";
                                        $response_show = mysqli_query($conn, $select_response_sql);
                                    ?>

                                    <?php foreach ($response_show as $response) : ?>
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo "User: " ?><?= $response['user_name']; ?></h5>
                                                
                                                <p class="card-text text-break text-wrap"><?= $response['content'] ?></p>
                                                
                                                <p class="card-text text-end"><?= $response['response_time'] ?></p>
                                                
                                            </div>
                                        </div>

                                    <?php endforeach; ?>
                                </div>
                                <div class="modal-footer"></div>
                            </div>
                        </div>
                    </div>

        <?php endforeach; ?>
    </div>

    <!-- 引入 Bootstrap 的 JavaScript 文件 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>