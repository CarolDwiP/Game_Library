<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<style>
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
        font-family: 'Poppins', sans-serif;
    }

    .dashboard-header {
        background: linear-gradient(to right, #4e73df, #3b5998);
        color: white;
        padding: 30px;
        border-radius: 10px;
        margin-bottom: 30px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .dashboard-card {
        border-radius: 15px;
        border: none;
        transition: all 0.3s ease;
        margin-bottom: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .dashboard-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.12);
    }

    .dashboard-card .card-body {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .dashboard-card .btn {
        align-self: flex-start;
        transition: all 0.3s ease;
    }

    .dashboard-card .btn:hover {
        transform: translateX(5px);
    }

    .dashboard-icons {
        font-size: 3rem;
        margin-bottom: 15px;
        opacity: 0.7;
    }
</style>

<div class="container mt-5">
    <div class="dashboard-header text-center">
        <h1 class="display-5 fw-bold">Game Library Dashboard</h1>
        <p class="lead">Kelola dan jelajahi koleksi game Anda dengan mudah</p>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div>
                        <div class="dashboard-icons text-primary">
                            <i class="ti ti-list"></i>
                        </div>
                        <h5 class="card-title">Daftar Game</h5>
                        <p class="card-text text-muted">Lihat dan telusuri seluruh game dalam perpustakaan Anda.</p>
                    </div>
                    <a href="/gamelibrary" class="btn btn-outline-primary mt-3">
                        Lihat Game <i class="ti ti-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card dashboard-card">
                <div class="card-body">
                    <div>
                        <div class="dashboard-icons text-success">
                            <i class="ti ti-plus"></i>
                        </div>
                        <h5 class="card-title">Tambah Game Baru</h5>
                        <p class="card-text text-muted">Tambahkan game baru ke dalam koleksi perpustakaan game Anda.</p>
                    </div>
                    <a href="/create" class="btn btn-outline-success mt-3">
                        Tambah Game <i class="ti ti-plus-circle"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Row untuk Chart -->
    <div class="row mb-5">
        <div class="col-md-6">
            <div class="chart-container">
                <h5 class="chart-title"><i class="ti ti-chart-pie me-2"></i>Distribusi Genre</h5>
                <canvas id="adminGenreChart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
                <h5 class="chart-title"><i class="ti ti-chart-bar me-2"></i>Total Harga per Genre</h5>
                <canvas id="adminPriceChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Konten asli dashboard -->
    <div class="row">
        <!-- ... (konten card yang sudah ada) ... -->
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart untuk Admin
    const adminGenreCtx = document.getElementById('adminGenreChart').getContext('2d');
    new Chart(adminGenreCtx, {
        type: 'doughnut',
        data: {
            labels: <?= json_encode(array_column($genreStats, 'genre')) ?>,
            datasets: [{
                data: <?= json_encode(array_column($genreStats, 'total')) ?>,
                backgroundColor: [
                    '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', 
                    '#e74a3b', '#858796', '#5a5c69'
                ],
                borderWidth: 3
            }]
        },
        options: {
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });

    const adminPriceCtx = document.getElementById('adminPriceChart').getContext('2d');
    new Chart(adminPriceCtx, {
        type: 'bar',
        data: {
            labels: <?= json_encode(array_column($priceStats, 'genre')) ?>,
            datasets: [{
                label: 'Total Harga',
                data: <?= json_encode(array_column($priceStats, 'total_price')) ?>,
                backgroundColor: '#4e73df',
                borderColor: '#2e59d9',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString();
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
</script>
<?= $this->endSection() ?>