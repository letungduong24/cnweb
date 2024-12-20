<?php
    include './db/conn.php';
    include './headers.php';
?>
<body>
    <div class="container">
        <div class="heading d-flex justify-content-between mt-5">
            <h3 class="d-flex justify-content-center">Dashboard Thêm hoa</h3>
        </div>
        <form class="mb-3" action="./db/handlecreate.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Tên hoa</label>
                <input type="text" class="form-control" id="name" placeholder="Tên hoa" name="name">
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Ảnh hoa</label>
                <input type="file" name="link" id="link" required>
            </div>
            <div class="mb-3">
                <label for="des" class="form-label">Mô tả</label>
                <textarea placeholder="Mô tả hoa" name="des" class="form-control" id="des" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
        </form>
    </div>
</body>
</html>