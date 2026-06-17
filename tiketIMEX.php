<?php
// Menyertakan file abstract class induk
require_once 'Tiket.php';

/**
 * Subclass TiketIMAX mewarisi kelas Tiket
 */
class TiketIMAX extends Tiket {
    // Properti tambahan spesifik (Encapsulation)
    private $kacamata3dId;
    private $efekGerakFitur;
    private $biayaTambahanIMAX = 25000; // Biaya tambahan untuk teknologi studio IMAX

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // Mengimplementasikan method wajib dari induk: Total harga + Biaya tambahan IMAX
    public function hitungTotalHarga() {
        return ($this->hargaDasarTiket + $this->biayaTambahanIMAX) * $this->jumlah_kursi;
    }

    // Mengimplementasikan method wajib dari induk: Menampilkan fasilitas khusus IMAX
    public function tampilkanInfoFasilitas() {
        $info = "Layar IMAX Geometris Raksasa, Fitur Mekanis: " . $this->efekGerakFitur;
        if (!empty($this->kacamata3dId)) {
            $info .= ", Termasuk Kacamata 3D (ID: " . $this->kacamata3dId . ")";
        }
        return $info;
    }
}
?>