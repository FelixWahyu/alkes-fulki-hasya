<?= $this->extend('frontend/layout/template') ?>
<?= $this->section('content') ?>

<div class="bg-primary py-5 mt-5 text-white">
    <div class="container py-5 text-center">
        <h1 class="fw-bold display-4">Tentang Kami</h1>
    </div>
</div>

<section class="py-5">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1576091160550-2173be9997a2?auto=format&fit=crop&q=80&w=800" class="img-fluid rounded-4 shadow" alt="Profil Fulki Hasya">
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4">Profil Perusahaan</h2>
                <p class="text-muted fs-5 lh-lg">
                    Toko Alat Kesehatan <strong>Fulki Hasya</strong> didirikan dengan komitmen untuk menjadi mitra terdepan dalam penyediaan peralatan medis berkualitas di Indonesia. Kami melayani kebutuhan rumah sakit, klinik, instansi kesehatan, hingga pemakaian pribadi di rumah.
                </p>
                <p class="text-muted lh-lg">
                    Sejak berdiri, kami terus berinovasi dalam menyediakan teknologi kesehatan terbaru dengan harga yang tetap kompetitif tanpa mengesampingkan standar keamanan medis internasional.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-4">
                    <div class="d-flex align-items-center mb-3 text-primary">
                        <i class="fas fa-bullseye fa-2x me-3"></i>
                        <h4 class="fw-bold mb-0">Visi Kami</h4>
                    </div>
                    <p class="text-muted">Menjadi penyedia alat kesehatan terlengkap, terpercaya, dan menjadi solusi utama bagi peningkatan kualitas hidup masyarakat Indonesia melalui teknologi medis unggul.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm p-4 rounded-4">
                    <div class="d-flex align-items-center mb-3 text-primary">
                        <i class="fas fa-rocket fa-2x me-3"></i>
                        <h4 class="fw-bold mb-0">Misi Kami</h4>
                    </div>
                    <ul class="text-muted ps-3">
                        <li>Menyediakan alat kesehatan yang tersertifikasi dan berkualitas tinggi.</li>
                        <li>Memberikan layanan konsultasi dan purna jual yang profesional.</li>
                        <li>Membangun kemitraan strategis dengan produsen medis terkemuka global.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <section class="py-5">
    <div class="container py-5 text-center">
        <h3 class="fw-bold mb-5">Mitra Strategis Kami</h3>
        <div class="row g-4 justify-content-center opacity-50">
            <div class="col-4 col-md-2"><i class="fab fa-apple fa-4x"></i><br>Brand A</div>
            <div class="col-4 col-md-2"><i class="fab fa-google fa-4x"></i><br>Brand B</div>
            <div class="col-4 col-md-2"><i class="fab fa-microsoft fa-4x"></i><br>Brand C</div>
            <div class="col-4 col-md-2"><i class="fab fa-amazon fa-4x"></i><br>Brand D</div>
            <div class="col-4 col-md-2"><i class="fab fa-salesforce fa-4x"></i><br>Brand E</div>
        </div>
    </div>
</section> -->
<?= $this->include('frontend/layout/_mitra') ?>
<?= $this->endSection() ?>