<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="row align-items-center mb-4">
    <div class="col-sm-6">
        <h3 class="fw-bold mb-1">Pengaturan Web</h3>
        <p class="text-muted small mb-0">Konfigurasi konten utama dan media di halaman depan.</p>
    </div>
</div>

<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger border-0 shadow-sm alert-dismissible fade show mb-4" role="alert">
        <div class="d-flex align-items-center">
            <i class="fas fa-exclamation-circle me-3 fa-lg"></i>
            <div>
                <strong>Kesalahan!</strong> <?= session()->getFlashdata('error') ?>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success border-0 shadow-sm alert-dismissible fade show mb-4" role="alert">
        <div class="d-flex align-items-center">
            <i class="fas fa-check-circle me-3 fa-lg"></i>
            <div>
                <strong>Berhasil!</strong> <?= session()->getFlashdata('success') ?>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="row g-4">
    <div class="col-lg-7">
        <div class="card h-100">
            <div class="card-header bg-transparent py-3 px-4 border-bottom border-light">
                <h5 class="fw-bold mb-0"><i class="fas fa-file-alt me-2 text-primary"></i> Konten Teks</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url('admin/settings/update-text') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.05em;">Nama Bisnis</label>
                        <input type="text" name="business_name" class="form-control form-control-lg border-light bg-light focus-ring" value="<?= esc($settings['business_name'] ?? '') ?>" placeholder="Misal: Fulki Hasya">
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.05em;">Judul Utama (Hero Title)</label>
                        <input type="text" name="hero_title" class="form-control form-control-lg border-light bg-light focus-ring" value="<?= esc($settings['hero_title'] ?? '') ?>" placeholder="Misal: Solusi Alat Kesehatan Terpercaya">
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.05em;">Nomor WhatsApp</label>
                        <div class="input-group">
                            <span class="input-group-text border-light bg-light text-muted fw-bold">+</span>
                            <input type="text" name="wa_number" class="form-control form-control-lg border-light bg-light focus-ring" value="<?= esc($settings['wa_number'] ?? '') ?>" placeholder="628123456789">
                        </div>
                        <small class="text-muted mt-1 d-block font-italic">Gunakan format angka saja tanpa spasi/simbol (misal: 628123...)</small>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.05em;">Tentang Toko (Halaman Home & Profil)</label>
                        <textarea name="about_text" class="form-control border-light bg-light focus-ring" rows="6" placeholder="Tuliskan deskripsi singkat toko Anda di sini..."><?= esc($settings['about_text'] ?? '') ?></textarea>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.05em;">Email Website</label>
                            <input type="email" name="web_email" class="form-control border-light bg-light focus-ring" value="<?= esc($settings['web_email'] ?? '') ?>" placeholder="info@tokoanda.com">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.05em;">Link YouTube (Embed/Full URL)</label>
                            <input type="text" name="youtube_link" class="form-control border-light bg-light focus-ring" value="<?= esc($settings['youtube_link'] ?? '') ?>" placeholder="https://www.youtube.com/watch?v=...">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.05em;">Alamat Lengkap</label>
                        <textarea name="web_address" class="form-control border-light bg-light focus-ring" rows="3" placeholder="Alamat lengkap toko Anda..."><?= esc($settings['web_address'] ?? '') ?></textarea>
                    </div>
                    
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-5 rounded-pill shadow-sm py-2 fw-bold">
                            <i class="fas fa-save me-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-5">
        <div class="card h-100 border-top border-primary border-4">
            <div class="card-header bg-transparent py-3 px-4 border-bottom border-light">
                <h5 class="fw-bold mb-0"><i class="fas fa-video me-2 text-primary"></i> Hero Media</h5>
            </div>
            <div class="card-body p-4">
                <div class="mb-4">
                    <label class="form-label small fw-bold text-muted text-uppercase d-block mb-3" style="letter-spacing: 0.05em;">Preview Video Saat Ini</label>
                    <?php if(!empty($settings['hero_video'])): ?>
                        <div class="position-relative ratio ratio-16x9 rounded overflow-hidden shadow-sm border border-light bg-dark">
                            <video class="object-fit-cover" controls>
                                <source src="<?= base_url('uploads/media/' . $settings['hero_video']) ?>" type="video/mp4">
                            </video>
                        </div>
                    <?php else: ?>
                        <div class="ratio ratio-16x9 rounded border border-dashed border-2 border-light d-flex align-items-center justify-content-center text-muted">
                            <div class="text-center">
                                <i class="fas fa-video-slash fa-2x mb-2 opacity-25"></i>
                                <span class="d-block small">Belum ada video</span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                
                <form action="<?= base_url('admin/settings/update-video') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-4 pt-3 border-top">
                        <label class="form-label small fw-bold text-muted text-uppercase" style="letter-spacing: 0.05em;">Ganti Video Background</label>
                        <div class="bg-light p-3 rounded-3 mb-3 border border-dashed text-center">
                            <input type="file" name="hero_video" class="form-control d-none" id="heroVideoInput" accept="video/mp4" required>
                            <label for="heroVideoInput" class="mb-0 cursor-pointer w-100 py-3">
                                <i class="fas fa-cloud-upload-alt fa-2x text-primary mb-2"></i>
                                <span class="d-block fw-bold text-dark" id="fileName">Pilih File MP4</span>
                                <span class="d-block small text-muted">Maksimal 40MB</span>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-outline-primary w-100 rounded-pill py-2 fw-bold">
                            <i class="fas fa-sync-alt me-2"></i> Upload Video Baru
                        </button>
                    </div>
                </form>

                <!-- Logo Website Upload -->
                <form action="<?= base_url('admin/settings/update-logo') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-4 pt-4 border-top">
                        <label class="form-label small fw-bold text-muted text-uppercase d-block mb-3" style="letter-spacing: 0.05em;">Logo Website</label>
                        <div class="d-flex align-items-center gap-3 mb-3">
                            <div class="bg-light p-2 rounded border" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center;">
                                <?php if(!empty($settings['web_logo'])): ?>
                                    <img src="<?= base_url('uploads/media/' . $settings['web_logo']) ?>" class="img-fluid" style="max-height: 100%;">
                                <?php else: ?>
                                    <i class="fas fa-image text-muted opacity-25 fa-2x"></i>
                                <?php endif; ?>
                            </div>
                            <div class="flex-grow-1">
                                <input type="file" name="web_logo" class="form-control form-control-sm border-light bg-light" id="webLogoInput" accept="image/*" required>
                                <small class="text-muted d-block mt-1">PNG, JPG, SVG (Maks. 2MB)</small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary w-100 rounded-pill py-2 fw-bold">
                            <i class="fas fa-upload me-2"></i> Update Logo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('heroVideoInput').addEventListener('change', function() {
    const file = this.files[0];
    const fileNameDisplay = document.getElementById('fileName');
    const maxSize = 40 * 1024 * 1024; // 40MB

    if (file) {
        if (file.size > maxSize) {
            alert("File terlalu besar! Maksimal 40MB. File Anda: " + (file.size / (1024 * 1024)).toFixed(2) + "MB");
            this.value = ""; // Reset
            fileNameDisplay.textContent = "Pilih File MP4";
        } else {
            fileNameDisplay.textContent = file.name;
        }
    }
});

document.getElementById('webLogoInput').addEventListener('change', function() {
    const file = this.files[0];
    const maxSize = 2 * 1024 * 1024; // 2MB

    if (file && file.size > maxSize) {
        alert("File terlalu besar! Maksimal 2MB.");
        this.value = ""; // Reset
    }
});
</script>

<style>
.cursor-pointer {
    cursor: pointer;
}
.focus-ring:focus {
    box-shadow: 0 0 0 4px rgba(44, 123, 229, 0.15);
    background-color: #fff !important;
    border-color: var(--primary-color) !important;
}
</style>

<?= $this->endSection() ?>