<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Fulki Hasya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7f6; height: 100vh; display: flex; align-items: center; }
        .login-card { border: none; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .btn-primary { background-color: #2C7BE5; border: none; padding: 12px; }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="text-center mb-4">
                <h3 class="fw-bold text-primary">FULKI HASYA</h3>
                <p class="text-muted">Panel Manajemen Alat Kesehatan</p>
            </div>
            <div class="card login-card p-4">
                <?php if(session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger small"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>

                <form action="<?= base_url('admin/login/process') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="admin@fulkihasya.com" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 fw-bold">Masuk Ke Panel</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>