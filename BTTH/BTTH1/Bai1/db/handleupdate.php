<?php
include './conn.php';

if (isset($_POST['name-up']) || isset($_POST['des-up']) || isset($_POST['id-up'])) {
    $name = trim($_POST['name-up']);
    $des = trim($_POST['des-up']);
    $id = $_POST['id-up'];
    if (isset($_FILES['link-up']) && $_FILES['link-up']['error'] == 0) {
        $uploadDir = '../images/';
        $fileName = $_FILES['link-up']['name'];
        $filePath = '$uploadDir' . $fileName;
        if (move_uploaded_file($_FILES['link-up']['tmp_name'], $filePath)) {
            $filePathUpdated = 'images/' . $fileName;
        } else {
            echo "Không thể lưu file!";
            exit();
        }
    } else {
        $filePathUpdated = null; 
    }

    if ($filePathUpdated) {
        $handle = $conn->prepare('UPDATE `flowers` SET name = ?, link = ?, des = ? WHERE id = ?');
        $handle->bind_param("ssss", $name, $filePathUpdated, $des, $id);
    } else {
        $handle = $conn->prepare('UPDATE `flowers` SET name = ?, des = ? WHERE id = ?');
        $handle->bind_param("sss", $name, $des, $id);
    }

    if ($handle->execute()) {
        header('Location: ../dashboard.php');
        exit();
    } else {
        echo "Lỗi khi cập nhật dữ liệu!";
    }

    $handle->close();
}