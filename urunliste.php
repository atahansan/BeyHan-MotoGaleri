<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
include 'baglanti.php';

$kategori_id = isset($_GET['kategori_id']) ? intval($_GET['kategori_id']) : 0;

$sorgu = "SELECT urunAd, urunFiyat, urunResim FROM urunlerTable WHERE kategoriID = $kategori_id";
$urunListe = $conn->query($sorgu);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürün Listesi</title>
    <link rel="stylesheet" href="styles/ana_tasarim.css">
    <link rel="stylesheet" href="styles/urunliste_grid.css">
    <link rel="icon" type="image/png" href="images/logo.png">
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <a href="index.html">
                <img src="images/logo.png" alt="Logo">
                <a href="index.html">Bey-Han Motor</a>
            </a>
        </div>
        <div class="menu">
            <a href="index.html">Ana Sayfa</a>
            <a href="hakkimizda.html">Hakkımızda</a>
            
            <?php if ($isLoggedIn): ?>
                <a href="logout.php">Çıkış Yap</a>
                <button id="toggle-cart-btn">🛒 Sepet</button>
                <div class="mini-cart" id="mini-cart" style="display: none;">
                    <h3>🛒 Sepetiniz</h3>
                    <div class="mini-cart-content"></div>
                </div>
            <?php else: ?>
                <a href="girisyap.php">Giriş Yap</a>
            <?php endif; ?>
        </div>
    </div>

    <div class="grid-container">
        <?php if ($urunListe->num_rows > 0): ?>
            <?php while ($urun = $urunListe->fetch_assoc()): ?>
                <div class="grid-item">
                    <img src="<?php echo $urun['urunResim']; ?>" alt="<?php echo $urun['urunAd']; ?>">
                    <p><?php echo $urun['urunAd']; ?></p>
                    <p><?php echo $urun['urunFiyat']; ?> ₺</p>
                    <?php if ($isLoggedIn): ?>
                        <button class="add-to-cart-btn"
                            data-name="<?php echo $urun['urunAd']; ?>"
                            data-price="<?php echo $urun['urunFiyat']; ?>"
                            data-image="<?php echo $urun['urunResim']; ?>">
                            Sepete Ekle
                        </button>
                    <?php endif; ?>
                </div>

            <?php endwhile; ?>
        <?php else: ?>
            <p>Bu kategoride ürün bulunmamaktadır.</p>
        <?php endif; ?>
    </div>

    <div class="footer">
        <p>&copy; 2025 Bey-Han. Tüm Hakları Saklıdır.</p>
        <div class="social-links">
            <a href="#">Facebook</a> | 
            <a href="#">Twitter</a> | 
            <a href="#">Instagram</a>
        </div>
    </div>
    <script src="apps.js"></script>

</body>
</html>

<?php
$conn->close();
?>
