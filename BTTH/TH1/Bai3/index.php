<?php session_start(); ?>
<?php include './header.php'; ?>
<?php include './db/handleread.php'; ?>

<body>
    <div class="container">
        <div class="buttons d-flex justify-content-between my-3">
            <h3>Danh sách sinh viên</h3>
            <a href="./create.php" class="btn btn-primary">Upload file sinh viên</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Lastname</th>
                <th scope="col">Firstname</th>
                <th scope="col">City</th>
                <th scope="col">Email</th>
                <th scope="col">Course1</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $student) { ?>
                    <tr>
                        <td><?php echo $student['username'] ?></td>
                        <td><?php echo $student['password'] ?></td>
                        <td><?php echo $student['lastname'] ?></td>
                        <td><?php echo $student['firstname'] ?></td>
                        <td><?php echo $student['city'] ?></td>
                        <td><?php echo $student['email'] ?></td>
                        <td><?php echo $student['course1'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

<?php include './footer.php'; ?>
