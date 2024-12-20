<?php
    include './db/conn.php';
    include './headers.php';
    include './db/handleread.php';
?>
<body>
    <div class="container">
        <div class="buttons d-flex justify-content-between">
            <h1 class="d-flex">Bài tập trắc nghiệm</h1>
            <a href="./create.php" class="btn btn-primary">Thêm bài tập</a>
        </div>
        <?php 
            if($score){ ?>
                <h3 class="mt-2 d-flex justify-content-center text-success">Bạn được <?php echo $score ?></h3>
        <?php } ?>
    </div>
    <form method="POST" action="" class="container shadow d-flex flex-column align-items-center">
        <?php foreach($questions as $index => $question){ ?>
            <div class="card mt-2" style="width: 50%;">
                <div class="card-body">
                    <h5 class="card-title">Câu <?php echo $question['id'] . ': ' . $question['question']; ?></h5>
                    <div class="form-check">
                        <label class="form-check-label"><?php echo $question['A']; ?></label>
                        <input class="form-check-input" type="radio" name="<?php echo $question['id']; ?>" value="A" required>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label"><?php echo $question['B']; ?></label>
                        <input class="form-check-input" type="radio" name="<?php echo $question['id']; ?>" value="B">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label"><?php echo $question['C']; ?></label>
                        <input class="form-check-input" type="radio" name="<?php echo $question['id']; ?>" value="C">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label"><?php echo $question['D']; ?></label>
                        <input class="form-check-input" type="radio" name="<?php echo $question['id']; ?>" value="D">
                    </div>
                </div>
            </div>
        <?php }; ?>
        <button type="submit" class="btn btn-primary mt-3">Nộp bài</button>
    </form>
</body>
</html>