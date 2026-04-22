<?= $this->extend('frontend/layout/template') ?>
<?= $this->section('content') ?>

<!-- Page Hero -->
<section class="page-hero" aria-label="Kontak">
    <div class="container text-center" style="position:relative; z-index:2;">
        <nav aria-label="breadcrumb" class="d-flex justify-content-center mb-4">
            <ol class="breadcrumb-fh">
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li><i class="fas fa-chevron-right"></i></li>
                <li aria-current="page">Kontak</li>
            </ol>
        </nav>
        <span class="section-label" style="background:rgba(255,255,255,0.15); color:#fff; border-color:rgba(255,255,255,0.3);">
            <i class="fas fa-envelope"></i> Hubungi Kami
        </span>
        <h1 style="font-size:clamp(2rem,5vw,3.2rem); color:#fff; margin-top:12px; margin-bottom:12px;">
            Ada Pertanyaan? Kami Siap Membantu
        </h1>
        <p style="color:rgba(255,255,255,0.8); max-width:540px; margin:0 auto; font-size:1.05rem;">
            Tim kami siap melayani kebutuhan konsultasi alat kesehatan Anda kapan saja.
        </p>
    </div>
</section>

<!-- ============================================================
     CONTACT BODY
     ============================================================ -->
<section class="section-fh">
    <div class="container">
        <div class="row g-5">

            <!-- Contact Info -->
            <div class="col-lg-5 reveal">
                <span class="section-label"><i class="fas fa-phone"></i> Informasi Kontak</span>
                <h2 style="font-size:1.75rem; font-weight:800; margin-bottom:8px; margin-top:12px;">Hubungi Kami Langsung</h2>
                <p style="color:var(--fh-text-muted); margin-bottom:32px; line-height:1.7;">
                    Kami berkomitmen merespons setiap pertanyaan dengan cepat dan profesional.
                </p>

                <!-- Contact Cards -->
                <div class="contact-cards">
                    <div class="contact-card">
                        <div class="contact-card-icon" style="background:#EFF6FF; color:var(--fh-primary);">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-card-body">
                            <h6>Alamat Toko</h6>
                            <p>Jl. Kesehatan Raya No. 123, Indonesia</p>
                        </div>
                    </div>

                    <div class="contact-card">
                        <div class="contact-card-icon" style="background:#F0FDF4; color:#16A34A;">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="contact-card-body">
                            <h6>WhatsApp Admin</h6>
                            <a href="https://wa.me/<?= $settings['wa_number'] ?? '' ?>" target="_blank" class="contact-link-wa">
                                +<?= $settings['wa_number'] ?? '628123456789' ?>
                            </a>
                        </div>
                    </div>

                    <div class="contact-card">
                        <div class="contact-card-icon" style="background:#FFF7ED; color:#EA580C;">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-card-body">
                            <h6>Email Resmi</h6>
                            <a href="mailto:info@fulkihasya.com" class="contact-link">info@fulkihasya.com</a>
                        </div>
                    </div>

                    <div class="contact-card">
                        <div class="contact-card-icon" style="background:#EFF6FF; color:var(--fh-primary);">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-card-body">
                            <h6>Jam Operasional</h6>
                            <p>Senin–Sabtu: 08.00–17.00 WIB</p>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="mt-4">
                    <p style="font-size:0.85rem; font-weight:700; color:var(--fh-text); margin-bottom:14px;">Ikuti Kami di Media Sosial</p>
                    <div class="social-row">
                        <a href="#" class="social-pill" aria-label="Instagram">
                            <i class="fab fa-instagram"></i> Instagram
                        </a>
                        <a href="#" class="social-pill" aria-label="Facebook">
                            <i class="fab fa-facebook-f"></i> Facebook
                        </a>
                        <a href="https://wa.me/<?= $settings['wa_number'] ?? '' ?>" target="_blank" class="social-pill wa" aria-label="WhatsApp">
                            <i class="fab fa-whatsapp"></i> WhatsApp
                        </a>
                    </div>
                </div>
            </div>

            <!-- Map -->
            <div class="col-lg-7 reveal reveal-delay-2">
                <div class="map-wrap card-fh p-0 overflow-hidden">
                    <div class="map-header">
                        <i class="fas fa-map-pin me-2"></i>
                        <span>Lokasi Toko Fulki Hasya</span>
                    </div>
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.3307977257987!2d109.26932269999999!3d-7.428597199999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655f4be46ceeff%3A0x9e4da5ea761b5a56!2sToko%20Alkes%20Fulki%20Hasya!5e0!3m2!1sid!2sid!4v1776677285691!5m2!1sid!2sid"
                            width="100%"
                            height="100%"
                            style="border:0; display:block;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Lokasi Toko Alkes Fulki Hasya">
                        </iframe>
                    </div>
                    <div class="map-footer">
                        <i class="fas fa-directions me-2" style="color:var(--fh-primary);"></i>
                        <a href="https://goo.gl/maps/example" target="_blank" style="color:var(--fh-primary); font-weight:600; text-decoration:none; font-size:0.88rem;">
                            Buka di Google Maps <i class="fas fa-external-link-alt ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     PARTNERSHIP FORM
     ============================================================ -->
