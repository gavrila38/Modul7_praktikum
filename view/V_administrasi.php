
<?php
function aman($nilai) {
    return htmlspecialchars((string)$nilai, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Administrasi Program Kerja BEM</title>
</head>
<body>
    <h2>Administrasi Program Kerja BEM</h2>

    <p>
        Selamat datang, <?= aman($_SESSION["nama"]) ?>.
        Jabatan: <?= aman($jabatan) ?>
    </p>

    <p>
        <?php if ($bolehMengelola): ?>
            Anda dapat mengelola data program kerja.
        <?php else: ?>
            Anda hanya dapat melihat daftar program kerja.
        <?php endif; ?>
    </p>

    <a href="logout.php">Logout</a>

    <?php if ($bolehMengelola): ?>
        <hr>
        <h3><?= $edit ? "Edit Program Kerja" : "Tambah Program Kerja" ?></h3>

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
    <?php endif; ?>

    <hr>
    <h3>Daftar Program Kerja</h3>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Nomor</th>
            <th>Nama Program Kerja</th>
            <th>Surat Keterangan</th>
            <?php if ($bolehMengelola): ?>
                <th>Aksi</th>
            <?php endif; ?>
        </tr>

        <?php foreach ($proker as $data): ?>
            <tr>
                <td><?= aman($data["nomorProgram"]) ?></td>
                <td><?= aman($data["namaProgram"]) ?></td>
                <td><?= aman($data["suratKeterangan"]) ?></td>

                <?php if ($bolehMengelola): ?>
                    <td>
                        <a href="index.php?edit=<?= urlencode($data["nomorProgram"]) ?>">
                            Edit
                        </a>

                        <form method="POST" action="index.php"
                              style="display:inline"
                              onsubmit="return confirm('Hapus program kerja ini?')">
                            <input type="hidden" name="aksi" value="hapus">
                            <input type="hidden" name="nomorProgram"
                                   value="<?= aman($data["nomorProgram"]) ?>">
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>

        <?php if (count($proker) === 0): ?>
            <tr>
                <td colspan="<?= $bolehMengelola ? 4 : 3 ?>">
                    Belum ada data program kerja.
                </td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
