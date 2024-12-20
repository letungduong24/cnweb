<?php
    include './db/conn.php';
    include './headers.php';
    include './db/handleread.php';
?>
<body>
    <div class="container">
        <h1 class="mt-2 d-flex justify-content-center">14 loại hoa tuyệt đẹp thích hợp trồng để khoe hương sắc dịp xuân hè</h1>
        <div class="wrap-dashboard d-flex justify-content-center mb-3">
            <a href="./dashboard.php" class="btn btn-success">Trang quản trị</a>
        </div>
    </div>
    <div class="container shadow d-flex flex-column align-items-center">
        <?php foreach($flowers as $index => $flower){ ?>
            <div class="card mb-4" style="width: 50%;">
                <img src="<?php echo $flower['link']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $flower['name']; ?></h5>
                    <p class="card-text"><?php echo $flower['des']; ?></p>
                </div>
            </div>
        <?php }; ?>
    </div>
</body>
</html>