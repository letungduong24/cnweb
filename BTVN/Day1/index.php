<?php include 'products.php'; ?>
<?php include 'header.php'; ?>
<?php 
    if(isset($_POST['newName'])){
        $products[$_POST['editedIndex']]['name'] = $_POST['newName'];
        $products[$_POST['editedIndex']]['price'] = $_POST['newPrice'];
    }
    if(isset($_POST['index'])){
        unset($products[$_POST['index']]);
    }
?>
<main>
    <div class="container">
        <div class="heading d-flex justify-content-between">
            <h3 class="sub-heading">Danh Sách Sản Phẩm</h3>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                Thêm sản phẩm
            </button>
        </div>
        <?php if (empty($products)): ?>
            <p>Không có sản phẩm nào.</p>
        <?php else: ?>
        <ol class="list-group list-group-numbered">
            <?php foreach ($products as $index => $product): ?>
            <li class="list-group-item d-flex justify-content-between align-items-start align-items-center" >
                <div class="ms-2 me-auto">
                <div class="fw-bold"><?= htmlspecialchars($product['name']) ?></div>
                </div>
                <span class="badge text-bg-primary rounded-pill"><?= htmlspecialchars($product['price']) ?> VND</span>
                <form action="update.php" method="POST">
                    <input type="hidden" name="index" value="<?= $index ?>">
                    <button type="submit" class="ms-2 btn btn-primary">Sửa</button>
                </form>    
                <form action="" method="POST">
                    <input type="hidden" name="index" value="<?= $index ?>">
                    <button type="submit" class="ms-2 btn btn-primary">Xóa</button>
                </form>    
            </li>
            <?php endforeach; ?>
        </ol>
        <?php endif; ?>
    </div>

<!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm sản phẩm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Giá</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="price">
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include 'footer.php'; ?>