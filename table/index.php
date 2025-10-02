<?php
require_once "koneksi.php";
require_once "crud.php";

$crud = new Mahasiswa($koneksi);

// Handle form submit
if (isset($_POST['tambah'])) {
    $crud->create($_POST['nim'], $_POST['nama'], $_POST['prodi']);
}
if (isset($_POST['hapus'])) {
    $crud->delete($_POST['nim']);
}
if (isset($_POST['update'])) {
    $crud->update($_POST['nim'], $_POST['nama'], $_POST['prodi']);
}

// Ambil data
$data = $crud->read();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>CRUD Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <h2 class="mb-3">Form Input Mahasiswa</h2>
    <form method="POST" class="mb-4">
        <div class="mb-3">
            <label for="nim" class="form-label">NIM</label>
            <input type="text" class="form-control" name="nim" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="prodi" class="form-label">Prodi</label>
            <input type="text" class="form-control" name="prodi" required>
        </div>
        <button type="submit" name="tambah" class="btn btn-success">Tambah</button>
        <button type="submit" name="update" class="btn btn-warning">Update</button>
    </form>

    <h2>Daftar Mahasiswa</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $data->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['nim']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['prodi']; ?></td>
                    <td>
                        <form method="POST" style="display:inline-block;">
                            <input type="hidden" name="nim" value="<?= $row['nim']; ?>">
                            <button type="submit" name="hapus" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>
