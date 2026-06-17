<?php
require_once 'Tiket.php';

class TiketIMAX extends Tiket {
    private $kacamata3dId;
    private $efekGerakFitur;
    // Mengubah biaya tambahan flat menjadi 35000 sesuai logika bisnis baru
    private $biayaTambahanIMAX = 35000; 

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    // OVERRIDING: Dikenakan biaya tambahan teknologi IMAX Rp 35.000 flat per kursi
    public function hitungTotalHarga() {
        return $this->jumlah_kursi * ($this->hargaDasarTiket + $this->biayaTambahanIMAX);
    }

    public function tampilkanInfoFasilitas() {
        $info = "Layar IMAX Geometris Raksasa, Fitur Mekanis: " . $this->efekGerakFitur;
        if (!empty($this->kacamata3dId)) {
            $info .= ", Termasuk Kacamata 3D (ID: " . $this->kacamata3dId . ")";
        }
        return $info;
    }
}
?>