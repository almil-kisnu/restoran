<?php
class Mahasiswa {
    private $conn;
    private $table = "mahasiswa"; // nama tabel

    public function __construct($db) {
        $this->conn = $db;
    }

    // CREATE
    public function create($nim, $nama, $prodi) {
        $query = "INSERT INTO " . $this->table . " (nim, nama, prodi) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $nim, $nama, $prodi);
        return $stmt->execute();
    }

    // CREATE
    public function update($nim, $nama, $prodi) {
        $query = "update INTO " . $this->table . " (nama=?, prodi=?) where nim=? ";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $nama, $prodi, $nim);
        return $stmt->execute();
    }
}