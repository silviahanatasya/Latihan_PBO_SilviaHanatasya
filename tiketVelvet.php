<?php
require_once 'Tiket.php';

class TiketVelvet extends Tiket {
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $bantalSelimutPack, $layananButler) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    // OVERRIDING: Dikenakan tambahan biaya kelas premium sebesar 50% (dikali 1.50)
    public function hitungTotalHarga() {
        $hargaDasarTotal = $this->jumlah_kursi * $this->hargaDasarTiket;
        return $hargaDasarTotal * 1.50;
    }

    public function tampilkanInfoFasilitas() {
        return "Sofa Bed Premium Kelas Atas, Fasilitas: " . $this->bantalSelimutPack . ", Pelayanan Pribadi: " . $this->layananButler;
    }
}
?>