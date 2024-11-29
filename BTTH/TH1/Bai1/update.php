<?php
    include './db/conn.php';
    include './headers.php';
    $handle = $conn->prepare('select *from flowers where id=?');
    $handle->bind_param('s', $_POST['id']);     
    $handle->execute();
    $result = $handle->get_result();
    $row = $result->fetch_assoc();
    $conn->close();
?>
<body>
    <div class="container">
        <div class="heading d-flex justify-content-between mt-5">
            <h3 class="d-flex justify-content-center">Dashboard Sửa hoa</h3>
        </div>
        <form class="mb-3" action="./db/handleupdate.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Tên hoa</label>
                <input type="text" class="form-control" id="name" placeholder="Tên hoa" name="name-up" value="<?php echo $row['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">Ảnh hoa</label>
                <input type="file" name="link-up" id="link" value="<?php echo $row['link'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="des" class="form-label">Mô tả</label>
                <textarea placeholder="Mô tả hoa" name="des-up" class="form-control" id="des" rows="3"><?php echo $row['des']; ?></textarea>
            </div>
            <button name="id-up" value="<?php echo $_POST['id'] ?>" type="submit" class="btn btn-primary">Sửa</button>
        </form>
    </div>
</body>
</html>