<?php 

session_start();
$buttonPrint = null;
$buttonHapus = null;

if (isset($_POST['btn'])) {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $rayon = $_POST['rayon'];
    $dataAwal = false;

    if (isset($_SESSION['data_siswa'])) {
        foreach ($_SESSION['data_siswa'] as $data) {
            if ($data['nis'] == $nis) {
                $dataAwal = true;
                break;
            }
        }
    }
    if ($dataAwal) {
        echo "<h1>data sudah ada</h1>";
    }else {
        $_SESSION['data_siswa'][] = [
            "nama" => $nama,
            "nis" => $nis,
            "rayon" => $rayon
        ];
    }
}
if (isset($_SESSION['data_siswa']) && !empty($_SESSION['data_siswa'])) {
        $buttonPrint = '<a href="print.php">Print Data</a>';
        $buttonHapus = ' <a href="hapusAll.php">Hapus Semua</a>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <!-- Link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- link ke CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container-content">
        <div class="container">
            <h1>Data Siswa</h1>
            <form action="" method="POST">
                <div class="content-input">
                    <input type="text" name="nama" id="nama" placeholder="Masukan Nama" required>
                    <input type="number" name="nis" id="nis" placeholder="Masukan NIS" required>
                    <input type="text" name="rayon" id="rayon" placeholder="Masukan Rayon" required>
                </div>
                <button type="submit" name="btn" id="btn"><i class="fa-solid fa-user-plus fa-lg"></i>Input Data</button>
                <?= $buttonPrint; ?>
                <?= $buttonHapus; ?>
            </form>
            <center>
                <table>
                <?php 
                $i = 1;
                ?>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Rayon</th>
                        <th>Aksi</th>
                    </tr>
                    <?php if (isset($_SESSION['data_siswa']) && is_array($_SESSION['data_siswa'])) : ?>
                        <?php foreach($_SESSION["data_siswa"] as $key => $data) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= htmlspecialchars($data['nama']); ?></td>
                                <td><?= htmlspecialchars($data['nis']); ?></td>
                                <td><?= htmlspecialchars($data['rayon']); ?></td>
                                <td>
                                    <a href="hapus.php?id=<?= $key; ?>">delete</a>
                                    <a href="detail.php?id=<?= $key; ?>">detail</a>
                                    <a href="edit.php?id=<?= $key; ?>">Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif;  ?>
                </table>
            </center>
        </div>
    </div>
</body>
</html>