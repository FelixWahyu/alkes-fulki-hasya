<?= $this->extend('frontend/layout/template') ?>
<?= $this->section('content') ?>

<!-- Page Hero -->
<section class="page-hero" aria-label="Tentang Kami">
    <div class="container text-center" style="position:relative; z-index:2;">
        <nav aria-label="breadcrumb" class="d-flex justify-content-center mb-4">
            <ol class="breadcrumb-fh">
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li><i class="fas fa-chevron-right"></i></li>
                <li aria-current="page">Tentang Kami</li>
            </ol>
        </nav>
        <span class="section-label" style="background:rgba(255,255,255,0.15); color:#fff; border-color:rgba(255,255,255,0.3);">
            <i class="fas fa-building-user"></i> Profil Perusahaan
        </span>
        <h1 style="font-size:clamp(2rem,5vw,3.2rem); color:#fff; margin-top:12px; margin-bottom:12px;">
            Tentang Fulki Hasya
        </h1>
        <p style="color:rgba(255,255,255,0.8); max-width:560px; margin:0 auto; font-size:1.05rem;">
            Menjadi mitra kesehatan terpercaya untuk kebutuhan alat medis Anda sejak hari pertama.
        </p>
    </div>
</section>

<!-- ============================================================
     PROFIL SECTION
     ============================================================ -->
<section class="section-fh">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 reveal">
                <div class="about-img-grid">
                    <img src="https://images.unsplash.com/photo-1576091160550-2173be9997a2?auto=format&fit=crop&q=80&w=800"
                         class="about-grid-main"
                         alt="Tim Fulki Hasya"
                         loading="lazy">
                    <div class="about-grid-accent">
                        <i class="fas fa-heartbeat fa-2x mb-3" style="color:var(--fh-accent);"></i>
                        <div style="font-size:1.8rem; font-weight:800; color:#fff; line-height:1;">Sejak</div>
                        <div style="font-size:2.4rem; font-weight:800; color:var(--fh-accent); line-height:1;">2019</div>
                        <div style="font-size:0.82rem; color:rgba(255,255,255,0.75); margin-top:4px;">Melayani Indonesia</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 ps-lg-5 reveal reveal-delay-2">
                <span class="section-label"><i class="fas fa-info-circle"></i> Profil Kami</span>
                <h2 class="section-title">Toko Alat Kesehatan<br>Terpercaya di Indonesia</h2>
                <div class="divider-fh"></div>

                <p style="color:var(--fh-text-muted); font-size:1rem; line-height:1.85; margin-bottom:1.25rem;">
                    Toko Alat Kesehatan <strong>Fulki Hasya</strong> didirikan dengan komitmen untuk menjadi mitra terdepan dalam penyediaan peralatan medis berkualitas di Indonesia. Kami melayani kebutuhan rumah sakit, klinik, instansi kesehatan, hingga pemakaian pribadi di rumah.
                </p>
                <p style="color:var(--fh-text-muted); font-size:1rem; line-height:1.85;">
                    Sejak berdiri, kami terus berinovasi dalam menyediakan teknologi kesehatan terbaru dengan harga yang tetap kompetitif tanpa mengesampingkan standar keamanan medis internasional.
                </p>

                <!-- Stats row -->
                <div class="row g-3 mt-3">
                    <?php
                    $stats = [
                        ['value' => '200+', 'label' => 'Jenis Produk', 'icon' => 'fa-boxes-stacked'],
                        ['value' => '1K+',  'label' => 'Kepuasan Pelanggan', 'icon' => 'fa-users'],
                        ['value' => '50+',  'label' => 'Mitra Terpercaya', 'icon' => 'fa-handshake'],
                    ];
                    foreach ($stats as $s): ?>
                    <div class="col-4">
                        <div class="mini-stat">
                            <div class="mini-stat-icon"><i class="fas <?= $s['icon'] ?>"></i></div>
                            <div class="mini-stat-value"><?= $s['value'] ?></div>
                            <div class="mini-stat-label"><?= $s['label'] ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     VISI MISI
     ============================================================ -->
<section class="section-fh section-bg-light">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <span class="section-label"><i class="fas fa-bullseye"></i> Arah & Tujuan</span>
            <h2 class="section-title">Visi & Misi Kami</h2>
        </div>

        <div class="row g-4">
            <!-- Visi -->
            <div class="col-md-6 reveal reveal-delay-1">
                <div class="visi-misi-card visi">
                    <div class="visi-misi-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3>Visi Kami</h3>
                    <p>Menjadi penyedia alat kesehatan terlengkap, terpercaya, dan menjadi solusi utama bagi peningkatan kualitas hidup masyarakat Indonesia melalui teknologi medis unggul.</p>
                </div>
            </div>

            <!-- Misi -->
            <div class="col-md-6 reveal reveal-delay-2">
                <div class="visi-misi-card misi">
                    <div class="visi-misi-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <h3>Misi Kami</h3>
                    <ul class="misi-list">
                        <li><i class="fas fa-check"></i> Menyediakan alat kesehatan yang tersertifikasi dan berkualitas tinggi.</li>
                        <li><i class="fas fa-check"></i> Memberikan layanan konsultasi dan purna jual yang profesional.</li>
                        <li><i class="fas fa-check"></i> Membangun kemitraan strategis dengan produsen medis terkemuka global.</li>
                        <li><i class="fas fa-check"></i> Menjaga harga yang kompetitif tanpa mengorbankan kualitas.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     VALUE CARDS
     ============================================================ -->
