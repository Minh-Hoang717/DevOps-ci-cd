<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

<h3 class="text-center mb-3">Đăng nhập Admin</h3>

<form method="post" class="mx-auto" style="max-width:400px;">
    <div class="mb-3">
        <label>Tên đăng nhập</label>
        <input type="text" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Mật khẩu</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="text-center">
        <button name="login" class="btn btn-primary">Đăng nhập</button>
    </div>
</form>

</body>
</html>
