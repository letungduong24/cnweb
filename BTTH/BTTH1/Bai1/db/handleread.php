<?php
include './db/conn.php';
$handle = $conn->prepare('SELECT *FROM FLOWERS');
    $handle->execute();
    $result = $handle->get_result();

    if($result->num_rows>=1){
        $flowers = $result->fetch_all(MYSQLI_ASSOC);
    }
    else{
        $flowers = [];
    }
    $handle->close();
    return $flowers;