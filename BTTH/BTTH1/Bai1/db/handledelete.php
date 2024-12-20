<?php
include './conn.php';

if (isset($_POST['id-del'])) {
    $id = $_POST['id-del'];
    $handle = $conn->prepare('DELETE FROM `flowers` WHERE id = ?');
    $handle->bind_param("s", $id);
    $handle->execute();
    header('Location: ../dashboard.php');
    $handle->close();
}