<?php
include 'baglanti.php';

if (isset($_POST['sil'])) {
    $urunID = $_POST['urunID'];
    $conn->query("DELETE FROM urunlerTable WHERE urunID = $urunID");
}

if (isset($_POST['guncelle'])) {
    $urunID = $_POST['urunID'];
    $urunAd = $_POST['urunAd'];
    $urunFiyat = $_POST['urunFiyat'];
    $urunResim = $_POST['urunResim'];
    $urunAciklama = $_POST['urunAciklama'];
    $kategoriID = $_POST['kategoriID'];

    if (empty($urunAd) || empty($urunFiyat)) {
        echo "<script>alert('Ürün adı ve fiyat boş bırakılamaz!');</script>";
    } else {
        $conn->query("UPDATE urunlerTable SET urunAd='$urunAd', urunFiyat='$urunFiyat', urunResim='$urunResim', urunAciklama='$urunAciklama', kategoriID='$kategoriID' WHERE urunID=$urunID");
    }
}

if (isset($_POST['ekle'])) {
    $urunID = $_POST['urunID'];
    $urunAd = $_POST['urunAd'];
    $urunFiyat = $_POST['urunFiyat'];
    $urunResim = $_POST['urunResim'];
    $urunAciklama = $_POST['urunAciklama'];
    $kategoriID = $_POST['kategoriID'];

    if (empty($urunAd) || empty($urunFiyat)) {
        echo "<script>alert('Ürün adı ve fiyat boş bırakılamaz!');</script>";
    } elseif ($kategoriID == "0") {
        echo "<script>alert('Lütfen bir kategori seçiniz!');</script>";
    } else {
        $conn->query("INSERT INTO urunlerTable (urunID, urunAd, urunFiyat, urunResim, urunAciklama, kategoriID) 
                      VALUES ('$urunID', '$urunAd', '$urunFiyat', '$urunResim', '$urunAciklama', '$kategoriID')");
    }
}

$sonuc = $conn->query("SELECT * FROM urunlerTable");

$maxIDSonuc = $conn->query("SELECT MAX(urunID) AS maxID FROM urunlerTable");
$maxIDSatir = $maxIDSonuc->fetch_assoc();
$yeniID = $maxIDSatir['maxID'] + 1;
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/ana_tasarim.css">
    <link rel="stylesheet" href="styles/adminpanel_grid.css">
    <link rel="icon" type="image/png" href="images/logo.png">
    <title>Admin Paneli</title>
    <script>
        function enableEdit(rowId) {
            const inputs = document.querySelectorAll(`#row-${rowId} input, #row-${rowId} select`);
            inputs.forEach(input => {
                if (!input.classList.contains('non-editable')) {
                    input.disabled = false;
                }
            });

            document.querySelector(`#edit-${rowId}`).style.display = 'none';
            document.querySelector(`#save-${rowId}`).style.display = 'inline-block';
        }
    </script>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <a href="index.html">
                <img src="images/logo.png" alt="">
                <a href="index.html">Bey-Han</a>
            </a>
            
        </div>
        <div class="menu">
            <a href="#" id="motorBtn">Motor Ayarları</a>
            <a href="#" id="yorumBtn">Yorumlar</a>
            <a href="#" id="kullanicibilBtn">Kullanıcı Bilgileri</a>
            <a href="girisyap.php">Çıkış yap</a>
        </div>
    </div>


    <div id="motorContent">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Ürün ID</th>
                <th>Ürün Adı</th>
                <th>Fiyat</th>
                <th>Resim</th>
                <th>Açıklama</th>
                <th>Kategori</th>
                <th>İşlemler</th>
            </tr>
            <?php while ($satir = $sonuc->fetch_assoc()): ?>
            <tr id="row-<?= $satir['urunID'] ?>">
                <form method="post">
                    <td>
                        <input type="text" name="urunID" value="<?= $satir['urunID'] ?>" class="non-editable" disabled>
                    </td>
                    <td><input type="text" name="urunAd" value="<?= $satir['urunAd'] ?>" disabled></td>
                    <td><input type="text" name="urunFiyat" value="<?= $satir['urunFiyat'] ?>" disabled></td>
                    <td><input type="text" name="urunResim" value="<?= $satir['urunResim'] ?>" disabled></td>
                    <td><input type="text" name="urunAciklama" value="<?= $satir['urunAciklama'] ?>" disabled></td>
                    <td>
                        <select name="kategoriID" disabled>
                            <option value="0">Lütfen seçiniz</option>
                            <option value="1" <?= $satir['kategoriID'] == 1 ? 'selected' : '' ?>>SuperSport</option>
                            <option value="2" <?= $satir['kategoriID'] == 2 ? 'selected' : '' ?>>Naked</option>
                            <option value="3" <?= $satir['kategoriID'] == 3 ? 'selected' : '' ?>>Touring</option>
                            <option value="4" <?= $satir['kategoriID'] == 4 ? 'selected' : '' ?>>Off-Road</option>
                            <option value="5" <?= $satir['kategoriID'] == 5 ? 'selected' : '' ?>>Scooter</option>
                            <option value="6" <?= $satir['kategoriID'] == 6 ? 'selected' : '' ?>>Adventure-Dual</option>
                            <option value="7" <?= $satir['kategoriID'] == 7 ? 'selected' : '' ?>>Trial</option>
                            <option value="8" <?= $satir['kategoriID'] == 8 ? 'selected' : '' ?>>ATV</option>
                        </select>
                    </td>
                    <td>
                        <input type="hidden" name="urunID" value="<?= $satir['urunID'] ?>">
                        <button type="button" id="edit-<?= $satir['urunID'] ?>" onclick="enableEdit(<?= $satir['urunID'] ?>)">Düzenle</button>
                        <button type="submit" name="guncelle" id="save-<?= $satir['urunID'] ?>" style="display: none;">Kaydet</button>
                        <button type="submit" name="sil">Sil</button>
                    </td>
                </form>
            </tr>
            <?php endwhile; ?>

            <tr>
                <form method="post">
                    <td>
                        <input type="text" name="urunID" value="<?= $yeniID ?>" class="non-editable" disabled>
                        <input type="hidden" name="urunID" value="<?= $yeniID ?>">
                    </td>
                    <td><input type="text" name="urunAd" placeholder="Ürün Adı" required></td>
                    <td><input type="text" name="urunFiyat" placeholder="Fiyat" required></td>
                    <td><input type="text" name="urunResim" placeholder="Resim URL"></td>
                    <td><input type="text" name="urunAciklama" placeholder="Açıklama"></td>
                    <td>
                        <select name="kategoriID" required>
                            <option value="0">Lütfen seçiniz</option>
                            <option value="1">SuperSport</option>
                            <option value="2">Naked</option>
                            <option value="3">Touring</option>
                            <option value="4">Off-Road</option>
                            <option value="5">Scooter</option>
                            <option value="6">Adventure-Dual</option>
                            <option value="7">Trial</option>
                            <option value="8">ATV</option>
                        </select>
                    </td>
                    <td>
                        <button type="submit" name="ekle">Ekle</button>
                    </td>
                </form>
            </tr>
        </table>
    </div>




            <div id="yorumContent" style="display: none;">
                <table border="1" cellpadding="10" cellspacing="0">
                    <h1 style="text-align: center;">Yapım Aşamasında</h1>
                    <!-- <tr>
                        <th>Geri bildirim ID</th>
                        <th>Gönderen ID</th>
                        <th>Başlık</th>
                        <th>İçerik</th>
                        <th>Tarih</th>
                    </tr> -->
                </table>
            </div>

            <div id="kullanicibilContent" style="display: none;">
                <table border="1" cellpadding="10" cellspacing="0">
                    <h1 style="text-align: center;">Yapım Aşamasında</h1>
                    <!-- <tr>
                        <th>Geri bildirim ID</th>
                        <th>Gönderen ID</th>
                        <th>Başlık</th>
                        <th>İçerik</th>
                        <th>Tarih</th>
                    </tr> -->
                </table>
            </div>

    

    <script>
        const motorBtn = document.getElementById('motorBtn');
        const yorumBtn = document.getElementById('yorumBtn');
        const kullanicibilBtn = document.getElementById('kullanicibilBtn');

        const motorContent = document.getElementById('motorContent');
        const yorumContent = document.getElementById('yorumContent');
        const kullanicibilContent = document.getElementById('kullanicibilContent');

        motorBtn.addEventListener('click', () => {
            motorContent.style.display = 'block';
            yorumContent.style.display = 'none';
            kullanicibilContent.style.display = 'none';
        });

        yorumBtn.addEventListener('click', () => {
            yorumContent.style.display = 'block';
            motorContent.style.display = 'none';
            kullanicibilContent.style.display = 'none';
        });

        kullanicibilBtn.addEventListener('click', () => {
            kullanicibilContent.style.display = 'block';
            motorContent.style.display = 'none';
            yorumContent.style.display = 'none';
        });
    </script>

</body>
</html>

<?php
$conn->close();
?>
