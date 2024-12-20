<?php
include './conn.php';

if (isset($_FILES['file'])) {
    $file_tmp = $_FILES['file']['tmp_name'];
    $handle = fopen($file_tmp, "r");

    $truncate_sql = "TRUNCATE TABLE students";
    if (!$conn->query($truncate_sql)) {
        echo "Lỗi khi làm sạch bảng: " . $conn->error;
        exit();
    }

    $students = [];
    $header = fgetcsv($handle); 
    while (($data = fgetcsv($handle)) !== false) {
        $students[] = $data; 
    }

    foreach ($students as $student) {
        $stmt = $conn->prepare('INSERT INTO `students`(`username`, `password`, `lastname`, `firstname`, `city`, `email`, `course1`) VALUES (?, ?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('sssssss', $student[0], $student[1], $student[2], $student[3], $student[4], $student[5], $student[6]);

        if (!$stmt->execute()) {
            echo "Lỗi khi chèn dữ liệu: " . $conn->error;
            exit();
        }
        $stmt->close();
    }

    fclose($handle);
    header('Location: ../index.php');
    exit();
}
?>
