<?php 

session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $value = null;
    foreach ($_SESSION['data_siswa'] as $key => $rinci) {
        if ($key == $id) {
            $value = $rinci;
        }
    }
    if($value == null) {
        header("Location: index.php");
        exit;
    }
}
if (isset($_POST['btn'])) {
    $nama = $_POST['nama'];
    $nis = $_POST['nis'];
    $rayon = $_POST['rayon'];
    $dataAwal = false;
    if (isset($_GET['id'])) {
        foreach ($_SESSION['data_siswa'] as $value) {
            if ($value['nis'] == $nis) {
                $dataAwal = true;
                break;
            }
        }
    }
    if ($dataAwal) {
        echo "<h1>data sudah ada</h1>";
    }else {
        $_SESSION['data_siswa'][$id] = [
            "nama" => $nama,
            "nis" => $nis,
            "rayon" => $rayon
        ]; 
        header("Location: index.php");
        exit;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form action="" method="POST">
        <div class="content-input">
            <input type="text" name="nama" id="nama" value="<?= $value['nama']; ?>" required>
            <input type="number" name="nis" id="nis" value="<?= $value['nis'] ?>" required>
            <input type="text" name="rayon" id="rayon" value="<?=  $value['rayon'] ?>" required>
            <button type="submit" name="btn" id="btn">Ganti</button>
        </div>
    </form>
</body>
</html>