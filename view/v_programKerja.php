
<?php
function aman($nilai) {
    return htmlspecialchars((string)$nilai, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Program Kerja BEM</title>
</head>
<body>

    <h2><?= $edit ? "Edit Program Kerja" : "Tambah Program Kerja" ?></h2>

    <form method="POST" action="index.php">
        <input type="hidden" name="aksi"
               value="<?= $edit ? "ubah" : "tambah" ?>">

        <label>Nomor Program:</label><br>
        <input type="text" name="nomorProgram"
               value="<?= $edit ? aman($edit["nomorProgram"]) : "" ?>"
               required <?= $edit ? "readonly" : "" ?>>
        <br><br>

        <label>Nama Program Kerja:</label><br>
        <input type="text" name="namaProgram"
               value="<?= $edit ? aman($edit["namaProgram"]) : "" ?>"
               required>
        <br><br>

        <label>Surat Keterangan:</label><br>
        <input type="text" name="suratKeterangan"
               value="<?= $edit ? aman($edit["suratKeterangan"]) : "" ?>"
               required>
        <br><br>

        <button type="submit">
            <?= $edit ? "Simpan Perubahan" : "Tambah Data" ?>
        </button>

        <?php if ($edit): ?>
            <a href="index.php">Batal</a>
        <?php endif; ?>
    </form>

    <hr>

    <h2>Daftar Program Kerja BEM</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Program Kerja</th>
            <th>Surat Keterangan</th>
            <th>Aksi</th>
        </tr>

        <?php if (count($proker) > 0): ?>
            <?php foreach ($proker as $data): ?>
                <tr>
                    <td><?= aman($data["nomorProgram"]) ?></td>
                    <td><?= aman($data["namaProgram"]) ?></td>
                    <td><?= aman($data["suratKeterangan"]) ?></td>
                    <td>
                        <a href="index.php?edit=<?= urlencode($data["nomorProgram"]) ?>">
                            Edit
                        </a>
                        |
                        <a href="index.php?hapus=<?= urlencode($data["nomorProgram"]) ?>"
                           onclick="return confirm('Yakin ingin menghapus data ini?')">
                            Hapus
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Belum ada data program kerja.</td>
            </tr>
        <?php endif; ?>
    </table>

</body>
</html>
