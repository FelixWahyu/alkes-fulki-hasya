<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO Meta Tags -->
    <title><?= $title ?? 'Toko Alat Kesehatan Fulki Hasya' ?></title>
    <meta name="description"
        content="<?= $meta_desc ?? 'Toko Alat Kesehatan Fulki Hasya - Penyedia peralatan medis berkualitas untuk rumah sakit, klinik, dan kebutuhan pribadi. Produk lengkap, harga kompetitif, terpercaya.' ?>">
    <meta name="keywords"
        content="alat kesehatan, alkes, peralatan medis, tensimeter, oksimeter, nebulizer, kursi roda, Fulki Hasya">
    <meta name="author" content="Fulki Hasya">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= current_url() ?>">

    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?= $title ?? 'Toko Alat Kesehatan Fulki Hasya' ?>">
    <meta property="og:description"
        content="<?= $meta_desc ?? 'Penyedia peralatan medis berkualitas untuk rumah sakit, klinik, dan kebutuhan pribadi.' ?>">
    <meta property="og:url" content="<?= current_url() ?>">
    <meta property="og:site_name" content="Fulki Hasya">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $title ?? 'Toko Alat Kesehatan Fulki Hasya' ?>">
    <meta name="twitter:description" content="<?= $meta_desc ?? 'Penyedia peralatan medis berkualitas.' ?>">

    <!-- JSON-LD Organization Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "MedicalBusiness",
      "name": "<?= $settings['business_name'] ?? 'Toko Alat Kesehatan Fulki Hasya' ?>",
      "url": "<?= base_url() ?>",
      "telephone": "<?= $settings['wa_number'] ?? '' ?>",
      "email": "<?= $settings['web_email'] ?? '' ?>",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "<?= esc($settings['web_address'] ?? '') ?>",
        "addressCountry": "ID"
      }
    }
    </script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <style>
        /* =====================================================================
           DESIGN SYSTEM — FULKI HASYA
           Tema: Putih & Biru / White & Medical Blue
           ===================================================================== */
        :root {
            /* Brand Colors */
            --fh-blue-50: #EFF6FF;
            --fh-blue-100: #DBEAFE;
            --fh-blue-200: #BFDBFE;
            --fh-blue-400: #60A5FA;
            --fh-blue-500: #3B82F6;
            --fh-blue-600: #2563EB;
            --fh-blue-700: #1D4ED8;
            --fh-blue-800: #1E40AF;
            --fh-blue-900: #1E3A8A;

            --fh-primary: #1D4ED8;
            /* Core brand blue */
            --fh-primary-dark: #1E3A8A;
            /* Deep navy */
            --fh-primary-light: #3B82F6;
            /* Light blue */
            --fh-accent: #38BDF8;
            /* Sky accent */
            --fh-white: #FFFFFF;
            --fh-off-white: #F8FAFF;
            /* Near-white with blue tint */
            --fh-text: #0F172A;
            /* Near-black */
            --fh-text-muted: #64748B;
            /* Slate */
            --fh-border: #E2E8F0;
            --fh-success: #10B981;

            /* Gradients */
            --fh-gradient-hero: linear-gradient(135deg, #1E3A8A 0%, #1D4ED8 55%, #2563EB 100%);
            --fh-gradient-banner: linear-gradient(135deg, #1D4ED8 0%, #38BDF8 100%);
            --fh-gradient-card: linear-gradient(135deg, #EFF6FF 0%, #DBEAFE 100%);

            /* Shadows */
            --fh-shadow-sm: 0 1px 3px rgba(30, 58, 138, 0.06), 0 1px 2px rgba(30, 58, 138, 0.04);
            --fh-shadow-md: 0 4px 24px rgba(30, 58, 138, 0.08), 0 2px 8px rgba(30, 58, 138, 0.05);
            --fh-shadow-lg: 0 8px 40px rgba(30, 58, 138, 0.14), 0 4px 16px rgba(30, 58, 138, 0.08);
            --fh-shadow-blue: 0 8px 32px rgba(37, 99, 235, 0.30);

            /* Radii */
            --fh-radius-sm: 8px;
            --fh-radius-md: 14px;
            --fh-radius-lg: 20px;
            --fh-radius-xl: 28px;
            --fh-radius-pill: 50px;

            /* Transitions */
            --fh-transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* ---- Base ---- */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--fh-text);
            background: var(--fh-white);
            overflow-x: hidden;
            line-height: 1.6;
        }

        img {
            max-width: 100%;
        }

        a {
            transition: color var(--fh-transition);
        }

        /* ---- Typography ---- */
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            color: var(--fh-text);
            line-height: 1.25;
        }

        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--fh-primary);
            background: var(--fh-blue-50);
            padding: 6px 14px;
            border-radius: var(--fh-radius-pill);
            border: 1px solid var(--fh-blue-200);
            margin-bottom: 1rem;
        }

        .section-title {
            font-size: clamp(1.6rem, 4vw, 2.4rem);
            font-weight: 800;
            margin-bottom: 1rem;
        }

        /* ---- Buttons ---- */
        .btn-fh-primary {
            background: var(--fh-gradient-banner);
            color: var(--fh-white);
            border: none;
            border-radius: var(--fh-radius-pill);
            padding: 12px 28px;
            font-weight: 700;
            font-size: 0.95rem;
            box-shadow: var(--fh-shadow-blue);
            transition: all var(--fh-transition);
        }

        .btn-fh-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(37, 99, 235, 0.40);
            color: var(--fh-white);
        }

        .btn-fh-outline {
            background: transparent;
            color: var(--fh-white);
            border: 2px solid rgba(255, 255, 255, 0.7);
            border-radius: var(--fh-radius-pill);
            padding: 12px 28px;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all var(--fh-transition);
            backdrop-filter: blur(4px);
        }

        .btn-fh-outline:hover {
            background: var(--fh-white);
            color: var(--fh-primary);
            border-color: var(--fh-white);
            transform: translateY(-2px);
        }

        .btn-fh-light {
            background: var(--fh-blue-50);
            color: var(--fh-primary);
            border: 1.5px solid var(--fh-blue-200);
            border-radius: var(--fh-radius-pill);
            padding: 10px 24px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all var(--fh-transition);
        }

        .btn-fh-light:hover {
            background: var(--fh-primary);
            color: var(--fh-white);
            border-color: var(--fh-primary);
            transform: translateY(-2px);
            box-shadow: var(--fh-shadow-blue);
        }

        /* ---- Cards ---- */
        .card-fh {
            background: var(--fh-white);
            border: 1px solid var(--fh-border);
            border-radius: var(--fh-radius-lg);
            box-shadow: var(--fh-shadow-sm);
            transition: all var(--fh-transition);
            overflow: hidden;
        }

        .card-fh:hover {
            box-shadow: var(--fh-shadow-lg);
            transform: translateY(-4px);
            border-color: var(--fh-blue-200);
        }

        /* ---- Page Hero (Sub-pages) ---- */
        .page-hero {
            background: var(--fh-gradient-hero);
            padding: 120px 0 64px;
            position: relative;
            overflow: hidden;
        }

        .page-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Ccircle cx='30' cy='30' r='20'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .page-hero::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 60px;
            background: var(--fh-white);
            clip-path: ellipse(55% 100% at 50% 100%);
        }

        /* ---- Section ---- */
        .section-fh {
            padding: 80px 0;
        }

        .section-fh-sm {
            padding: 56px 0;
        }

        .section-bg-light {
            background: var(--fh-off-white);
        }

        /* ---- Scroll Reveal Utility ---- */
        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .reveal-delay-1 {
            transition-delay: 0.1s;
        }

        .reveal-delay-2 {
            transition-delay: 0.2s;
        }

        .reveal-delay-3 {
            transition-delay: 0.3s;
        }

        /* ============================================================
           NAVBAR
           ============================================================ */
        #mainNav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1050;
            padding: 18px 0;
            transition: all 0.4s ease;
        }

        /* Transparent — hanya di halaman Home saat belum scroll */
        #mainNav.nav-transparent {
            background: transparent;
        }

        #mainNav.nav-transparent .nav-link {
            color: rgba(255, 255, 255, 0.9) !important;
        }

        #mainNav.nav-transparent .navbar-brand {
            color: #fff !important;
        }

        #mainNav.nav-transparent .nav-link:hover {
            color: #fff !important;
        }

        #mainNav.nav-transparent .hamburger span {
            background: #fff;
        }

        /* Solid (scrolled / sub-pages) */
        #mainNav.nav-solid {
            background: var(--fh-white);
            box-shadow: 0 1px 0 var(--fh-border), var(--fh-shadow-sm);
            padding: 10px 0;
        }

        #mainNav.nav-solid .nav-link {
            color: var(--fh-text) !important;
        }

        #mainNav.nav-solid .navbar-brand {
            color: var(--fh-primary) !important;
        }

        #mainNav.nav-solid .hamburger span {
            background: var(--fh-primary);
        }

        .navbar-brand-fh {
            font-size: 1.3rem;
            font-weight: 800;
            letter-spacing: -0.3px;
            transition: color var(--fh-transition);
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }

        .navbar-brand-fh .brand-icon {
            width: 36px;
            height: 36px;
            background: var(--fh-gradient-banner);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 16px;
            flex-shrink: 0;
        }

        #mainNav.nav-transparent .brand-icon {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(8px);
        }

        .nav-link-fh {
            font-size: 0.92rem;
            font-weight: 600;
            padding: 6px 4px !important;
            position: relative;
            text-decoration: none;
            transition: color var(--fh-transition);
        }

        .nav-link-fh::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--fh-primary-light);
            border-radius: 2px;
            transition: width var(--fh-transition);
        }

        #mainNav.nav-transparent .nav-link-fh::after {
            background: rgba(255, 255, 255, 0.8);
        }

        .nav-link-fh:hover::after,
        .nav-link-fh.active-link::after {
            width: 100%;
        }

        .nav-link-fh.active-link {
            color: var(--fh-primary-light) !important;
        }

        #mainNav.nav-transparent .nav-link-fh.active-link {
            color: #fff !important;
        }

        /* Hamburger Custom */
        .hamburger {
            border: none;
            background: none;
            padding: 6px;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .hamburger span {
            display: block;
            width: 24px;
            height: 2.5px;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .hamburger.open span:nth-child(1) {
            transform: translateY(7.5px) rotate(45deg);
        }

        .hamburger.open span:nth-child(2) {
            opacity: 0;
            transform: scaleX(0);
        }

        .hamburger.open span:nth-child(3) {
            transform: translateY(-7.5px) rotate(-45deg);
        }

        /* Mobile Nav */
        @media (max-width: 991.98px) {
            .navbar-collapse-fh {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: var(--fh-white);
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                transform: translateX(100%);
                transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                z-index: 1049;
                padding: 40px 24px;
            }

            .navbar-collapse-fh.open {
                transform: translateX(0);
            }

            .mobile-nav-links {
                text-align: center;
                width: 100%;
            }

            .mobile-nav-links .nav-link-fh {
                display: block;
                font-size: 1.5rem;
                font-weight: 700;
                color: var(--fh-text) !important;
                padding: 14px 0 !important;
                border-bottom: 1px solid var(--fh-border);
            }

            .mobile-nav-links .nav-link-fh:last-child {
                border-bottom: none;
            }

            .mobile-nav-links .nav-link-fh::after {
                display: none;
            }

            .mobile-nav-close {
                position: absolute;
                top: 16px;
                right: 16px;
                background: var(--fh-blue-50);
                border: none;
                border-radius: 50%;
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 18px;
                color: var(--fh-primary);
                cursor: pointer;
            }
        }

        @media (min-width: 992px) {
            .navbar-collapse-fh {
                display: flex !important;
                align-items: center;
            }

            .navbar-collapse-fh.open {
                transform: none !important;
            }
        }

        /* ============================================================
           FOOTER
           ============================================================ */
        .footer-fh {
            background: var(--fh-primary-dark);
            color: rgba(255, 255, 255, 0.85);
            padding: 72px 0 0;
            position: relative;
        }

        .footer-fh::before {
            content: '';
            display: block;
            height: 4px;
            background: var(--fh-gradient-banner);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
        }

        .footer-logo-text {
            font-size: 1.25rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 12px;
        }

        .footer-fh p {
            color: rgba(255, 255, 255, 0.65);
            font-size: 0.9rem;
            line-height: 1.75;
        }

        .footer-heading {
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.40);
            margin-bottom: 20px;
        }

        .footer-link {
            display: block;
            color: rgba(255, 255, 255, 0.70);
            text-decoration: none;
            font-size: 0.88rem;
            font-weight: 500;
            padding: 5px 0;
            transition: color var(--fh-transition), padding-left var(--fh-transition);
        }

        .footer-link:hover {
            color: var(--fh-accent);
            padding-left: 6px;
        }

        .footer-social {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.08);
            color: rgba(255, 255, 255, 0.75);
            font-size: 15px;
            text-decoration: none;
            transition: all var(--fh-transition);
            margin-right: 8px;
        }

        .footer-social:hover {
            background: var(--fh-accent);
            color: #fff;
            transform: translateY(-2px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding: 20px 0;
            margin-top: 56px;
        }

        .footer-bottom p {
            font-size: 0.82rem;
            color: rgba(255, 255, 255, 0.35);
            margin: 0;
        }

        /* ============================================================
           FLOATING WHATSAPP BUTTON
           ============================================================ */
        .float-wa {
            position: fixed;
            bottom: 28px;
            right: 28px;
            z-index: 999;
            width: 58px;
            height: 58px;
            border-radius: 50%;
            background: #25D366;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 26px;
            text-decoration: none;
            box-shadow: 0 6px 28px rgba(37, 211, 102, 0.45);
            transition: all var(--fh-transition);
        }

        .float-wa::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: rgba(37, 211, 102, 0.35);
            animation: waPulse 2.5s ease-out infinite;
        }

        .float-wa:hover {
            transform: scale(1.1);
            color: #fff;
            box-shadow: 0 10px 40px rgba(37, 211, 102, 0.55);
        }

        @keyframes waPulse {
            0% {
                transform: scale(1);
                opacity: 0.8;
            }

            100% {
                transform: scale(2);
                opacity: 0;
            }
        }

        /* ============================================================
           UTILITIES
           ============================================================ */
        .text-primary-fh {
            color: var(--fh-primary);
        }

        .bg-blue-50 {
            background: var(--fh-blue-50);
        }

        .icon-box {
            width: 52px;
            height: 52px;
            border-radius: var(--fh-radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--fh-blue-50);
            color: var(--fh-primary);
            font-size: 20px;
            flex-shrink: 0;
        }

        .badge-fh {
            background: var(--fh-blue-50);
            color: var(--fh-primary);
            border-radius: var(--fh-radius-pill);
            font-size: 0.78rem;
            font-weight: 600;
            padding: 4px 12px;
            border: 1px solid var(--fh-blue-200);
        }

        /* Divider */
        .divider-fh {
            width: 48px;
            height: 4px;
            background: var(--fh-gradient-banner);
            border-radius: 2px;
            margin: 12px 0 24px;
        }

        @media (max-width: 575.98px) {
            .section-fh {
                padding: 56px 0;
            }

            .section-fh-sm {
                padding: 40px 0;
            }
        }
    </style>
