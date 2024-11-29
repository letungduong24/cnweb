<?php
    include './db/conn.php';
    include './headers.php';
    $handle = $conn->prepare('select *from flowers where id=?');
    $handle->bind_param('s', $_POST['id']);     $handle->execute();
    $result = $handle->get_result();
    $row = $result->fetch_assoc();
    $conn->close();
?>
<body>
    <div class="container">
        <div class="heading d-flex justify-content-between mt-5">
            <h3 class="d-flex justify-content-center">Dashboard Xóa hoa</h3>
        </div>
        <form class="mb-3" action="./db/handledelete.php" method="POST" enctype="multipart/form-data">
            <h2>Đồng ý xóa hoa <?php echo $row['name'] ?>?</h2>
            <button name="id-del" value="<?php echo $_POST['id'] ?>" type="submit" class="btn btn-primary">Xóa</button>
        </form>
    </div>
</body>
</html>