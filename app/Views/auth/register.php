<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="login-container">
    <div class="text-center mb-4">
        <i class="ti ti-user-plus auth-icon"></i>
        <h2>Registrasi Akun</h2>
        <p class="text-muted">Silakan isi data berikut</p>
    </div>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="/auth/processRegister" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= old('username') ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
                <option value="">Pilih Role</option>
                <option value="admin" <?= old('role') === 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="user" <?= old('role') === 'user' ? 'selected' : '' ?>>User</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            <i class="ti ti-user-plus me-2"></i> Daftar
        </button>

        <div class="mt-3 text-center">
            Sudah punya akun? <a href="/login">Login di sini</a>
        </div>
    </form>
</div>
<?= $this->endSection() ?>