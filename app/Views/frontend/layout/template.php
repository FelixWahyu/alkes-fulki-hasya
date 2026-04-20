<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Toko Alat Kesehatan Fulki Hasya' ?></title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <style>
        :root { --med-blue: #2C7BE5; --med-dark: #1A2B49; }
        body { font-family: 'Inter', sans-serif; color: #444; overflow-x: hidden; }
        h1, h2, h3, .navbar-brand { font-family: 'Poppins', sans-serif; }
        
        .navbar { 
    transition: all 0.3s; 
    padding: 15px 0; 
}
/* Class baru untuk halaman selain Home */
.navbar.nav-page { 
    background: #fff; 
    box-shadow: 0 2px 10px rgba(0,0,0,0.1); 
    padding: 10px 0; 
}
.navbar.nav-page .nav-link { color: #444 !important; }
.navbar.nav-page .navbar-brand { color: var(--med-blue) !important; }
.navbar.nav-page .btn-outline-light { color: var(--med-blue); border-color: var(--med-blue); }
        
        
        /* Floating WA Button */
        .float-wa { position: fixed; bottom: 30px; right: 30px; background: #25d366; color: #fff; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.3); z-index: 9999; text-decoration: none; transition: 0.3s; }
        .float-wa:hover { transform: scale(1.1); color: white; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top <?= (url_is('/')) ? 'navbar-dark' : 'nav-page navbar-light' ?>" id="mainNav">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="<?= base_url() ?>">
                <i class="fas fa-heartbeat me-2"></i>FULKI HASYA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto fw-medium">
        <li class="nav-item"><a class="nav-link px-3" href="<?= base_url() ?>">Home</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="<?= base_url('katalog') ?>">Katalog Produk</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="<?= base_url('tentang-kami') ?>">Tentang Kami</a></li>
        <li class="nav-item"><a class="nav-link px-3" href="<?= base_url('kontak') ?>">Kontak</a></li>
        </ul>
</div>
        </div>
    </nav>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <footer class="bg-dark text-white pt-5 pb-3">
        <div class="container text-center">
            <h4 class="fw-bold mb-4">Toko Alat Kesehatan Fulki Hasya</h4>
            <p class="opacity-75 mb-4 mx-auto" style="max-width: 600px;"><?= $settings['about_text'] ?? '' ?></p>
            <div class="mb-4">
                <a href="#" class="text-white mx-2 fs-5"><i class="fab fa-instagram"></i></a>
                <a href="#" class="text-white mx-2 fs-5"><i class="fab fa-facebook"></i></a>
                <a href="#" class="text-white mx-2 fs-5"><i class="fab fa-whatsapp"></i></a>
            </div>
            <hr class="opacity-25">
            <p class="small opacity-50 mb-0">&copy; <?= date('Y') ?> Fulki Hasya. Dibuat dengan profesionalisme medis.</p>
        </div>
    </footer>

    <a href="https://wa.me/<?= $settings['wa_number'] ?? '' ?>" class="float-wa" target="_blank">
        <i class="fab fa-whatsapp"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    
    <script>
    window.onscroll = function() {
        var nav = document.getElementById('mainNav');
        // Hanya jalankan efek transparan di halaman Home (/)
        if (window.location.pathname === '/' || window.location.pathname === '/index.php') {
            if (window.pageYOffset > 50) {
                nav.classList.add("sticky-nav", "navbar-light", "bg-white", "shadow-sm");
                nav.classList.remove("navbar-dark");
            } else {
                nav.classList.remove("sticky-nav", "navbar-light", "bg-white", "shadow-sm");
                nav.classList.add("navbar-dark");
            }
        }
    };
</script>
</body>
</html>