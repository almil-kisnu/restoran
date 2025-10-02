<?php
class Perpustakaan {
    private $nama, $judulBuku, $tglPinjam, $tglKembali;

    function __construct($nama, $judulBuku, $tglPinjam, $tglKembali) {
        $this->nama = $nama;
        $this->judulBuku = $judulBuku; // array judul buku
        $this->tglPinjam = new DateTime($tglPinjam);
        $this->tglKembali = new DateTime($tglKembali);
    }

    private function proses(): void {
        echo "{$this->nama} meminjam buku: " . implode(", ", $this->judulBuku) . " (" . count($this->judulBuku) . " buku) pada " . $this->tglPinjam->format("d-m-Y") . "<br>";
        echo "{$this->nama} mengembalikan buku pada " . $this->tglKembali->format("d-m-Y") . "<br>";

        $selisih = $this->tglPinjam->diff($this->tglKembali)->days;

        if ($selisih > 5) {
            $terlambat = $selisih - 5;
            $denda = 2500 * count($this->judulBuku) * $terlambat;

            echo "Lama pinjam: {$selisih} hari. Terlambat {$terlambat} hari.<br>";
            echo "Denda = Rp " . number_format($denda, 0, ',', '.') . "<br><br>";
        } else {
            echo "Lama pinjam: {$selisih} hari. Tidak ada denda.<br><br>";
        }
    }
}

// Data peminjaman
$data = [
    ["Andi", ["Buku A", "Buku B", "Buku C"], "2025-09-04", "2025-09-08"],
    ["Iwan", ["Buku D", "Buku E"], "2025-09-04", "2025-09-13"],
    ["Budi", ["Buku F"], "2025-09-04", "2025-09-08"],
    ["Nana", ["Buku H"], "2025-09-04", "2025-09-15"],
];

// Looping semua data
foreach ($data as $d) {
    $peminjam = new Perpustakaan(
        nama: $d[0],
        judulBuku: $d[1],
        tglPinjam: $d[2],
        tglKembali: $d[3]
    );
    $peminjam->proses();
}
?>
