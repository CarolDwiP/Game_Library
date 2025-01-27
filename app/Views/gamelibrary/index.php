<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<style>
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
        font-family: 'Poppins', sans-serif;
    }

    .table-games {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    .table-games thead {
        background: linear-gradient(to right, #4e73df, #3b5998);
        color: white;
    }

    .table-games th {
        vertical-align: middle;
        font-weight: 600;
        border: none;
    }

    .table-games tbody tr {
        transition: all 0.3s ease;
    }

    .table-games tbody tr:hover {
        background-color: rgba(78, 115, 223, 0.05);
        transform: translateY(-3px);
    }

    .btn-action {
        margin-right: 5px;
        margin-bottom: 5px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s ease;
    }

    .btn-action:hover {
        transform: translateY(-2px);
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

    .modal-content {
        border-radius: 15px;
    }
</style>

<div class="container mt-5">
    <div class="page-header">
        <div>
            <h1 class="mb-0">Daftar Game</h1>
            <p class="text-white-50 mb-0">Kelola koleksi game Anda</p>
        </div>
        <?php if (session()->get('role') === 'admin'): ?>
            <a href="/create" class="btn btn-light text-primary">
                <i class="ti ti-plus"></i> Tambah Game Baru
            </a>
        <?php endif; ?>
    </div>

    <div class="card table-games">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th>Judul Game</th>
                            <th>Genre</th>
                            <th>Tanggal Rilis</th>
                            <th class="text-end">Harga</th>
                            <?php if (session()->get('role') === 'admin'): ?>
                                <th class="text-center">Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($games as $game): ?>
                            <tr>
                                <td class="text-center"><?= $game['id'] ?></td>
                                <td><?= $game['game_title'] ?></td>
                                <td><?= $game['genre'] ?></td>
                                <td><?= date('d M Y', strtotime($game['release_date'])) ?></td>
                                <td class="text-end">Rp <?= number_format($game['price'], 0, ',', '.') ?></td>
                                <?php if (session()->get('role') === 'admin'): ?>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-warning btn-sm btn-action" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editGameModal"
                                            data-id="<?= $game['id'] ?>"
                                            data-game_title="<?= $game['game_title'] ?>"
                                            data-genre="<?= $game['genre'] ?>"
                                            data-release_date="<?= $game['release_date'] ?>"
                                            data-price="<?= $game['price'] ?>"
                                            onclick="editGame(this)">
                                            <i class="ti ti-edit"></i> Edit
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm btn-action" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#deleteGameModal"
                                            data-id="<?= $game['id'] ?>"
                                            onclick="setDeleteId(this)">
                                            <i class="ti ti-trash"></i> Hapus
                                        </button>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit (Desain disesuaikan dengan tema) -->
<div class="modal fade" id="editGameModal" tabindex="-1" aria-labelledby="editGameModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editGameModalLabel">Edit Game</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/gamelibrary/update" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="editGameId">
                    <div class="mb-3">
                        <label for="editGameTitle" class="form-label">Judul Game</label>
                        <input type="text" class="form-control" id="editGameTitle" name="game_title" required>
                    </div>
                    <div class="mb-3">
                        <label for="editGenre" class="form-label">Genre</label>
                        <select class="form-select" id="editGenre" name="genre" required>
                            <!-- Gunakan opsi genre yang sama dengan create.php -->
                            <option value="" disabled selected>Pilih genre</option>
                                <option value="Action">Action</option>
                                <option value="Adventure">Adventure</option>
                                <option value="RPG">Role-Playing Game (RPG)</option>
                                <option value="Shooter">Shooter</option>
                                <option value="Fighting">Fighting</option>
                                <option value="Simulation">Simulation</option>
                                <option value="Strategy">Strategy</option>
                                <option value="Sports">Sports</option>
                                <option value="Racing">Racing</option>
                                <option value="Puzzle">Puzzle</option>
                                <option value="Horror">Horror</option>
                                <option value="Platformer">Platformer</option>
                                <option value="MMORPG">Massively Multiplayer Online RPG (MMORPG)</option>
                                <option value="Stealth">Stealth</option>
                                <option value="Survival">Survival</option>
                                <option value="Sandbox">Sandbox</option>
                                <option value="Open World">Open World</option>
                                <option value="Visual Novel">Visual Novel</option>
                                <option value="Educational">Educational</option>
                                <option value="Idle">Idle</option>
                                <option value="Tower Defense">Tower Defense</option>
                                <option value="Card Game">Card Game</option>
                                <option value="Music/Rhythm">Music/Rhythm</option>
                                <option value="Trivia">Trivia</option>
                                <option value="Casual">Casual</option>
                                <option value="Party">Party</option>
                                <option value="Roguelike">Roguelike</option>
                                <option value="Interactive Story">Interactive Story</option>
                                <option value="Board Game">Board Game</option>
                                <option value="MOBA">Multiplayer Online Battle Arena (MOBA)</option>
                                <option value="Battle Royale">Battle Royale</option>
                                <option value="Tycoon">Tycoon</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editReleaseDate" class="form-label">Tanggal Rilis</label>
                        <input type="date" class="form-control" id="editReleaseDate" name="release_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="editPrice" class="form-label">Harga</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="editPrice" name="price" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Hapus (Desain disesuaikan dengan tema) -->
<div class="modal fade" id="deleteGameModal" tabindex="-1" aria-labelledby="deleteGameModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteGameModalLabel">Konfirmasi Hapus Game</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <i class="ti ti-alert-triangle text-danger" style="font-size: 4rem;"></i>
                <p class="mt-3">Apakah Anda yakin ingin menghapus game ini?<br>Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="#" id="confirmDeleteButton" class="btn btn-danger">
                    <i class="ti ti-trash"></i> Hapus
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function editGame(button) {
        const id = button.getAttribute('data-id');
        const title = button.getAttribute('data-game_title');
        const genre = button.getAttribute('data-genre');
        const releaseDate = button.getAttribute('data-release_date');
        const price = button.getAttribute('data-price');

        document.getElementById('editGameId').value = id;
        document.getElementById('editGameTitle').value = title;
        document.getElementById('editGenre').value = genre;
        document.getElementById('editReleaseDate').value = releaseDate;
        document.getElementById('editPrice').value = price;
    }

    function setDeleteId(button) {
        const id = button.getAttribute('data-id');
        const deleteUrl = `/gamelibrary/delete/${id}`;
        document.getElementById('confirmDeleteButton').href = deleteUrl;
    }
</script>
<?= $this->endSection() ?>