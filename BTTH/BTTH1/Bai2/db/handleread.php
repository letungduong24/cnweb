<?php
include './db/conn.php';
$handle = $conn->prepare('SELECT *FROM questions');
    $handle->execute();
    $result = $handle->get_result();

    if($result->num_rows>=1){
        $questions = $result->fetch_all(MYSQLI_ASSOC);
    }
    else{
        $questions = [];
    }
    $handle->close();

$score = 0;
if (isset($_POST[1])) {
        foreach($questions as $question){
            $correctAnswers = explode(', ', $question['answer']);
            if (in_array($_POST[$question['id']], $correctAnswers)) {
                $score += 10;
            }
        }
    }

