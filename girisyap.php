<?php
session_start();
include 'baglanti.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['form_tipi']) && $_POST['form_tipi'] === 'giris') {
        $kullaniciAd = $conn->real_escape_string($_POST['girisAd']);
        $kullaniciSifre = $_POST['girisSifre'];

        $sql = "SELECT kullaniciSifre FROM kullaniciTable WHERE kullaniciAd = '$kullaniciAd'";
        $islem = $conn->query($sql);

        if ($islem && $islem->num_rows > 0) {
            $satir = $islem->fetch_assoc();
            $sifreleme = $satir['kullaniciSifre'];

            if (password_verify($kullaniciSifre, $sifreleme)) {
                $_SESSION['user_id'] = $kullaniciAd;
                echo "<script>alert('Başarılı giriş');</script>";
                header("Location: index.php");
            } else {
                echo "<script>alert('Hatalı şifre!');</script>";
            }
        } else {
            echo "<script>alert('Kullanıcı bulunamadı!');</script>";
        }
    } elseif (isset($_POST['form_tipi']) && $_POST['form_tipi'] === 'kayit') {
        $yeniKullaniciAd = $conn->real_escape_string($_POST['kayitAd']);
        $yeniKullaniciSifre = $_POST['kayitSifre'];

        $sifreleme = password_hash($yeniKullaniciSifre, PASSWORD_DEFAULT);

        $sql = "INSERT INTO kullaniciTable (kullaniciAd, kullaniciSifre) VALUES ('$yeniKullaniciAd', '$sifreleme')";
        if ($conn->query($sql)) {
            echo "<script>alert('Kayıt başarılı!');</script>";
        } else {
            echo "<script>alert('Kayıt başarısız!');</script>";
        }
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giris Yap / Kayit ol</title>
    <link rel="stylesheet" href="styles/ana_tasarim.css">
    <link rel="stylesheet" href="styles/girisyap_grid.css">
    <link rel="icon" type="image/png" href="images/logo.png">
</head>
<body>

    <div class="navbar">
        <div class="logo">
            <a href="index.html">
                <img src="images/logo.png" alt="">
                <a href="index.html">Bey-Han Motor</a>
            </a>
        </div>
        <div class="menu">
            <a href="index.html">Ana Sayfa</a>
            <a href="hakkimizda.html">Hakkımızda</a>
            <a href="#">Giriş Yap</a>
            <strong><a href="adminpanel.php">ADMIN PANEL</a></strong>
        </div>
    </div>

    <div class="main-container">
      <div class="container">

        <div class="box">
          <h2>Giriş Yap</h2>
          <form id="loginForm" method="POST">
            <input type="hidden" name="form_tipi" value="giris">
            <label for="girisAd">Kullanıcı Adı:</label>
            <input type="text" id="girisAd" name="girisAd" required>

            <label for="girisSifre">Şifre:</label>
            <input type="password" id="girisSifre" name="girisSifre" required>
            

            <button type="submit">Giriş Yap</button>

            
          </form>
        </div>
        
        <div class="box">
            <h2>Kayıt Ol</h2>
            <form id="registerForm" method="POST">
                <input type="hidden" name="form_tipi" value="kayit">
                <label for="kayitAd">Kullanıcı Adı:</label>
                <input type="text" id="kayitAd" name="kayitAd" required>

                <label for="registerEmail">E-posta:</label>
                <input type="email" id="registerEmail" name="registerEmail" required>

                <label for="kayitSifre">Şifre:</label>
                <input type="password" id="kayitSifre" name="kayitSifre" required>

                <button type="submit">Kayıt Ol</button>
            </form>
        </div>
      </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 Bey-Han. Tüm Hakları Saklıdır.</p>
        <div class="social-links">
            <a href="#">Facebook</a> | 
            <a href="#">Twitter</a> | 
            <a href="#">Instagram</a>
        </div>
    </div>
</body>
</html>
