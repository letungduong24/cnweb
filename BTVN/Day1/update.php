<?php include 'products.php'; ?>
<?php include 'header.php'; ?>
<main>
    <h3 class="d-flex justify-content-center">Sửa thông tin sản phẩm</h3>
    <div class="container">
        <form action="index.php" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="exampleInputEmail1" value="<?= htmlspecialchars($products[$_POST['index']]['name']) ?>" name="newName">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Giá</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="newPrice" value="<?= htmlspecialchars($products[$_POST['index']]['price']) ?>" ?>
            </div>
            <input type="text" hidden value="<?= htmlspecialchars($_POST['index']) ?>" name="editedIndex">
            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>
    </div>
</main>
<?php include 'footer.php'; ?>