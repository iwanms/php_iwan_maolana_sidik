<?php
    require_once 'soal3b.php';
    $cari_nama   = '';
    $cari_alamat = '';
    $where       = [];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $cari_nama   = trim($_POST["nama"]);
        $cari_alamat = trim($_POST["alamat"]);

        if(!empty($cari_nama)){
            $where[] = "a.nama LIKE '%".$cari_nama ."%'";
        }

        if(!empty($cari_alamat)){
            $where[] = "a.alamat LIKE '%".$cari_alamat ."%'";
        }
    }

    $sql = "SELECT a.nama, b.hobi, a.alamat
            FROM person a
            JOIN hobi b ON a.id = b.person_id";

    if(!empty($where)){
        $sql .= " WHERE ".implode(" AND ",$where);
    }

    $sql .= " ORDER BY a.nama ASC";

    
            
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Data Hobi</title>
    <style>
        body { font-family: sans-serif; margin: 2em; }
        table { border-collapse: collapse; width: 50%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h1>Daftar Hobi Setiap Orang</h1>

    <table>
        <thead>
            <tr>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th>Hobi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["nama"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["alamat"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["hobi"]) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Tidak ada data ditemukan</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="search-form">
        <h3>Pencarian Data</h3>
        <form action="soal3a.php" method="post">
            <input type="text" name="nama" placeholder="Cari berdasarkan nama..." value="<?= htmlspecialchars($cari_nama); ?>">
            <input type="text" name="alamat" placeholder="Cari berdasarkan alamat..." value="<?= htmlspecialchars($cari_alamat); ?>">
            <button type="submit">Cari</button>
        </form>
    </div>

</body>
</html>

<?php
$conn->close();
?>