<?php

/**
 * 1. ABSTRACT CLASS TIKET (Induk)
 * Menerapkan konsep Abstract Class & Encapsulation (protected)
 */
abstract class Tiket {
    // Properti terenkapsulasi yang dipetakan dari kolom database
    protected $id_tiket;
    protected $nama_film;
    protected $jadwal_tayang;
    protected $jumlah_kursi;
    protected $hargaDasarTiket;

    // Constructor untuk menginisialisasi properti global induk
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket) {
        $this->id_tiket = $id_tiket;
        $this->nama_film = $nama_film;
        $this->jadwal_tayang = $jadwal_tayang;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->hargaDasarTiket = $hargaDasarTiket;
    }

    // ABSTRACT METHODS: Dideklarasikan tanpa isi (body) sesuai instruksi
    abstract public function hitungTotalHarga();
    abstract public function tampilkanInfoFasilitas();

    // Getter untuk menampilkan informasi dasar tiket (Encapsulation)
    public function getIdTiket() { return $this->id_tiket; }
    public function getNamaFilm() { return $this->nama_film; }
    public function getJadwalTayang() { return $this->jadwal_tayang; }
    public function getJumlahKursi() { return $this->jumlah_kursi; }
}

/**
 * =========================================================================
 * 2. CLASS TURUNAN / ANAK (Menerapkan Inheritance & Polymorphism)
 * =========================================================================
 */

// --- CLASS TIKET REGULER ---
class TiketReguler extends Tiket {
    // Atribut khusus (dipetakan dari kolom lokasi_baris dan tipe_audio)
    private $lokasi_baris;
    private $tipe_audio;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $lokasi_baris, $tipe_audio) {
        // Melempar data ke constructor milik abstract class induk
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->lokasi_baris = $lokasi_baris;
        $this->tipe_audio = $tipe_audio;
    }

    // Implementasi wajib: Logika hitung total harga reguler (tanpa biaya tambahan)
    public function hitungTotalHarga() {
        return $this->hargaDasarTiket * $this->jumlah_kursi;
    }

    // Implementasi wajib: Logika menampilkan fasilitas reguler
    public function tampilkanInfoFasilitas() {
        return "Kursi Standard, Audio: " . $this->tipe_audio . ", Posisi: " . $this->lokasi_baris;
    }
}


// --- CLASS TIKET IMAX ---
class TiketIMAX extends Tiket {
    // Atribut khusus (dipetakan dari kolom kacamata_3d_id dan efek_gerak_fitur)
    private $kacamata_3d_id;
    private $efek_gerak_fitur;
    private $biaya_tambahan_imax = 25000; // Sifat khusus studio IMAX

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $kacamata_3d_id, $efek_gerak_fitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata_3d_id = $kacamata_3d_id;
        $this->efek_gerak_fitur = $efek_gerak_fitur;
    }

    // Implementasi wajib: Logika hitung harga IMAX (Harga dasar + Biaya IMAX)
    public function hitungTotalHarga() {
        return ($this->hargaDasarTiket + $this->biaya_tambahan_imax) * $this->jumlah_kursi;
    }

    // Implementasi wajib: Logika menampilkan fasilitas IMAX
    public function tampilkanInfoFasilitas() {
        $info = "Layar IMAX Geometris, Efek: " . $this->efek_gerak_fitur;
        if (!empty($this->kacamata_3d_id)) {
            $info .= ", Termasuk Kacamata 3D (ID: " . $this->kacamata_3d_id . ")";
        }
        return $info;
    }
}


// --- CLASS TIKET VELVET ---
class TiketVelvet extends Tiket {
    // Atribut khusus (dipetakan dari kolom bantal_selimut_pack dan layanan_butler)
    private $bantal_selimut_pack;
    private $layanan_butler;
    private $biaya_layanan_velvet = 50000; // Sifat khusus kemewahan Velvet

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $bantal_selimut_pack, $layanan_butler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->bantal_selimut_pack = $bantal_selimut_pack;
        $this->layanan_butler = $layanan_butler;
    }

    // Implementasi wajib: Logika hitung harga Velvet (Harga dasar + Biaya Layanan VIP)
    public function hitungTotalHarga() {
        return ($this->hargaDasarTiket + $this->biaya_layanan_velvet) * $this->jumlah_kursi;
    }

    // Implementasi wajib: Logika menampilkan fasilitas Velvet
    public function tampilkanInfoFasilitas() {
        return "Sofa Bed Premium, Fasilitas: " . $this->bantal_selimut_pack . ", Pelayanan: " . $this->layanan_butler;
    }
}