<section class="section-fh bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card-fh p-0 overflow-hidden reveal">
                    <div class="row g-0">
                        <div class="col-lg-5 p-4 p-md-5 bg-primary text-white d-flex flex-column justify-content-center">
                            <span class="badge bg-white bg-opacity-20 text-white mb-3 align-self-start py-2 px-3">
                                <i class="fas fa-handshake me-1"></i> Jalin Kerjasama
                            </span>
                            <h2 class="fw-bold mb-4" style="font-size: 2rem;">Tertarik Menjadi Mitra Kami?</h2>
                            <p class="mb-4 opacity-75">Kami selalu terbuka untuk peluang kerjasama baru yang saling menguntungkan. Silakan isi data perusahaan Anda.</p>
                            
                            <div class="d-flex align-items-center gap-3 mb-4">
                                <div class="bg-white bg-opacity-10 p-3 rounded-3">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold">Proses Cepat</h6>
                                    <small class="opacity-75">Tim kami akan merespons dalam 24 jam.</small>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center gap-3">
                                <div class="bg-white bg-opacity-10 p-3 rounded-3">
                                    <i class="fas fa-shield-alt text-white"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0 fw-bold">Data Terjamin</h6>
                                    <small class="opacity-75">Kerahasiaan data perusahaan Anda adalah prioritas kami.</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-7 p-4 p-md-5 bg-white">
                            <?php if(session()->getFlashdata('success_partnership')): ?>
                                <div class="alert alert-success border-0 rounded-4 p-4 mb-4" style="background:#dcfce7; color:#15803d;">
                                    <div class="d-flex gap-3">
                                        <i class="fas fa-check-circle fs-4 mt-1"></i>
                                        <div>
                                            <h6 class="fw-bold mb-1">Pengajuan Berhasil Terkirim!</h6>
                                            <p class="small mb-0">Terima kasih atas minat Anda untuk bekerjasama. Tim kami akan segera menghubungi Anda melalui email atau nomor telepon yang diberikan.</p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url('partnership/submit') ?>" method="POST" id="partnershipForm">
                                <?= csrf_field() ?>
                                <div class="row g-3">
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold small text-muted text-uppercase">Nama Mitra / Perusahaan</label>
                                        <input type="text" name="company_name" class="form-control bg-light border-0 py-3 px-4" placeholder="Contoh: PT. Sehat Sentosa" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small text-muted text-uppercase">Email Bisnis</label>
                                        <input type="email" name="email" class="form-control bg-light border-0 py-3 px-4" placeholder="email@perusahaan.com" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label fw-bold small text-muted text-uppercase">Nomor Telepon / WA</label>
                                        <input type="tel" name="phone" class="form-control bg-light border-0 py-3 px-4" placeholder="0812xxxxxx" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label fw-bold small text-muted text-uppercase">Pesan Kerjasama</label>
                                        <textarea name="message" class="form-control bg-light border-0 py-3 px-4" rows="4" placeholder="Jelaskan secara singkat rencana atau bentuk kerjasama yang Anda tawarkan..." required></textarea>
                                    </div>
                                    <div class="col-md-12 pt-2">
                                        <button type="submit" class="btn btn-primary w-100 py-3 fw-bold rounded-3 shadow-primary">
                                            Kirim Penawaran Kerjasama <i class="fas fa-paper-plane ms-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================
     CTA BANNER
     ============================================================ -->