</head>

<body>

    <!-- ============================================================
     NAVBAR
     ============================================================ -->
    <nav id="mainNav" class="<?= url_is('/') ? 'nav-transparent' : 'nav-solid' ?>">
        <div class="container d-flex align-items-center justify-content-between">

            <!-- Brand -->
            <a href="<?= base_url() ?>" class="navbar-brand-fh">
                <?php if (!empty($settings['web_logo'])): ?>
                    <img src="<?= base_url('uploads/media/' . $settings['web_logo']) ?>"
                        alt="<?= $settings['business_name'] ?? 'Fulki Hasya' ?>" style="height: 40px;">
                <?php else: ?>
                    <div class="brand-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                <?php endif; ?>
                <span><?= $settings['business_name'] ?? 'Fulki Hasya' ?></span>
            </a>

            <!-- Desktop Nav -->
            <div class="navbar-collapse-fh" id="navCollapse">
                <!-- Mobile Close Button -->
                <button class="mobile-nav-close d-lg-none" id="mobileNavClose" aria-label="Tutup menu">
                    <i class="fas fa-times"></i>
                </button>
                <div class="mobile-nav-links d-flex flex-column flex-lg-row align-items-lg-center gap-lg-4 ms-lg-auto">
                    <?php
                    $current = uri_string();
                    $navLinks = [
                        '' => 'Home',
                        'katalog' => 'Katalog',
                        'tentang-kami' => 'Tentang Kami',
                        'kontak' => 'Kontak',
                    ];
                    foreach ($navLinks as $uri => $label):
                        $isActive = ($uri === '' ? ($current === '') : str_starts_with($current, $uri));
                        ?>
                        <a href="<?= base_url($uri) ?>" class="nav-link-fh <?= $isActive ? 'active-link' : '' ?>">
                            <?= $label ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Hamburger -->
            <button class="hamburger d-lg-none" id="hamburgerBtn" aria-label="Buka menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>

    <!-- Mobile Nav Overlay -->
    <div class="d-lg-none" id="mobileOverlay"
        style="display:none !important; position:fixed; inset:0; background:rgba(15,23,42,0.5); z-index:1048; opacity:0; transition:opacity 0.3s;">
    </div>

    <main>
        <?= $this->renderSection('content') ?>
    </main>

    <!-- ============================================================
     FOOTER
     ============================================================ -->
    <footer class="footer-fh">
        <div class="container">
            <div class="row g-5">

                <!-- Brand & About -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-logo-text">
                        <?php if (!empty($settings['web_logo'])): ?>
                            <img src="<?= base_url('uploads/media/' . $settings['web_logo']) ?>"
                                alt="<?= $settings['business_name'] ?? 'Fulki Hasya' ?>"
                                style="height: 35px; margin-right: 10px;">
                        <?php else: ?>
                            <i class="fas fa-heartbeat me-2" style="color: var(--fh-accent);"></i>
                        <?php endif; ?>
                        <?= $settings['business_name'] ?? 'Fulki Hasya' ?>
                    </div>
                    <p><?= $settings['about_text'] ?? 'Penyedia peralatan medis berkualitas untuk rumah sakit, klinik, dan kebutuhan pribadi.' ?>
                    </p>
                    <div class="mt-4">
                        <a href="https://wa.me/<?= $settings['wa_number'] ?? '' ?>" target="_blank"
                            class="footer-social" aria-label="WhatsApp">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                        <a href="#" class="footer-social" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="footer-social" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </div>
                </div>

                <!-- Navigasi -->
                <div class="col-lg-2 col-md-6 col-6">
                    <p class="footer-heading">Navigasi</p>
                    <a href="<?= base_url() ?>" class="footer-link">Home</a>
                    <a href="<?= base_url('katalog') ?>" class="footer-link">Katalog Produk</a>
                    <a href="<?= base_url('tentang-kami') ?>" class="footer-link">Tentang Kami</a>
                    <a href="<?= base_url('kontak') ?>" class="footer-link">Kontak</a>
                </div>

                <!-- Layanan -->
                <div class="col-lg-2 col-md-6 col-6">
                    <p class="footer-heading">Layanan</p>
                    <a href="<?= base_url('katalog') ?>" class="footer-link">Alat Diagnosis</a>
                    <a href="<?= base_url('katalog') ?>" class="footer-link">Alat Terapi</a>
                    <a href="<?= base_url('katalog') ?>" class="footer-link">Alat Monitoring</a>
                    <a href="<?= base_url('katalog') ?>" class="footer-link">Mobilitas</a>
                </div>

                <!-- Kontak -->
                <div class="col-lg-4 col-md-6">
                    <p class="footer-heading">Hubungi Kami</p>
                    <div class="d-flex gap-3 mb-3">
                        <div class="icon-box"
                            style="background:rgba(255,255,255,0.07); color:var(--fh-accent); width:38px; height:38px; min-width:38px; border-radius:8px;">
                            <i class="fab fa-whatsapp" style="font-size:16px;"></i>
                        </div>
                        <div>
                            <div style="font-size:0.78rem; color:rgba(255,255,255,0.4); margin-bottom:2px;">WhatsApp
                            </div>
                            <span
                                style="font-size:0.88rem; color:rgba(255,255,255,0.8);">+<?= $settings['wa_number'] ?? '62-xxx-xxxx-xxxx' ?></span>
                        </div>
                    </div>
                    <div class="d-flex gap-3 mb-3">
                        <div class="icon-box"
                            style="background:rgba(255,255,255,0.07); color:var(--fh-accent); width:38px; height:38px; min-width:38px; border-radius:8px;">
                            <i class="fas fa-envelope" style="font-size:16px;"></i>
                        </div>
                        <div>
                            <div style="font-size:0.78rem; color:rgba(255,255,255,0.4); margin-bottom:2px;">Email</div>
                            <span
                                style="font-size:0.88rem; color:rgba(255,255,255,0.8);"><?= $settings['web_email'] ?? 'info@fulkihasya.com' ?></span>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="icon-box"
                            style="background:rgba(255,255,255,0.07); color:var(--fh-accent); width:38px; height:38px; min-width:38px; border-radius:8px;">
                            <i class="fas fa-map-marker-alt" style="font-size:16px;"></i>
                        </div>
                        <div>
                            <div style="font-size:0.78rem; color:rgba(255,255,255,0.4); margin-bottom:2px;">Lokasi</div>
                            <span
                                style="font-size:0.88rem; color:rgba(255,255,255,0.8);"><?= $settings['web_address'] ?? 'Indonesia' ?></span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Bottom -->
            <div class="footer-bottom d-flex flex-column flex-md-row align-items-center justify-content-between gap-2">
                <p>&copy; <?= date('Y') ?> <?= $settings['business_name'] ?? 'Toko Alat Kesehatan Fulki Hasya' ?>. Semua
                    hak dilindungi.</p>
                <p>Dibuat dengan <i class="fas fa-heart" style="color:#EF4444;"></i> untuk kesehatan Indonesia</p>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp -->
    <a href="https://wa.me/<?= $settings['wa_number'] ?? '' ?>" class="float-wa" target="_blank"
        aria-label="Chat via WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        (function () {
            /* ---- Navbar scroll effect ---- */
            const nav = document.getElementById('mainNav');
            const isHome = (window.location.pathname === '/' || window.location.pathname === '/index.php');

            function updateNav() {
                if (isHome) {
                    if (window.scrollY > 60) {
                        nav.classList.replace('nav-transparent', 'nav-solid');
                    } else {
                        nav.classList.replace('nav-solid', 'nav-transparent');
                    }
                }
            }
            if (isHome) window.addEventListener('scroll', updateNav, { passive: true });

            /* ---- Mobile Nav ---- */
            const hamburger = document.getElementById('hamburgerBtn');
            const navCollapse = document.getElementById('navCollapse');
            const mobileClose = document.getElementById('mobileNavClose');
            const overlay = document.getElementById('mobileOverlay');

            function openMobileNav() {
                navCollapse.classList.add('open');
                hamburger.classList.add('open');
                hamburger.setAttribute('aria-expanded', 'true');
                overlay.style.setProperty('display', 'block', 'important');
                setTimeout(() => { overlay.style.opacity = '1'; }, 10);
                document.body.style.overflow = 'hidden';
            }

            function closeMobileNav() {
                navCollapse.classList.remove('open');
                hamburger.classList.remove('open');
                hamburger.setAttribute('aria-expanded', 'false');
                overlay.style.opacity = '0';
                setTimeout(() => { overlay.style.setProperty('display', 'none', 'important'); }, 300);
                document.body.style.overflow = '';
            }

            if (hamburger) hamburger.addEventListener('click', openMobileNav);
            if (mobileClose) mobileClose.addEventListener('click', closeMobileNav);
            if (overlay) overlay.addEventListener('click', closeMobileNav);

            /* ---- Scroll Reveal ---- */
            const revealEls = document.querySelectorAll('.reveal');
            if (revealEls.length) {
                const revealObs = new IntersectionObserver((entries) => {
                    entries.forEach(e => {
                        if (e.isIntersecting) { e.target.classList.add('visible'); revealObs.unobserve(e.target); }
                    });
                }, { threshold: 0.12 });
                revealEls.forEach(el => revealObs.observe(el));
            }

            /* ---- Counter Animation ---- */
            function animateCounter(el) {
                const target = parseInt(el.getAttribute('data-target'), 10);
                const suffix = el.getAttribute('data-suffix') || '';
                const duration = 1800;
                const step = target / (duration / 16);
                let current = 0;
                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) { current = target; clearInterval(timer); }
                    el.textContent = Math.floor(current).toLocaleString('id-ID') + suffix;
                }, 16);
            }
            const counterObs = new IntersectionObserver((entries) => {
                entries.forEach(e => {
                    if (e.isIntersecting) {
                        animateCounter(e.target);
                        counterObs.unobserve(e.target);
                    }
                });
            }, { threshold: 0.5 });
            document.querySelectorAll('[data-target]').forEach(el => counterObs.observe(el));
        })();
    </script>

    <?= $this->renderSection('scripts') ?>
</body>

</html>