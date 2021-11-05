<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?> | Kopi Kebun</title>

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="<?php echo base_url('/css/style.css') ?>">

</head>
<body>
<!-- header section starts  -->

<header class="header">

    <a href="#" class="logo">
        <img src="/images/logo.png" alt="">
    </a>

    <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#products">Produk</a>
        <a href="#layanan">Layanan</a>
        <a href="#about">about</a>
        <a href="#contact">contact</a>
        <a href="<?php echo base_url('/Home/login')?>">Login</a>
    </nav>

    <!-- icon diatas -->
    <div class="icons">
        <div class="fas fa-search" id="search-btn"></div>
        <div class="fas fa-shopping-cart" id="cart-btn"></div>
        <a href="<?php echo base_url('/Home/login')?>">
            <div class="fas fa-user"></div>
        </a>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <!-- tombol pencarian -->
    <div class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </div>

    <!-- tombol items dikeranjang -->
    <div class="cart-items-container">
        <div class="di-keranjang">
            <span class="fas fa-times"></span>
            <img src="images/cart-item-1.png" alt="">
            <div class="content">
                <h3>cart item 01</h3>
                <div class="harga">$15.99/-</div>
            </div>
        </div>
        <div class="di-keranjang">
            <span class="fas fa-times"></span>
            <img src="images/cart-item-2.png" alt="">
            <div class="content">
                <h3>cart item 02</h3>
                <div class="harga">$15.99/-</div>
            </div>
        </div>
        <div class="di-keranjang">
            <span class="fas fa-times"></span>
            <img src="images/cart-item-3.png" alt="">
            <div class="content">
                <h3>cart item 03</h3>
                <div class="harga">$15.99/-</div>
            </div>
        </div>
        <div class="di-keranjang">
            <span class="fas fa-times"></span>
            <img src="images/cart-item-4.png" alt="">
            <div class="content">
                <h3>cart item 04</h3>
                <div class="harga">$15.99/-</div>
            </div>
        </div>
        <a href="#" class="btn">checkout now</a>
    </div>

</header>

<!-- header section ends -->

<?php echo $this->renderSection('content') ?>



<!-- footer section starts  -->

<section class="footer">

    <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
    </div>

    <div class="links">
        <a href="<?php echo base_url('/Home/coffee')?>">home</a>
        <a href="<?php echo base_url('/Home/produk')?>">products</a>
        <a href="<?php echo base_url('/Home/login')?>">login</a>
    </div>

    <div class="credit">created by <span>M. Fikri Aulian</span> | all rights reserved</div>

</section>

<!-- footer section ends -->





<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Ionicons -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


<!-- custom js file link  -->
<script src="/js/script.js"></script>

</body>
</html>
