<?php
// 1. Sertakan file koneksi database dan class-class OOP yang sudah dibuat
require_once 'koneksi.php';
require_once 'Tiket.php';
require_once 'TiketReguler.php';
require_once 'TiketIMAX.php';
require_once 'TiketVelvet.php';

// 2. Buat instance dari class Koneksi untuk mengambil data dari database
$koneksiObj = new Koneksi();
$db = $koneksiObj->db; // Mendapatkan objek mysqli

// 3. Query untuk mengambil seluruh data dari tabel_tiket
$query = "SELECT * FROM tabel_tiket";
$result = $db->query($query);

// Buat array penampung untuk mengelompokkan tiket berdasarkan jenis studionya
$kelompok_tiket = [
    'reguler' => [],
    'imax'    => [],
    'velvet'  => []
];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $jenis = strtolower($row['jenis_studio']);
        
        // Polimorfisme: Instansiasi objek konkrit sesuai dengan jenis studio dari database
        if ($jenis == 'reguler') {
            $objTiket = new TiketReguler(
                $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                $row['jumlah_kursi'], $row['harga_dasar_tiket'], 
                $row['tipe_audio'], $row['lokasi_baris']
            );
        } elseif ($jenis == 'imax') {
            $objTiket = new TiketIMAX(
                $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                $row['jumlah_kursi'], $row['harga_dasar_tiket'], 
                $row['kacamata_3d_id'], $row['efek_gerak_fitur']
            );
        } elseif ($jenis == 'velvet') {
            $objTiket = new TiketVelvet(
                $row['id_tiket'], $row['nama_film'], $row['jadwal_tayang'], 
                $row['jumlah_kursi'], $row['harga_dasar_tiket'], 
                $row['bantal_selimut_pack'], $row['layanan_butler']
            );
        }
        
        // Masukkan objek yang sudah jadi ke dalam kelompoknya masing-masing
        if (isset($kelompok_tiket[$jenis])) {
            $kelompok_tiket[$jenis][] = $objTiket;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pesanan Tiket Bioskop</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; margin: 30px; background-color: #f4f6f9; color: #333; }
        .container { max-width: 1200px; margin: auto; }
        h1 { text-align: center; margin-bottom: 40px; color: #2c3e50; text-transform: uppercase; letter-spacing: 1px; }
        
        /* Styling Kelompok Studio */
        .section-studio { background: #fff; padding: 25px; margin-bottom: 40px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .title-reguler { border-left: 5px solid #e67e22; padding-left: 10px; color: #e67e22; }
        .title-imax { border-left: 5px solid #2980b9; padding-left: 10px; color: #2980b9; }
        .title-velvet { border-left: 5px solid #9b59b6; padding-left: 10px; color: #9b59b6; }
        
        /* Styling Tabel */
        table { width: 100%; border-collapse: collapse; margin-top: 15px; background: #fff; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #e0e0e0; font-size: 14px; }
        th { background-color: #f8f9fa; color: #666; font-weight: 600; text-transform: uppercase; font-size: 12px; }
        tr:hover { background-color: #fdfdfd; }
        
        .empty-msg { text-align: center; color: #999; font-style: italic; padding: 20px; }
        .badge-harga { font-weight: bold; color: #27ae60; font-size: 15px; }
        .text-fitur { color: #555; font-style: italic; }
    </style>
</head>
<body>

<div class="container">
    <h1>Sistem Riwayat Pemesanan Tiket Bioskop</h1>

    <div class="section-studio">
        <h2 class="title-reguler">STUDIO REGULER (Tarif Standar)</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Tiket</th>
                    <th>Nama Film</th>
                    <th>Jadwal Tayang</th>
                    <th>Jumlah Kursi</th>
                    <th>Spesifikasi Fasilitas Unik (Polimorfik)</th>
                    <th>Total Harga (Overriding)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($kelompok_tiket['reguler'])): ?>
                    <?php foreach ($kelompok_tiket['reguler'] as $tiket): ?>
                        <tr>
                            <td>#<?= $tiket->getIdTiket(); ?></td>
                            <td><strong><?= htmlspecialchars($tiket->getNamaFilm()); ?></strong></td>
                            <td><?= date('d M Y - H:i', strtotime($tiket->getJadwalTayang())); ?> WIB</td>
                            <td><?= $tiket->getJumlahKursi(); ?> Kursi</td>
                            <td class="text-fitur"><?= htmlspecialchars($tiket->tampilkanInfoFasilitas()); ?></td>
                            <td class="badge-harga">Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="empty-msg">Belum ada pesanan untuk Studio Reguler.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="section-studio">
        <h2 class="title-imax">STUDIO IMAX 3D (Tambahan Biaya Proyeksi Teknologi)</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Tiket</th>
                    <th>Nama Film</th>
                    <th>Jadwal Tayang</th>
                    <th>Jumlah Kursi</th>
                    <th>Spesifikasi Fasilitas Unik (Polimorfik)</th>
                    <th>Total Harga (Overriding)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($kelompok_tiket['imax'])): ?>
                    <?php foreach ($kelompok_tiket['imax'] as $tiket): ?>
                        <tr>
                            <td>#<?= $tiket->getIdTiket(); ?></td>
                            <td><strong><?= htmlspecialchars($tiket->getNamaFilm()); ?></strong></td>
                            <td><?= date('d M Y - H:i', strtotime($tiket->getJadwalTayang())); ?> WIB</td>
                            <td><?= $tiket->getJumlahKursi(); ?> Kursi</td>
                            <td class="text-fitur"><?= htmlspecialchars($tiket->tampilkanInfoFasilitas()); ?></td>
                            <td class="badge-harga">Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="empty-msg">Belum ada pesanan untuk Studio IMAX.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="section-studio">
        <h2 class="title-velvet">STUDIO VELVET VIP (Surcharge Kelas Premium 50%)</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Tiket</th>
                    <th>Nama Film</th>
                    <th>Jadwal Tayang</th>
                    <th>Jumlah Kursi</th>
                    <th>Spesifikasi Fasilitas Unik (Polimorfik)</th>
                    <th>Total Harga (Overriding)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($kelompok_tiket['velvet'])): ?>
                    <?php foreach ($kelompok_tiket['velvet'] as $tiket): ?>
                        <tr>
                            <td>#<?= $tiket->getIdTiket(); ?></td>
                            <td><strong><?= htmlspecialchars($tiket->getNamaFilm()); ?></strong></td>
                            <td><?= date('d M Y - H:i', strtotime($tiket->getJadwalTayang())); ?> WIB</td>
                            <td><?= $tiket->getJumlahKursi(); ?> Kursi</td>
                            <td class="text-fitur"><?= htmlspecialchars($tiket->tampilkanInfoFasilitas()); ?></td>
                            <td class="badge-harga">Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="6" class="empty-msg">Belum ada pesanan untuk Studio Velvet.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>