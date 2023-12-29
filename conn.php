<?php

$db_server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "learn_platform";
try {
    $conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
}
catch(mysqli_sql_exception $ex) {
    echo"Can not Connected";
}

?>