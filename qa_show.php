<?php
    include("conn.php");
    session_start();




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QA-Show</title>
    <!-- 引入 Bootstrap 的 CSS 文件 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<script>
    function openTweetModal(tweetId) {
        $('#tweetModal' + tweetId).modal('show');
    }
</script>
<style>
    .card:hover {
        background-color: #f0f0f0; /* 懸停時的背景顏色 */
        cursor: pointer; /* 將滑鼠指針設定為手型 */
    }
</style>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse">

            <a class="navbar-brand" href="#">Navbar</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item"><a class="nav-link" href="index.php">HOME</a></li>
                <li class="nav-item"><a class="nav-link" href="qa_show.php">qa_show</a></li>
                <li class="nav-item ml-auto"><a class="nav-link" href="Logout.php">LOGOUT</a></li>
            </ul>
            
        </div>
            
    </nav>
    
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
            <div class="card mb-3" onclick="openTweetModal('<?= $tweet['id']; ?>')">
                <div class="card-body">
                    <h5 class="card-title"><?php echo "Title: " ?><?= $tweet['title']; ?></h5>
                    <p class="card-text"><?php echo "Post_user: " ?><?= $tweet['post_user'] ?></p>
                    <p class="card-text"><?php echo "Content: "?><?= $tweet['content'] ?></p>


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
                                    <p><?= $tweet['content']; ?></p>
                                    
                                    <!-- 留言區的 card，這只是一個簡單的例子，你可能需要更複雜的結構 -->
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="card-subtitle mb-2 text-muted">Comment User</h6>
                                            <p class="card-text">Comment Content</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <!-- 其他 Modal 底部的按鈕或操作 -->
                                </div>
                            </div>
                        </div>
                    </div>



                    <p class="card-text text-end">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
  <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
</svg>
                    <?= $tweet['thumb_up']; ?>


                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="red" class="bi bi-hand-thumbs-down-fill" viewBox="0 0 16 16">
  <path d="M6.956 14.534c.065.936.952 1.659 1.908 1.42l.261-.065a1.378 1.378 0 0 0 1.012-.965c.22-.816.533-2.512.062-4.51.136.02.285.037.443.051.713.065 1.669.071 2.516-.211.518-.173.994-.68 1.2-1.272a1.896 1.896 0 0 0-.234-1.734c.058-.118.103-.242.138-.362.077-.27.113-.568.113-.856 0-.29-.036-.586-.113-.857a2.094 2.094 0 0 0-.16-.403c.169-.387.107-.82-.003-1.149a3.162 3.162 0 0 0-.488-.9c.054-.153.076-.313.076-.465a1.86 1.86 0 0 0-.253-.912C13.1.757 12.437.28 11.5.28H8c-.605 0-1.07.08-1.466.217a4.823 4.823 0 0 0-.97.485l-.048.029c-.504.308-.999.61-2.068.723C2.682 1.815 2 2.434 2 3.279v4c0 .851.685 1.433 1.357 1.616.849.232 1.574.787 2.132 1.41.56.626.914 1.28 1.039 1.638.199.575.356 1.54.428 2.591z"/>
</svg>
                    <?= $tweet['thumb_down']?>
                    </p>
                    <p class="card-text text-end"><small class="text-muted"><?php echo "created at " ?><?= $tweet['created_at']; ?></small></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- 引入 Bootstrap 的 JavaScript 文件 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOB
