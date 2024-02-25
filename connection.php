<?php
$servername = "localhost";
$username = "root";
$pass = "";
$db = "todo";
$conn = mysqli_connect($servername, $username, $pass, $db);
if(!$conn){
    echo mysql_conn_error($conn);
}
?>