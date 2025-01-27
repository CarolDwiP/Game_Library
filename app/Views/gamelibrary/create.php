<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<style>
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
        font-family: 'Poppins', sans-serif;
    }

    .form-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        padding: 30px;
    }

    .page-header {
        background: linear-gradient(to right, #4e73df, #3b5998);
        color: white;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .form-label {
        font-weight: 600;
        color: #4e73df;
    }

    .form-control, .form-select {
        border-radius: 10px;
        padding: 12px;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }

    .btn-submit {
        border-radius: 10px;
        padding: 12px 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        transition: all 0.3s ease;
    }

    .btn-submit:hover {
        transform: translateY(-3px);
    }
</style>

<div class="container mt-5">
    <div class="page-header">
        <div>
            <h1 class="mb-0">Tambah Game Baru</h1>
            <p class="text-white-50 mb-0">Masukkan detail game ke dalam perpustakaan</p>
        </div>
        <a href="/gamelibrary" class="btn btn-light text-primary">
            <i class="ti ti-arrow-left"></i> Kembali ke Daftar Game
        </a>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-13">
            <div class="form-container">
                <form action="/gamelibrary/store" method="post">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label for="game_title" class="form-label">Judul Game</label>
                            <input type="text" class="form-control" id="game_title" name="game_title" placeholder="Masukkan judul game" required>
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label for="genre" class="form-label">Genre</label>
                            <input list="genres" id="genre" name="genre" class="form-control" placeholder="Pilih atau ketik genre" required>
                            <datalist id="genres">
                                <option value="Action">
                                <option value="FPS">
                                <option value="Adventure">
                                <option value="Role-Playing Game (RPG)">
                                <option value="Shooter">
                                <option value="Fighting">
                                <option value="Simulation">
                                <option value="Strategy">
                                <option value="Sports">
                                <option value="Racing">
                                <option value="Puzzle">
                                <option value="Horror">
                                <option value="Platformer">
                                <option value="Massively Multiplayer Online RPG">
                                <option value="Open World">
                                <option value="Survival">
                            </datalist>
                        </div>

                        
                        <div class="col-12 mb-3">
                            <label for="release_date" class="form-label">Tanggal Rilis</label>
                            <input type="date" class="form-control" id="release_date" name="release_date" required>
                        </div>
                        
                        <div class="col-12 mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="price" name="price" placeholder="Masukkan harga game" required>
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-submit w-100">
                                <i class="ti ti-plus"></i> Tambah Game
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>