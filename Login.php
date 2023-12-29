<?php
session_start();

include "conn.php";

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['id']) && isset($_POST['password'])) {
    $id = validate($_POST['id']);
    $password = validate($_POST['password']);
    $captcha = validate($_POST['captcha']);

    if (empty($id)){
        header("Location: LoginPage.php?error=id is required");
        exit();
    }else if(empty($password)){
        header("Location: LoginPage.php?error=password is required");
        exit();
    }else{
        $sql = "SELECT * FROM user_account WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row['hash_pwd'])) {
                if ($captcha === "3n3D") {
                    echo "Logged in!";
                    $_SESSION['id'] = $row['id'];

                    header("Location: index.php");
                    exit();
                }
                else {
                    header("Location: LoginPage.php?error=captcha error");
                    exit();
                }
            }else{
                header("Location: LoginPage.php?error=wrong id or password");
                exit();
            }
        }else{
            header("Location: LoginPage.php?error=wrong id or password");
            exit();
        }
    }
}
else{
    header("Location: LoginPage.php");
    exit();
}
?>