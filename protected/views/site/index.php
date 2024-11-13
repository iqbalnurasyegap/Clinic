<!-- views/site/index.php -->

<div class="container">
    <!-- Header -->
    <header class="header">
        <h1>Sistem Informasi Klinik</h1>
        <p>Selamat datang di Sistem Informasi Klinik - Kelola data dengan mudah dan efisien</p>
    </header>
<!-- Menu Akses Cepat -->
<div class="row quick-access">
    <div class="col-md-6 access-card">
        <a href="<?php echo Yii::app()->createUrl('pasien/create'); ?>">
            <h4>Daftar Pasien Baru</h4>
        </a>
    </div>
    <div class="col-md-6 access-card">
        <a href="<?php echo Yii::app()->createUrl('tindakan/create'); ?>">
            <h4>Tambah Tindakan</h4>
        </a>
    </div>
    <div class="col-md-6 access-card">
        <a href="<?php echo Yii::app()->createUrl('wilayah/admin'); ?>">
            <h4>Kelola Wilayah</h4>
        </a>
    </div>
    <div class="col-md-6 access-card">
        <a href="<?php echo Yii::app()->createUrl('pegawai/admin'); ?>">
            <h4>Kelola Pegawai</h4>
        </a>
    </div>
    <div class="col-md-6 access-card">
        <a href="<?php echo Yii::app()->createUrl('obat/admin'); ?>">
            <h4>Kelola Obat</h4>
        </a>
    </div>
    <div class="col-md-6 access-card">
        <a href="<?php echo Yii::app()->createUrl('transaksi/admin'); ?>">
            <h4>Informasi Pembayaran</h4>
        </a>
    </div>
    <div class="col-md-6 access-card">
        <a href="<?php echo Yii::app()->createUrl('laporan/index'); ?>">
            <h4>Laporan</h4>
        </a>
    </div>
</div>

    <!-- Grafik Laporan -->
    <div class="chart-section">
        <h2>Laporan Bulanan</h2>
        <!-- Contoh grafik, Anda bisa menggunakan grafik dari Chart.js atau library lainnya -->
        <canvas id="chartLaporan"></canvas>
    </div>
</div>

<!-- Script untuk grafik -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('chartLaporan').getContext('2d');
    var chartLaporan = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei'],
            datasets: [{
                label: 'Jumlah Pasien',
                data: [10, 15, 20, 25, 30],
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<style>
    /* Style sederhana untuk halaman index */
    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .info-boxes {
        display: flex;
        justify-content: space-around;
        margin-bottom: 20px;
    }

    .info-box {
        background-color: #f2f2f2;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
    }

    .quick-access {
        display: flex;
    flex-wrap: wrap;
    gap: 10px;
    }

    .access-card {
        background-color: #e7e7e7;
    padding: 15px;
    text-align: center;
    border-radius: 5px;
    transition: background-color 0.3s;
    }

    .access-card a {
        text-decoration: none;
        color: black;
    }

    .access-card:hover {
        background-color: #cfcfcf;
    }

    .chart-section {
        text-align: center;
        margin-top: 20px;
    }
</style>
