<?php
require 'dbcont.php';


$sql = "SELECT * FROM tbl_mhs";
$result = mysqli_query($conn, $sql);

//menambahkan fungsi tambah data
if(isset($_POST['submit'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    $query = "INSERT INTO tbl_mhs (nim,nama,email) 
    values('$nim','$nama','$email')";
    mysqli_query($conn, $query);
    header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> menambah data mahasiswa</h1>
    <form action="" method="post">
        <table border="1">
            <tr>
                <td><label for="nim">NIM</label></td>
                <td><input type="text" name="nim" require></input></td>
            </tr>
            <tr>
                <td><label for="nama">NAMA</label></td>
                <td><input type="text" name="nama" require></input></td>
            </tr>
            <tr>
                <td><label for="email">E-MAIL</label></td>
                <td><input type="email" name="email" require></input></td>
            </tr>
            <tr>
                <td><button type="reset">reset</button></td>
                <td><button type="submit" name="submit">tambah data</button></td>
            </tr>
        </table>
    </form>

    <table border ="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>E-MAIL</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['nim']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['email']; ?></td>
                <td>
                    <a href="delete.php?id=<?=$row['id']; ?> "
                    onclick="return confirm('Apakah Anda Yakin?')">Delete</a>
                    <a href="update.php?id=<?=$row['id']; ?> ">Update</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>