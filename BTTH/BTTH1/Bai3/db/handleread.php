<?php
include './db/conn.php';
$handle = $conn->prepare('SELECT *FROM students');
    $handle->execute();
    $result = $handle->get_result();

    if($result->num_rows>=1){
        $students = $result->fetch_all(MYSQLI_ASSOC);
    }
    else{
        $students = [];
    }
    $handle->close();