/**
 * =========================================================================
 * 3. PEMBUATAN OBJEK & DISPLAY INFORMASI (Polymorphism & Output)
 * =========================================================================
 */

// Instansiasi Objek dengan data simulasi yang diambil dari database sebelumnya
$daftar_pesanan = [
    new TiketReguler(1, "Laga Tanpa Batas", "2026-06-12 13:00:00", 2, 40000.00, "Row A", "Dolby Digital 5.1"),
    new TiketIMAX(18, "Petualangan di Angkasa 3D", "2026-06-12 12:45:00", 1, 75000.00, "GLS-IMAX-01", "Sub-Bass Vibration"),
    new TiketVelvet(35, "Cinta di Kota Tua", "2026-06-12 14:00:00", 2, 120000.00, "Satin Pillow & Blanket Pack", "Welcome Drink Service")
];

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Informasi Pemesanan Tiket Bioskop</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 40px; background-color: #f5f6fa; }
        .container { max-width: 900px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        h2 { text-align: center; color: #2f3640; margin-bottom: 30px; border-bottom: 2px solid #f1f2f6; padding-bottom: 10px; }
        .ticket-card { border: 1px dashed #b2bec3; padding: 20px; margin-bottom: 25px; border-radius: 6px; background-color: #fff; position: relative; }
        .ticket-card::before, .ticket-card::after { content: ''; position: absolute; top: 50%; width: 20px; height: 20px; background-color: #f5f6fa; border-radius: 50%; }
        .ticket-card::before { left: -11px; margin-top: -10px; border-right: 1px dashed #b2bec3; }
        .ticket-card::after { right: -11px; margin-top: -10px; border-left: 1px dashed #b2bec3; }
        .type-badge { display: inline-block; padding: 5px 12px; font-weight: bold; border-radius: 4px; font-size: 12px; text-transform: uppercase; margin-bottom: 10px; }
        .reguler { background-color: #eccc68; color: #2f3542; }
        .imax { background-color: #70a1ff; color: white; }
        .velvet { background-color: #ff6b81; color: white; }
        table { width: 100%; border-collapse: collapse; }
        td { padding: 6px 0; font-size: 14px; color: #57606f; }
        td.label { width: 25%; font-weight: 600; color: #2f3640; }
        .total-harga { font-size: 18px; font-weight: bold; color: #2ed573; text-align: right; margin-top: 10px; border-top: 1px solid #f1f2f6; padding-top: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h2>E-TICKET RESI PEMESANAN BIOSKOP</h2>

    <?php foreach ($daftar_pesanan as $tiket): ?>
        <?php 
            // Menentukan kelas warna badge berdasarkan tipe class objek
            $tipe_class = get_class($tiket);
            $badge_class = ($tipe_class == 'TiketReguler') ? 'reguler' : (($tipe_class == 'TiketIMAX') ? 'imax' : 'velvet');
            $nama_studio = ($tipe_class == 'TiketReguler') ? 'Studio Reguler' : (($tipe_class == 'TiketIMAX') ? 'Studio IMAX 3D' : 'Studio Velvet VIP');
        ?>
        
        <div class="ticket-card">
            <span class="type-badge <?= $badge_class; ?>"><?= $nama_studio; ?></span>
            <table>
                <tr>
                    <td class="label">ID Tiket</td>
                    <td>: <?= $tiket->getIdTiket(); ?></td>
                </tr>
                <tr>
                    <td class="label">Nama Film</td>
                    <td>: <strong><?= $tiket->getNamaFilm(); ?></strong></td>
                </tr>
                <tr>
                    <td class="label">Jadwal Tayang</td>
                    <td>: <?= date('d M Y - H:i', strtotime($tiket->getJadwalTayang())); ?> WIB</td>
                </tr>
                <tr>
                    <td class="label">Jumlah Kursi</td>
                    <td>: <?= $tiket->getJumlahKursi(); ?> Kursi</td>
                </tr>
                <tr>
                    <td class="label">Fasilitas</td>
                    <td>: <em><?= $tiket->tampilkanInfoFasilitas(); ?></em></td>
                </tr>
            </table>
            
            <div class="total-harga">
                Total Bayar: Rp <?= number_format($tiket->hitungTotalHarga(), 0, ',', '.'); ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>