<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal 2</title>

    <style>
        .card {
            border: 1px solid #000;
            padding: 20px;
            width: 300px;
        }
        input[type="text"] {
            width: 95%;
            padding: 5px;
            margin-top: 5px;
        }
        button {
            margin-top: 15px;
            padding: 8px 20px;
        }
    </style>
</head>
<body>
    <?php 
        if (isset($_POST['nama']) && isset($_POST['umur']) && isset($_POST['hobi'])){
            $nama = htmlspecialchars($_POST['nama']);
            $umur = htmlspecialchars($_POST['umur']);
            $hobi = htmlspecialchars($_POST['hobi']);

            echo "
                <h3>Tampilan no: 4</h3>
                <div class='card'>
                    Nama: $nama <br>
                    Umur: $umur <br>
                    Hobi: $hobi <br>
                </div>
                ";
        } else if (isset($_POST['nama']) && isset($_POST['umur'])) {
            $nama = htmlspecialchars($_POST['nama']);
            $umur = htmlspecialchars($_POST['umur']);

            echo "
                <h3>Tampilan no: 3</h3>
                <form method='post' action='' class='card'>
                    Hobi Anda: <input type='text' name='hobi' required/>
                    <input type='hidden' name='nama' value='$nama'/>
                    <input type='hidden' name='umur' value='$umur'/>
                    <button type='submit'>Submit</button>
                </form>
                ";
        } else if (isset($_POST['nama'])) {
            $nama = htmlspecialchars($_POST['nama']);

            echo "
                <h3>Tampilan no: 2</h3>
                <form method='post' action='' class='card'>
                    Umur Anda: <input type='text' name='umur' required/>
                    <input type='hidden' name='nama' value='$nama'/>
                    <button type='submit'>Submit</button>
                </form>
                ";
        } else {
            echo "
                <h3>Tampilan no: 1</h3>
                <form method='post' action='' class='card'>
                    Nama Anda: <input type='text' name='nama' required/>
                    <button type='submit'>Submit</button>
                </form>
                ";
        }
    ?>
        
</body>
</html>