<section class="section-fh-sm reveal" style="padding-top:0;">
    <div class="container">
        <div class="contact-cta-banner">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <h3 style="color:#fff; font-size:1.5rem; margin-bottom:8px;">Lebih Mudah via WhatsApp</h3>
                    <p style="color:rgba(255,255,255,0.8); margin:0;">Chat langsung dengan admin kami untuk mendapatkan informasi stok, harga, dan konsultasi produk secara gratis.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="https://wa.me/<?= $settings['wa_number'] ?? '' ?>"
                       target="_blank"
                       class="cta-wa-btn">
                        <i class="fab fa-whatsapp fa-lg"></i>
                        <div>
                            <div style="font-size:0.75rem; opacity:0.85;">Balas dalam 15 menit</div>
                            <div style="font-weight:700;">Chat Sekarang</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->include('frontend/layout/_mitra') ?>

<style>
/* ---- Breadcrumb (reuse) ---- */
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

/* ---- Contact Cards ---- */
.contact-cards { display: flex; flex-direction: column; gap: 14px; }
.contact-card {
    display: flex;
    align-items: center;
    gap: 16px;
    background: #fff;
    border: 1px solid var(--fh-border);
    border-radius: var(--fh-radius-md);
    padding: 18px 20px;
    transition: all var(--fh-transition);
    box-shadow: var(--fh-shadow-sm);
}
.contact-card:hover {
    border-color: var(--fh-blue-200);
    box-shadow: var(--fh-shadow-md);
    transform: translateX(4px);
}
.contact-card-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    flex-shrink: 0;
}
.contact-card-body { flex: 1; }
.contact-card-body h6 {
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: var(--fh-text-muted);
    margin-bottom: 4px;
}
.contact-card-body p {
    font-size: 0.92rem;
    color: var(--fh-text);
    margin: 0;
    font-weight: 500;
}
.contact-link {
    font-size: 0.92rem;
    color: var(--fh-primary);
    text-decoration: none;
    font-weight: 600;
    transition: color var(--fh-transition);
}
.contact-link:hover { color: var(--fh-primary-dark); }
.contact-link-wa {
    font-size: 0.95rem;
    color: #16A34A;
    text-decoration: none;
    font-weight: 700;
    transition: color var(--fh-transition);
}
.contact-link-wa:hover { color: #15803D; }

/* ---- Social Pills ---- */
.social-row { display: flex; flex-wrap: wrap; gap: 10px; }
.social-pill {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: var(--fh-blue-50);
    color: var(--fh-primary);
    border: 1.5px solid var(--fh-blue-200);
    border-radius: 50px;
    padding: 8px 16px;
    font-size: 0.85rem;
    font-weight: 600;
    text-decoration: none;
    transition: all var(--fh-transition);
}
.social-pill:hover { background: var(--fh-primary); color: #fff; border-color: var(--fh-primary); transform: translateY(-2px); }
.social-pill.wa { background: #F0FDF4; color: #16A34A; border-color: #BBF7D0; }
.social-pill.wa:hover { background: #25D366; color: #fff; border-color: #25D366; }

/* ---- Map ---- */
.map-wrap { border-radius: var(--fh-radius-lg); }
.map-header {
    display: flex;
    align-items: center;
    padding: 14px 20px;
    background: var(--fh-off-white);
    border-bottom: 1px solid var(--fh-border);
    font-size: 0.88rem;
    font-weight: 700;
    color: var(--fh-text);
}
.map-container { height: 420px; }
.map-container iframe { width: 100%; height: 100%; }
.map-footer {
    display: flex;
    align-items: center;
    padding: 12px 20px;
    border-top: 1px solid var(--fh-border);
    background: var(--fh-off-white);
    font-size: 0.85rem;
}
@media (max-width: 767.98px) {
    .map-container { height: 300px; }
}

/* ---- Contact CTA Banner ---- */
.contact-cta-banner {
    background: var(--fh-gradient-hero);
    border-radius: var(--fh-radius-xl);
    padding: 44px 52px;
    position: relative;
    overflow: hidden;
}
.cta-wa-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: #25D366;
    color: #fff;
    text-decoration: none;
    border-radius: var(--fh-radius-pill);
    padding: 14px 28px;
    font-size: 0.9rem;
    font-weight: 600;
    box-shadow: 0 6px 24px rgba(37,211,102,0.4);
    transition: all var(--fh-transition);
}
.cta-wa-btn:hover { background: #1ebe5d; transform: translateY(-3px); color: #fff; }
@media (max-width: 767.98px) {
    .contact-cta-banner { padding: 32px 24px; text-align: center; }
}
</style>

<?= $this->endSection() ?>