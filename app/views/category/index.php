<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Sách</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">

    <div class="alert alert-info d-flex justify-content-between align-items-center">
        <span>Xin chào: <strong><?php echo $_SESSION['admin']['username'] ?? 'Admin'; ?></strong></span>
       <a href="?action=logout" class="btn btn-sm btn-danger fw-bold">Thoát</a>
    </div>

    <div class="card mb-4 bg-light">
        <div class="card-body">
            <h5 class="card-title text-center mb-3">Thêm Loại Sách</h5>
            <form action="index.php" method="post" class="mx-auto" style="max-width: 500px;">
                <div class="mb-2 row">
                    <label class="col-sm-3 col-form-label text-end">Mã loại:</label>
                    <div class="col-sm-9"><input type="text" name="cat_id" class="form-control" required></div>
                </div>
                <div class="mb-2 row">
                    <label class="col-sm-3 col-form-label text-end">Tên loại:</label>
                    <div class="col-sm-9"><input type="text" name="cat_name" class="form-control" required></div>
                </div>
                <div class="text-end">
                    <button type="submit" name="add_category" class="btn btn-primary">Thêm</button>
                </div>
                <div class="text-center mt-2 text-danger fw-bold"><?php echo $addMsg; ?></div>
            </form>
        </div>
    </div>

    <table class="table table-bordered table-striped align-middle">
        <thead class="table-secondary">
            <tr>
                <th>STT</th>
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Nếu không có dữ liệu
            if (empty($categories)) {
                echo '<tr><td colspan="4" class="text-center">Chưa có dữ liệu</td></tr>';
            } else {
                $stt = $offset + 1;
                foreach ($categories as $row): ?>
                <tr>
                    <td><?php echo $stt++; ?></td>
                    <td><?php echo htmlspecialchars($row['cat_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['cat_name']); ?></td>
                    <td>
                        <a href="?action=delete&id=<?php echo $row['cat_id']; ?>" 
                           class="text-decoration-none text-danger"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                        |
                        <a href="?action=edit&id=<?php echo $row['cat_id']; ?>" 
                           class="text-decoration-none text-primary">Sửa</a>
                    </td>
                </tr>
                <?php endforeach; 
            } ?>
        </tbody>
    </table>

    <?php if($totalPages > 1): ?>
    <nav>
        <ul class="pagination justify-content-center">
            <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
                <a class="page-link" href="?page=<?php echo $page - 1; ?>">« Trước</a>
            </li>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php if ($page == $i) echo 'active'; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <li class="page-item <?php if ($page >= $totalPages) echo 'disabled'; ?>">
                <a class="page-link" href="?page=<?php echo $page + 1; ?>">Sau »</a>
            </li>
        </ul>
    </nav>
    <?php endif; ?>

</body>
</html>