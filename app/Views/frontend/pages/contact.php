<?= $this->extend('frontend/layout/template') ?>
<?= $this->section('content') ?>

<div class="bg-primary py-5 mt-5 text-white">
    <div class="container py-5 text-center">
        <h1 class="fw-bold display-4">Hubungi Kami</h1>
        <p class="opacity-75">Kami siap membantu kebutuhan medis Anda 24/7.</p>
    </div>
</div>

<section class="py-5">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-5">
                <h3 class="fw-bold mb-4">Informasi Kontak</h3>
                <div class="d-flex mb-4">
                    <div class="bg-light text-primary p-3 rounded-4 me-3">
                        <i class="fas fa-map-marker-alt fa-lg"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Alamat Kantor</h6>
                        <p class="text-muted">Jl. Kesehatan Raya No. 123, Incheon, South Korea.</p>
                    </div>
                </div>
                <div class="d-flex mb-4">
                    <div class="bg-light text-primary p-3 rounded-4 me-3">
                        <i class="fab fa-whatsapp fa-lg"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">WhatsApp Admin</h6>
                        <p class="text-muted">+<?= $settings['wa_number'] ?? '628123456789' ?></p>
                    </div>
                </div>
                <div class="d-flex mb-4">
                    <div class="bg-light text-primary p-3 rounded-4 me-3">
                        <i class="fas fa-envelope fa-lg"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Email Resmi</h6>
                        <p class="text-muted">info@fulkihasya.com</p>
                    </div>
                </div>
                
                <h5 class="fw-bold mb-3 mt-5">Ikuti Kami</h5>
                <div class="d-flex gap-2">
                    <a href="#" class="btn btn-outline-primary rounded-circle p-2" style="width: 45px; height: 45px;"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn btn-outline-primary rounded-circle p-2" style="width: 45px; height: 45px;"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-outline-primary rounded-circle p-2" style="width: 45px; height: 45px;"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="rounded-4 overflow-hidden shadow-sm border h-100" style="min-height: 400px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.3307977257987!2d109.26932269999999!3d-7.428597199999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655f4be46ceeff%3A0x9e4da5ea761b5a56!2sToko%20Alkes%20Fulki%20Hasya!5e0!3m2!1sid!2sid!4v1776677285691!5m2!1sid!2sid" width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->include('frontend/layout/_mitra') ?>
<?= $this->endSection() ?>