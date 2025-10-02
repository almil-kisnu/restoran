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

    // READ
    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $result = $this->conn->query($query);
        return $result;
    }

    // UPDATE
    public function update($nim, $nama, $prodi) {
        $query = "UPDATE " . $this->table . " SET nama=?, prodi=? WHERE nim=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $nama, $prodi, $nim);
        return $stmt->execute();
    }

    // DELETE
    public function delete($nim) {
        $query = "DELETE FROM " . $this->table . " WHERE nim=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $nim);
        return $stmt->execute();
    }
}
?>
