<?php
include './conn.php';
if (isset($_FILES['file'])) {
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_error = $_FILES['file']['error'];
    
    if ($file_error === 0) {
        $truncate_sql = "TRUNCATE TABLE questions";
        if (!$conn->query($truncate_sql)) {
            echo "Lỗi khi làm sạch bảng: " . $conn->error;
            exit();
        }

        $lines = file($file_tmp, FILE_IGNORE_NEW_LINES);
        $lines = array_filter($lines, function($line) {
            return trim($line) !== '';
        });
        if ($lines === false) {
            echo "Không thể đọc file.";
            exit();
        }
        $batchSize = 6;  
        for ($i = 0; $i < count($lines); $i += $batchSize) {
            $batch = array_slice($lines, $i, $batchSize);
            if (count($batch) < $batchSize) continue;  
            $question = $batch[0]; 
            $A = $batch[1]; 
            $B = $batch[2]; 
            $C = $batch[3]; 
            $D = $batch[4]; 
            $answer = substr($batch[5], 8); 
            $handle = $conn->prepare('INSERT INTO `questions`(`question`, `A`, `B`, `C`, `D`, `answer`) VALUES (?, ?, ?, ?, ?, ?)');
            $handle->bind_param('ssssss', $question, $A, $B, $C, $D, $answer);
            if (!$handle->execute()) {
                echo "Lỗi khi chèn câu hỏi: " . $conn->error;
                exit();
            }
            $handle->close();
        }

    } else {
        echo "Lỗi tải file!";
    }
    header('Location: ../index.php');
    exit();
}
?>
