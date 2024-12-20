<?php
$conn = new mysqli("localhost", "root", "", "quizz");
if($conn->connect_error){
    die("Kết nối thật bại");
}

