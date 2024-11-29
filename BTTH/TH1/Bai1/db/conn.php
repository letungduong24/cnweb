<?php
$conn = new mysqli("localhost", "root", "", "flowermanager");
if($conn->connect_error){
    die("Kết nối thật bại");
}
