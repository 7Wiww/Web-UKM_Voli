<?php  
include "koneksi.php";

// Hitung jumlah anggota
$jml_anggota = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pendaftaran"));

// Jumlah pelatih (manual)
$jml_pelatih = 2;

// Ambil data member
$query = mysqli_query($koneksi, "SELECT * FROM pendaftaran ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members UKM Voli</title>
        <link rel="stylesheet" href="style.css" >
        <style>

            .content-member {
                margin: 0 135px;
            }

            .counter-box {
                display: flex;
                gap: 50px;
                margin-bottom: 20px;
            }
            
            .counter {
                margin-left: 5px;
                background: #f7c600;
                padding: 15px 25px;
                border-radius: 10px;
                font-size: 18px;
                color: #003087;
                font-weight: bold;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
                background: white;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            }

            table th {
                background: #003087;
                color: white;
                padding: 14px;
                font-size: 15px;
            }

            table td {
                padding: 14px;
                border-bottom: 1px solid #eee;
                font-size: 14px;
            }

            table tr:last-child td {
                border-bottom: none;
            }

            table tr:hover {
                background: #f5f8ff;
            }

            table th,
            table td {
                text-align: center;
                vertical-align: middle;
            }

            .img-admin-member {
                width: 90px;
                height: 120px;
                object-fit: cover;
                border-radius: 10px;
                border: 2px solid #ffc400;
                display: block;
                margin: auto;
            }

                        
            h1 { 
                color: #003087;
            }
                </style>

</head>
<body>
    <!-- NAVBAR -->
    <div class="navbar">
        <div class="nav-left">
            <img src="img/logoUKM.jpg" class="logo">
        </div>

        <div class="nav-right">
            <a href="index.html" class="nav-item">Home</a>
            <a href="about.html" class="nav-item">About</a>
            <a href="admin.php" class="nav-item">Admin</a>
            <a href="member.php" class="nav-item">Members</a>
            <a href="contact.html" class="nav-contact">Contact</a>
        </div>
    </div>
    <br>
    <br>
    <div class="content-member">
        <h1>Daftar Anggota UKM Voli</h1>
            <br>
            <br>
        <!-- COUNTER -->
        <div class="counter-box">
            <div class="counter">Jumlah Anggota: <?= $jml_anggota ?></div>
            <div class="counter">Jumlah Pelatih: <?= $jml_pelatih ?></div>
        </div>
        
        <!-- TABLE MEMBER -->
        <table>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Prodi</th>
                <th>Fakultas</th>
                <th>Angkatan</th>
                <th>No HP</th>
            </tr>
        
            <?php 
            $no = 1;
            while($row = mysqli_fetch_assoc($query)) { 
            ?>
            <tr>
                <td><?= $no++ ?></td>
        
                <td>
                    <img src="uploads/<?= $row['foto'] ?>" 
                        class="img-admin-member"
                         onerror="this.src='img/default_user.png'">
                </td>
        
                <td><?= $row['nama'] ?></td>
                <td><?= $row['nim'] ?></td>
                <td><?= $row['prodi'] ?></td>
                <td><?= $row['fakultas'] ?></td>
                <td><?= $row['angkatan'] ?></td>
                <td><?= $row['no_hp'] ?></td>
            </tr>
            <?php } ?>
        </table>

    </div>

</body>
</html>
