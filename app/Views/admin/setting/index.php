<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="row">
    <div class="col-md-7">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white fw-bold">Konten Website</div>
            <div class="card-body">
                <form action="<?= base_url('admin/settings/update-text') ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label class="form-label">Judul Utama (Hero Title)</label>
                        <input type="text" name="hero_title" class="form-control" value="<?= esc($settings['hero_title'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor WhatsApp (Gunakan Kode Negara, misal: 62812...)</label>
                        <input type="text" name="wa_number" class="form-control" value="<?= esc($settings['wa_number'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tentang Toko (Halaman Home)</label>
                        <textarea name="about_text" class="form-control" rows="4"><?= esc($settings['about_text'] ?? '') ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary px-4">Simpan Perubahan Teks</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card border-0 shadow-sm border-top border-primary border-4">
            <div class="card-header bg-white fw-bold">Video Background Hero</div>
            <div class="card-body">
            <?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i> <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i> <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
                <?php if(!empty($settings['hero_video'])): ?>
                    <video width="100%" class="rounded mb-3" controls>
                        <source src="<?= base_url('uploads/media/' . $settings['hero_video']) ?>" type="video/mp4">
                    </video>
                <?php endif; ?>
                
                <form action="<?= base_url('admin/settings/update-video') ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-3">
                        <label class="form-label small text-muted">Upload file MP4 baru (Disarankan durasi singkat & tanpa suara)</label>
                        <input type="file" name="hero_video" class="form-control" accept="video/mp4" required>
                    </div>
                    <button type="submit" class="btn btn-outline-primary w-100">Ganti Video</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.querySelector('input[name="hero_video"]').addEventListener('change', function() {
    const file = this.files[0];
    const maxSize = 40 * 1024 * 1024; // 40MB

    if (file.size > maxSize) {
        alert("File terlalu besar! Maksimal 40MB. File Anda: " + (file.size / (1024 * 1024)).toFixed(2) + "MB");
        this.value = ""; // Reset input file
    }
});
</script>
<?= $this->endSection() ?>