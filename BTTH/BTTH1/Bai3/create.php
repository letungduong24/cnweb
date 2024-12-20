<?php
    include './db/conn.php';
    include './header.php';
?>
<body>
    <div class="container">
        <div class="heading d-flex justify-content-between mt-5">
            <h3 class="d-flex justify-content-center">Upload file sinh viên</h3>
        </div>
        <form class="mb-3" action="./db/handlecreate.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="file" class="form-label">File sinh viên</label>
                <input type="file" name="file" id="link" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</body>
</html>