<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<style>
    .login-container {
        max-width: 400px;
        margin: 5rem auto;
        padding: 2rem;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .role-selector {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .role-btn {
        flex: 1;
        padding: 1rem;
        border: 2px solid #dee2e6;
        border-radius: 10px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .role-btn.active {
        border-color: #4e73df;
        background-color: rgba(78, 115, 223, 0.1);
    }

    .auth-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #4e73df;
    }
</style>

<div class="login-container">
    <div class="text-center mb-4">
        <i class="ti ti-login auth-icon"></i>
        <h2>Login Game Library</h2>
        <p class="text-muted">Silakan masuk dengan akun Anda</p>
    </div>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="/auth/processLogin" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" id="role" name="role" required>
                <option value="">Pilih Role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary w-100">
            <i class="ti ti-login me-2"></i> Login
        </button>
    </form>
    <div class="mt-3 text-center">
        Belum punya akun? <a href="/register">Daftar di sini</a>
    </div>
</div>

<script>
    // Script untuk role selector animation
    document.querySelectorAll('.role-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.role-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            document.getElementById('role').value = btn.dataset.role;
        });
    });
</script>

<?= $this->endSection() ?>