<?php
include "koneksi.php";

$nama     = $_POST['nama'];
$nim      = $_POST['nim'];
$prodi    = $_POST['prodi'];
$fakultas = $_POST['fakultas'];
$angkatan = $_POST['angkatan'];
$nohp     = $_POST['no_hp'];

// ================= UPLOAD FOTO =================
$folder = "uploads/";

// buat folder kalau belum ada
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

$namaFile  = $_FILES['foto']['name'];
$tmpFile   = $_FILES['foto']['tmp_name'];
$ext       = strtolower(pathinfo($namaFile, PATHINFO_EXTENSION));

// ekstensi yang diizinkan
$allowed = ['jpg', 'jpeg', 'png', 'avif', 'webp'];

// validasi ekstensi
if (!in_array($ext, $allowed)) {
    die("Format foto tidak valid! (jpg, jpeg, png, avif, webp)");
}

// nama file unik
$namaBaru = uniqid() . '.' . $ext;

// upload
move_uploaded_file($tmpFile, $folder . $namaBaru);

// ================= INSERT DATABASE =================
$sql = "INSERT INTO pendaftaran 
        (nama, nim, prodi, fakultas, angkatan, no_hp, foto)
        VALUES 
        ('$nama', '$nim', '$prodi', '$fakultas', '$angkatan', '$nohp', '$namaBaru')";

if ($koneksi->query($sql)) {
    echo "✅ Data berhasil dikirim! <br>";
    echo "<a href='member.php'>Lihat Data</a>";
} else {
    echo "❌ Gagal: " . $koneksi->error;
}
?>
