<?php
$conn = new mysqli("localhost", "root", "", "studentmanager");
if($conn->connect_error){
    die("Kết nối thật bại");
}

