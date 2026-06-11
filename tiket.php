<?php

abstract class Tiket {
    // Menetapkan aturan bahwa setiap tiket HARUS bisa menghitung harga
    abstract public function hitungTotalHarga();
    abstract public function tampilkanFasilitas();
    abstract public function tampilkanDetailTiket();
}



// 1. Class Tiket Reguler
class TiketReguler extends Tiket {
    // Properti/Atribut dimasukkan di kelas anak
    private $nama_film;
    private $harga_dasar;
    private $jumlah_kursi;
    private $lokasi_baris;

    public function __construct($nama_film, $harga_dasar, $jumlah_kursi, $lokasi_baris) {
        $this->nama_film = $nama_film;
        $this->harga_dasar = $harga_dasar;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->lokasi_baris = $lokasi_baris;
    }

    // Mengisi logika fungsi hitungTotalHarga yang diwajibkan induk
    public function hitungTotalHarga() {
        return $this->harga_dasar * $this->jumlah_kursi;
    }

    // Mengisi logika fungsi tampilkanFasilitas
    public function tampilkanFasilitas() {
        return "Kursi Standard, Audio Dolby Digital 5.1, Baris: " . $this->lokasi_baris;
    }

    // Mengisi logika fungsi tampilkanDetailTiket
    public function tampilkanDetailTiket() {
        echo "=== TIKET REGULER ===<br>";
        echo "Film: " . $this->nama_film . "<br>";
        echo "Fasilitas: " . $this->tampilkanFasilitas() . "<br>";
        echo "Total Bayar: Rp " . number_format($this->hitungTotalHarga(), 0, ',', '.') . "<br><br>";
    }
}

// 2. Class Tiket IMAX
class TiketIMAX extends Tiket {
    private $nama_film;
    private $harga_dasar;
    private $jumlah_kursi;
    private $kacamata_3d_id;
    private $biaya_IMAX = 25000;

    public function __construct($nama_film, $harga_dasar, $jumlah_kursi, $kacamata_3d_id) {
        $this->nama_film = $nama_film;
        $this->harga_dasar = $harga_dasar;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->kacamata_3d_id = $kacamata_3d_id;
    }

    public function hitungTotalHarga() {
        return ($this->harga_dasar + $this->biaya_IMAX) * $this->jumlah_kursi;
    }
}

    // Mengisi logika fungsi hitungTotalHarga (Ada tambahan biaya IMAX)
    public function hitungTotalHarga() {
        return ($this->harga_dasar + $this->biaya_IMAX) * $this->jumlah_kursi;
    }

    // Mengisi logika fungsi tampilkanFasilitas
    public function tampilkanFasilitas() {
        return "Layar IMAX, Audio Premium 12-Ch, ID Kacamata 3D: " . $this->kacamata_3d_id;
    }

    // Mengisi logika fungsi tampilkanDetailTiket
    public function tampilkanDetailTiket() {
        echo "=== TIKET IMAX 3D ===<br>";
        echo "Film: " . $this->nama_film . "<br>";
        echo "Fasilitas: " . $this->tampilkanFasilitas() . "<br>";
        echo "Total Bayar: Rp " . number_format($this->hitungTotalHarga(), 0, ',', '.') . "<br><br>";
    }
}

// 3. Class Tiket Velvet
class TiketVelvet extends Tiket {
    private $nama_film;
    private $harga_dasar;
    private $jumlah_kursi;
    private $bantal_selimut;
    private $layanan_butler;
    private $biaya_velvet = 50000; // Biaya tambahan kemewahan Velvet

    public function __construct($nama_film, $harga_dasar, $jumlah_kursi, $bantal_selimut, $layanan_butler) {
        $this->nama_film = $nama_film;
        $this->harga_dasar = $harga_dasar;
        $this->jumlah_kursi = $jumlah_kursi;
        $this->bantal_selimut = $bantal_selimut;
        $this->layanan_butler = $layanan_butler;
    }

    // Mengisi logika fungsi hitungTotalHarga (Ada tambahan biaya Velvet)
    public function hitungTotalHarga() {
        return ($this->harga_dasar + $this->biaya_velvet) * $this->jumlah_kursi;
    }

    // Mengisi logika fungsi tampilkanFasilitas
    public function tampilkanFasilitas() {
        return "Sofa Bed, Paket: " . $this->bantal_selimut . ", Pelayan: " . $this->layanan_butler;
    }

    // Mengisi logika fungsi tampilkanDetailTiket
    public function tampilkanDetailTiket() {
        echo "=== TIKET VELVET CLASS ===<br>";
        echo "Film: " . $this->nama_film . "<br>";
        echo "Fasilitas: " . $this->tampilkanFasilitas() . "<br>";
        echo "Total Bayar: Rp " . number_format($this->hitungTotalHarga(), 0, ',', '.') . "<br><br>";
    }
}


/**
 * PROSES PENGUJIAN KODE
 */
// 1. Membeli Tiket Reguler
$tiket1 = new TiketReguler("Laga Tanpa Batas", 40000, 2, "Row G");
$tiket1->tampilkanDetailTiket();

// 2. Membeli Tiket IMAX
$tiket2 = new TiketIMAX("Petualangan di Angkasa 3D", 75000, 1, "GLS-IMAX-09");
$tiket2->tampilkanDetailTiket();

// 3. Membeli Tiket Velvet
$tiket3 = new TiketVelvet("Cinta di Kota Tua", 120000, 2, "Premium Satin", "Welcome Drink + Popcorn");
$tiket3->tampilkanDetailTiket();

?>