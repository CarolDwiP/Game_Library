// app/Views/user_dashboard/index.php
<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<style>
    .chart-container {
        background: white;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
</style>

<div class="container mt-5">
    <div class="page-header">
        <div>
            <h1 class="mb-0">User Dashboard</h1>
            <p class="text-white-50 mb-0">Your Game Collection Overview</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="chart-container">
                <h5>Game Distribution by Genre</h5>
                <canvas id="genreChart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
                <h5>Price Distribution by Genre</h5>
                <canvas id="priceChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Tampilkan daftar game -->
    <?= $this->include('gamelibrary/index') ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Genre Chart
    const genreCtx = document.getElementById('genreChart').getContext('2d');
    new Chart(genreCtx, {
        type: 'pie',
        data: {
            labels: <?= json_encode(array_column($genreStats, 'genre')) ?>,
            datasets: [{
                data: <?= json_encode(array_column($genreStats, 'total')) ?>,
                backgroundColor: [
                    '#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', 
                    '#e74a3b', '#858796', '#5a5c69'
                ]
            }]
        }
    });

    // Price Chart
    const priceCtx = document.getElementById('priceChart').getContext('2d');
    new Chart(priceCtx, {
        type: 'bar',
        data: {
            labels: <?= json_encode(array_column($priceStats, 'genre')) ?>,
            datasets: [{
                label: 'Total Price',
                data: <?= json_encode(array_column($priceStats, 'total_price')) ?>,
                backgroundColor: '#4e73df'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp ' + value.toLocaleString();
                        }
                    }
                }
            }
        }
    });
</script>
<?= $this->endSection() ?>