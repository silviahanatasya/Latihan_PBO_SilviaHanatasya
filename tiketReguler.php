<?php
// Menyertakan file abstract class induk
require_once 'Tiket.php';

/**
 * Subclass TiketReguler mewarisi kelas Tiket
 */
class TiketReguler extends Tiket {
    // Properti tambahan spesifik (Encapsulation)
    private $tipeAudio;
    private $lokasiBaris;

    // Constructor untuk menginisialisasi properti induk dan anak
    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $tipeAudio, $lokasiBaris) {
        // Melempar properti global ke constructor milik abstract class induk (parent)
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    // Mengimplementasikan method wajib dari induk: Hitung harga normal tanpa biaya tambahan
    public function hitungTotalHarga() {
        return $this->hargaDasarTiket * $this->jumlah_kursi;
    }

    // Mengimplementasikan method wajib dari induk: Menampilkan fasilitas khusus reguler
    public function tampilkanInfoFasilitas() {
        return "Kursi Standard Cinema, Sistem Audio: " . $this->tipeAudio . ", Area Baris: " . $this->lokasiBaris;
    }
}
?>