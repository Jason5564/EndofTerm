<?php
//echo password_hash("123", PASSWORD_BCRYPT);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="LoginPage.css">
    <link rel="stylesheet" href="NavBar.css">
</head>
<body>
    <div class="navbar">
        <div class="menuBtn" style="margin-left: 25px;">
            <a href="index.php">Home</a>
        </div>
    </div>

    <div class="loginBlock center" style="margin-top: 150px">
        <div style="font-size: 35px; font-family: 'Noto Sans TC', sans-serif; font-weight: bold; color: white; text-align: center; letter-spacing: 6px;">
            LOGIN
        </div>

        <form action="Login.php" method="post" class="loginForm">
            <?php if (isset($_GET['error'])) { ?>
                <p class="error" style="color: #ff4f4f; text-align: center; font-family: 'Noto Sans TC', sans-serif;"><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <input type="text" name="id", placeholder="id" required="required" class="center inputBox">
            <br>
            <input type="password" name="password", placeholder="Password" required="required" class="center inputBox">
            <br>

            <input type="submit" value="Submit" class="center btnSubmit">

        </form>
    </div>
</body>
</html>
