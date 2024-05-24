<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

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
                <td><?= $i++; ?></td>
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

    <script>
        window.onload = function () {
            window.print();
        }
    </script>

</body>
</html>