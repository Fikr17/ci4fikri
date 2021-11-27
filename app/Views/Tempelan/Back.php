<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?> | Kopi Kebun</title>

    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="/css/kulit.css">

</head>

<body>
    <!-- navbar bootstrap 5 -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="min-width: 450px;">
        <div class="container-fluid">
            <img src="/images/logo.png" class="navbar-brand" style="width: 4rem;">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/Home/coffee'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/Produk/produk'); ?>">Produk</a>
                    </li>
                    <?php if (allow('admin')) : //dari youtube Agung Widhiatmojo 
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/Admin/funcData'); ?>">Admin</a>
                        </li>
                    <?php endif; ?>
                    <?php if (allow('admin')) : 
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/Admin/pesan'); ?>">Pesan</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/Auth/logout'); ?>">Log out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- navbar section ends -->

    <?php echo $this->renderSection('content') ?>



    <!-- footer section starts  -->

    <section class="footer" style="min-width: 450px;">

        <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="https://github.com/Fikr17" class="fab fa-github"></a>
            <a href="#" class="fab fa-instagram"></a>
        </div>

        <div class="links">
            <a href="<?= base_url('/Home/coffee'); ?>">Home</a>
            <a href="<?= base_url('/produk'); ?>">products</a>
            <?php if (allow('admin')) : ?>
                <a href="<?= base_url('/Admin/index'); ?>">Admin</a>
            <?php endif; ?>
        </div>

        <div class="credit">created by <span>M. Fikri Aulian</span> | all rights reserved</div>

    </section>

    <!-- footer section ends -->

    <script>
        function previewImg() {
            const gambar = document.querySelector('#gambar');
            const gambarLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            gambarLabel.textContent = gambar.files[0].name;

            const fileGambar = new FileReader();
            fileGambar.readAsDataURL(gambar.files[0]);

            fileGambar.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
        // function show(){
        //     const showImg = document.querySelector('.tampil-gambar');
        //     const inputImg = document.querySelector('#image');
        //     const fileImg = new FileReader();

        //     fileImg.readAsDataURL(inputImg.files[0]);

        //     fileImg.onload = function(e){
        //         showImg.src = e.target.result;
        //     }
        // }
    </script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <!-- custom js file link  -->
    <script src="/js/script.js"></script>


</body>

</html>