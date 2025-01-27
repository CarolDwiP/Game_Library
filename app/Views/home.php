<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <div class="jumbotron bg-primary text-white rounded-3 p-5">
        <h1 class="display-4">Welcome to Game Library!</h1>
        <p class="lead">Discover and manage your game collection</p>
        <hr class="my-4">
        <p>Get started by logging in or registering.</p>
        <div class="d-grid gap-2 d-md-block">
            <a href="/login" class="btn btn-light btn-lg me-2">Login</a>
            <a href="/register" class="btn btn-outline-light btn-lg">Register</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>