
<?php
require_once "koneksiMVC.php";

$akun = [
    [
        "nim" => "1001",
        "nama" => "Menteri BEM",
        "angkatan" => "2024",
        "jabatan" => "Menteri",
        "username" => "menteri",
        "password" => "Menteri123"
    ],
    [
        "nim" => "1002",
        "nama" => "Kepala Departemen",
        "angkatan" => "2024",
        "jabatan" => "Kepala Departemen",
        "username" => "kepala",
        "password" => "Kepala123"
    ]
];

$stmt = $mysqli->prepare(
    "INSERT INTO pengurus_bem
    (nim, nama, angkatan, jabatan, username, password)
    VALUES (?, ?, ?, ?, ?, ?)"
);

foreach ($akun as $a) {
    $hash = password_hash($a["password"], PASSWORD_DEFAULT);

    $stmt->bind_param(
        "ssssss",
        $a["nim"],
        $a["nama"],
        $a["angkatan"],
        $a["jabatan"],
        $a["username"],
        $hash
    );

    if (!$stmt->execute()) {
        echo "Gagal membuat akun " .
             htmlspecialchars($a["username"]) . "<br>";
    } else {
        echo "Akun " . htmlspecialchars($a["username"]) .
             " berhasil dibuat.<br>";
    }
}
?>
