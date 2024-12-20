<?php
    include './headers.php';
    include './db/handleread.php';
?>
<body>
    <div class="container">
        <div class="heading d-flex justify-content-between mt-5">
            <h3 class="d-flex justify-content-center">Dashboard Quản lý hoa</h3>
            <div class="buttons">
                <a href="./create.php" class="btn btn-success">Thêm hoa</a>
                <a href="./index.php" class="btn btn-success">Về trang chủ</a>
            </div>
        </div>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên hoa</th>
                    <th scope="col">Link ảnh</th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($flowers as $flower){ ?>
                <tr>
                    <th scope="row"><?php echo $flower['id']; ?></th>
                    <td><?php echo $flower['name']; ?></td>
                    <td><a href="<?php echo $flower['link']; ?>"><?php echo $flower['link']; ?></a></td>
                    <td><?php echo $flower['des']; ?></td>
                    <td>
                        <form action="./update.php" method="POST">
                            <button name="id" value="<?php echo $flower['id']; ?>" type="submit" class="btn btn-primary">Sửa</button>
                        </form>
                        <form action="./delete.php" method="POST">
                            <button name="id" value="<?php echo $flower['id']; ?>" type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
                <?php }; ?>
            </tbody>
        </table>
    </div>
</body>
</html>