<section class="section-fh">
    <div class="container">
        <div class="text-center mb-5 reveal">
            <span class="section-label"><i class="fas fa-gem"></i> Nilai Kami</span>
            <h2 class="section-title">Mengapa Memilih Fulki Hasya?</h2>
        </div>

        <div class="row g-4">
            <?php
            $values = [
                ['icon' => 'fa-certificate', 'title' => 'Produk Bersertifikat',     'desc' => 'Semua produk telah melewati standar sertifikasi resmi BPOM dan ISO untuk keamanan Anda.'],
                ['icon' => 'fa-tags',        'title' => 'Harga Terbaik',            'desc' => 'Harga kompetitif dan transparan tanpa biaya tersembunyi. Anda mendapat nilai terbaik.'],
                ['icon' => 'fa-truck-fast',   'title' => 'Pengiriman Cepat',         'desc' => 'Proses pengiriman cepat dan aman ke seluruh Indonesia dengan packaging standar.'],
                ['icon' => 'fa-headset',     'title' => 'Layanan Profesional',      'desc' => 'Tim kami siap membantu konsultasi produk sesuai kebutuhan Anda setiap saat.'],
            ];
            foreach ($values as $i => $v): ?>
            <div class="col-sm-6 col-lg-3 reveal reveal-delay-<?= $i + 1 ?>">
                <div class="value-card card-fh p-4 h-100">
                    <div class="value-icon mb-3">
                        <i class="fas <?= $v['icon'] ?>"></i>
                    </div>
                    <h4 style="font-size:1rem; font-weight:700; margin-bottom:10px;"><?= $v['title'] ?></h4>
                    <p style="font-size:0.88rem; color:var(--fh-text-muted); line-height:1.7; margin:0;"><?= $v['desc'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->include('frontend/layout/_mitra') ?>

<style>
/* ---- Breadcrumb ---- */
.breadcrumb-fh {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    list-style: none;
    padding: 0;
    margin: 0;
    font-size: 0.85rem;
    color: rgba(255,255,255,0.7);
}
.breadcrumb-fh a { color: rgba(255,255,255,0.85); text-decoration: none; }
.breadcrumb-fh a:hover { color: #fff; }
.breadcrumb-fh i { font-size: 10px; opacity: 0.5; }
.breadcrumb-fh li[aria-current="page"] { color: #fff; font-weight: 600; }

/* ---- About Image Grid ---- */
.about-img-grid { position: relative; }
.about-grid-main {
    width: 100%;
    height: 480px;
    object-fit: cover;
    border-radius: var(--fh-radius-xl);
    box-shadow: var(--fh-shadow-lg);
    display: block;
}
.about-grid-accent {
    position: absolute;
    bottom: 28px;
    left: -20px;
    background: var(--fh-gradient-hero);
    border-radius: var(--fh-radius-lg);
    padding: 24px 28px;
    text-align: center;
    box-shadow: var(--fh-shadow-lg);
    min-width: 140px;
}
@media (max-width: 991.98px) {
    .about-grid-accent { display: none; }
    .about-grid-main { height: 320px; }
}

/* ---- Mini Stats ---- */
.mini-stat {
    text-align: center;
    background: var(--fh-off-white);
    border: 1px solid var(--fh-border);
    border-radius: var(--fh-radius-md);
    padding: 16px 8px;
}
.mini-stat-icon {
    color: var(--fh-primary);
    font-size: 20px;
    margin-bottom: 6px;
}
.mini-stat-value { font-size: 1.4rem; font-weight: 800; color: var(--fh-primary-dark); line-height: 1; margin-bottom: 4px; }
.mini-stat-label { font-size: 0.75rem; color: var(--fh-text-muted); font-weight: 500; }

/* ---- Visi Misi ---- */
.visi-misi-card {
    border-radius: var(--fh-radius-lg);
    padding: 36px 32px;
    height: 100%;
    border: 1px solid var(--fh-border);
    background: #fff;
    box-shadow: var(--fh-shadow-sm);
    transition: all var(--fh-transition);
}
.visi-misi-card:hover { box-shadow: var(--fh-shadow-lg); transform: translateY(-4px); }
.visi-misi-icon {
    width: 64px;
    height: 64px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 26px;
    margin-bottom: 20px;
}
.visi-misi-card.visi .visi-misi-icon { background: var(--fh-blue-50); color: var(--fh-primary); }
.visi-misi-card.misi .visi-misi-icon { background: #ECFDF5; color: var(--fh-success); }
.visi-misi-card h3 { font-size: 1.25rem; font-weight: 700; margin-bottom: 14px; }
.visi-misi-card p { color: var(--fh-text-muted); line-height: 1.8; }
.misi-list { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px; }
.misi-list li {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    font-size: 0.92rem;
    color: var(--fh-text-muted);
    line-height: 1.6;
}
.misi-list li i { color: var(--fh-success); margin-top: 3px; font-size: 13px; flex-shrink: 0; }

/* ---- Value Cards ---- */
.value-icon {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    background: var(--fh-blue-50);
    color: var(--fh-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    transition: all var(--fh-transition);
}
.value-card:hover .value-icon { background: var(--fh-primary); color: #fff; }
</style>

<?= $this->endSection() ?>