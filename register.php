<?php
    include("conn.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>註冊</title>
    <!-- 引入 Bootstrap 的 CSS 文件 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- 引入 reCAPTCHA 的 JavaScript 鏈接 -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">註冊</h1>

                <?php
                // 處理註冊表單提交
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // 驗證 reCAPTCHA 回應
                    $recaptchaSecretKey = "6Ler_j8pAAAAACzl6bH5e2fbERHTQIsCpIVpI7AW";
                    $recaptchaResponse = $_POST['g-recaptcha-response'];
                    $recaptchaUrl = "https://www.google.com/recaptcha/api/siteverify?secret=$recaptchaSecretKey&response=$recaptchaResponse";
                    $recaptchaResult = json_decode(file_get_contents($recaptchaUrl));

                    if (!$recaptchaResult->success) {
                        // reCAPTCHA 驗證失敗，可能是機器人攻擊
                        echo '<div class="alert alert-danger" role="alert">reCAPTCHA 驗證失敗，請檢查你不是機器人。</div>';
                    } else {
                        // 驗證成功，繼續處理註冊
                        // 此處應包含註冊相關的程式碼，例如將使用者資訊寫入資料庫
                        // ...


                        $username = $_POST['username'];
                        $hash_pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $email = $_POST['email'];
                        $nickname = $_POST['nickname'];
                        
                        $insert_sql = "INSERT INTO user_account (id, hash_pwd, gmail, nickname) VALUES ('$username', '$hash_pwd', '$email', '$nickname')";
                        
                        if (mysqli_query($conn, $insert_sql) === TRUE) {
                            header("Location: index.php");
                        } else {
                            echo "error";
                        }

                        
                        echo '<div class="alert alert-success" role="alert">註冊成功！</div>';
                    }
                }
                ?>

                <!-- 註冊表單 -->
                <form action="register.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">使用者名稱：</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">密碼：</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email: </label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="nickname" class="form-label">暱稱：</label>
                        <input type="text" id="nickname" name="nickname" class="form-control" required>
                    </div>

                    <!-- 加入 reCAPTCHA 元素 -->
                    <div class="mb-3">
                        <div class="g-recaptcha" data-sitekey="6Ler_j8pAAAAAFmN2OkbZnPFPHny0TRpQo0ygPX8"></div>
                    </div>

                    <button type="submit" class="btn btn-primary">註冊</button>
                </form>
            </div>
        </div>
    </div>

    <!-- 引入 Bootstrap 的 JavaScript 文件，注意需要先引入 Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy2n8Cdfe7buQ/lAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
