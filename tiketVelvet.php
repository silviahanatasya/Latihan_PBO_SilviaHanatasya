<?php
// Menyertakan file abstract class induk
require_once 'Tiket.php';

/**
 * Subclass TiketVelvet mewarisi kelas Tiket
 */
class TiketVelvet extends Tiket {
    // Properti tambahan spesifik (Encapsulation)
    private $bantalSelimutPack;
    private $layananButler;
    private $biayaTambahanVelvet = 50000; // Biaya tambahan untuk kenyamanan kelas Velvet VIP

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $bantalSelimutPack, $layananButler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // Mengimplementasikan method wajib dari induk: Total harga + Biaya kenyamanan VIP
    public function hitungTotalHarga() {
        return ($this->hargaDasarTiket + $this->biayaTambahanVelvet) * $this->jumlah_kursi;
    }

    // Mengimplementasikan method wajib dari induk: Menampilkan fasilitas khusus Velvet
    public function tampilkanInfoFasilitas() {
        return "Sofa Bed Premium Kelas Atas, Fasilitas: " . $this->bantalSelimutPack . ", Pelayanan Pribadi: " . $this->layananButler;
    }
}
?>