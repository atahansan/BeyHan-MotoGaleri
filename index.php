<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ana Sayfa</title>
    <link rel="stylesheet" href="styles/ana_tasarim.css">
    <link rel="stylesheet" href="styles/index_grid.css">
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
            <a href="index.html">Ana sayfa</a>
            <a href="hakkimizda.html">Hakkımızda</a>
            <a href="#indirim-menu">İndirimdeki Ürünler </a>
        
            <?php if ($isLoggedIn): ?>
                <a href="logout.php">Çıkış Yap</a>
                <a href="hesapbilgi.php">Hesabım</a>
                <button id="toggle-cart-btn">🛒</button>
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
        <div class="grid-item">
            <a href="urunliste.php?kategori_id=1">
                <img src="https://powersports.honda.com/motorcycle/supersport/-/media/products/family/cbr1000rr-r-fireblade-sp/trims/trim-main/cbr1000rr-r-fireblade-sp/2025/2025-cbr1000rr-r-fireblade-sp-grand_prix_red-1505x923.png" alt="SuperSport">
                SuperSport Motorlar
            </a>
        </div>
        <div class="grid-item">
            <a href="urunliste.php?kategori_id=2">
                <img src="https://powersports.honda.com/motorcycle/standard/-/media/products/family/cb1000-hornet-sp/trims/trim-main/cb1000-hornet-sp/2025/2025-cb1000-hornet-sp-matte_black_metallic-1505x923.png" alt="NakedMotor">
                Naked Motorlar
            </a>
        </div>
        <div class="grid-item">
            <a href="urunliste.php?kategori_id=3">
                <img src="https://powersports.honda.com/motorcycle/touring/-/media/products/family/gold-wing-tour/trims/trim-main/gold-wing-tour/2025/2025-gold-wing-tour-light_silver_metallic-1505x923.png" alt="Touring">
                Touring Motorlar 
            </a>
        </div>
        <div class="grid-item">
            <a href="urunliste.php?kategori_id=4">
                <img src="https://powersports.honda.com/motorcycle/trail/-/media/products/family/crf450rx/trims/trim-main/crf450rx/2025/2025-crf450rx-red-1505x923.png" alt="Off-Road">
                Off-Road Motorlar
            </a>
        </div>
        <div class="grid-item">
            <a href="urunliste.php?kategori_id=5">
                <img src="https://powersports.honda.com/motorcycle/scooter/-/media/products/family/adv160/trims/trim-main/adv160/2026/2026-adv160-pearl_smoky_gray-1505x923.png" alt="Scooter">
                Scooter Motorlar
            </a>
        </div>
        <div class="grid-item">
            <a href="urunliste.php?kategori_id=6">
                <img src="https://powersports.honda.com/motorcycle/dual-sport/-/media/products/family/crf300l-rally/trims/trim-main/crf300l-rally/2025/2025-crf300l-rally-red-1505x923.png" alt="Adventure-Dual">
                Adventure-Dual Motorlar
            </a>
        </div>
        <div class="grid-item">
            <a href="urunliste.php?kategori_id=7">
                <img src="https://powersports.honda.com/motorcycle/minimoto/-/media/products/family/trail125/trims/trim-main/trail125/2025/2025-trail125-glowing_red-1505x923.png" alt="Trial">
                Trial Motorlar 
            </a>
        </div>
        <div class="grid-item">
            <a href="urunliste.php?kategori_id=8">
                <img src="https://powersports.honda.com/atv/recutility/-/media/products/family/fourtrax-rubicon-4x4/trims/trim-main/fourtrax-rubicon-700-4x4-automatic/2025/2025-fourtrax-rubicon-700-4x4-automatic-hero_red-1505x923.png" alt="ATV">
                ATV
            </a>
        </div>
    </div>

    <div class="main-header" id="indirim-menu">
        <h1>İndirimdeki Ürünler</h1>
    </div>
    <div class="grid-container-discount">
        <div class="grid-item">
            <a href="#">
                <img src="https://cdn.v5.honda.com.tr/img/models/gV6pUybIDw1708692195575.jpg?format=webp&quality=80&width=1008&height=648" alt="SuperSport">
                <p>Motor Çantası </p>
                <p><s>8.000</s><b style="color: red;"> 7.500</b></p>
            </a>
        </div>
        <div class="grid-item">
            <a href="#">
                <img src="https://cdn.v5.honda.com.tr/img/models/O4oh1pd7WU1708691522026.jpg?format=webp&quality=80&width=1008&height=648" alt="Naked">
                <p>Çanta Takı Demiri</p>
                <p><s>5.500</s><b style="color: red;"> 4.800</b></p>
            </a>
        </div>
        <div class="grid-item">
            <a href="#">
                <img src="https://cdn.v5.honda.com.tr/img/models/J93vGHNPUi1708951732178.jpg?format=webp&quality=80&width=1008&height=648" alt="Trial">
                <p>Jant Şeridi</p>
                <p><s>2.300</s><b style="color: red;"> 1.700 TL</b></p>
            </a>
        </div>
        <div class="grid-item">
            <a href="#">
                <img src="https://cdn.v5.honda.com.tr/img/models/SWmdyGMJbY1708952190520.jpg?format=webp&quality=80&width=1008&height=648" alt="ATV">
                <p>Ön Sis Far(Sağ)</p>
                <p><s>3.300</s><b style="color: red;"> 2.900 TL</b></p>
            </a>
        </div>
        <div class="grid-item">
            <a href="#">
                <img src="https://cdn.v5.honda.com.tr/img/models/n37hkMPXK81708953657102.jpg?format=webp&quality=80&width=1008&height=648" alt="Adventure-Dual">
                <p>Koruma Demiri</p>
                <p><s>3.000</s><b style="color: red;"> 2.700 TL</b></p>
            </a>
        </div>
        <div class="grid-item">
            <a href="#">
                <img src="https://cdn.v5.honda.com.tr/img/models/pDggUk3p0G1709067911276.jpg?format=webp&quality=80&width=1008&height=648" alt="Scooter">
                <p>Sinyal</p>
                <p><s>4.000</s><b style="color: red;"> 3.200 TL</b></p>
            </a>
        </div>
        <div class="grid-item">
            <a href="#">
                <img src="https://cdn.v5.honda.com.tr/img/models/6RuXyfdvoG1709068436832.jpg?format=webp&quality=80&width=1008&height=648" alt="Off-Road">
                <p>Sele(Mavi)</p>
                <p><s>3.100</s><b style="color: red;"> 1.900 TL</b></p>
            </a>
        </div>
        <div class="grid-item">
            <a href="#">
                <img src="https://cdn.v5.honda.com.tr/img/models/wSHOvfbHI41709107180422.jpg?format=webp&quality=80&width=1008&height=648" alt="Touring">
                <p>QuickShifter</p>
                <p><s>12.000</s><b style="color: red;"> 11.350</b></p>
            </a>
        </div>
        
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