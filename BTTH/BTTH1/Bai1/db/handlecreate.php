<?php
include './conn.php';
if(isset($_POST['name'])){
    $name = trim($_POST['name']);
    $des = trim($_POST['des']);

    $uploadDir = '../images/';
    $fileName = $_FILES['link']['name'];
    $filePath = $uploadDir . $fileName;
    $isMoved = move_uploaded_file($_FILES['link']['tmp_name'], $filePath);

    if ($isMoved) {
        $flowerData = [
            'name' => $name,
            'des' => $des,
            'link' => 'images/' . $fileName
        ];
    } else {
        echo "Không thể lưu file!";
    }
    $handle = $conn->prepare('INSERT INTO `flowers`(`name`, `link`, `des`) VALUES (?, ?, ?)');
    $handle->bind_param("sss", $flowerData['name'], $flowerData['link'], $flowerData['des']);
    $handle->execute();
    $handle->close();
    header('Location: ../dashboard.php');
    exit();
}