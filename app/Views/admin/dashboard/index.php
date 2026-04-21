<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="row g-4 mb-4">
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="card p-3 h-100">
            <div class="d-flex align-items-center">
                <div class="stat-icon bg-primary bg-opacity-10 text-primary me-3">
                    <i class="fas fa-box-open fa-lg"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1 small fw-bold text-uppercase" style="letter-spacing: 0.025em;">Total Produk</h6>
                    <h2 class="fw-bold mb-0"><?= number_format($total_products) ?></h2>
                </div>
            </div>
            <div class="mt-3 pt-3 border-top border-light">
                <a href="<?= base_url('admin/products') ?>" class="text-decoration-none small fw-medium">
                    Lihat Katalog <i class="fas fa-arrow-right ms-1" style="font-size: 0.7rem;"></i>
                </a>
            </div>
        </div>
    </div>
    
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="card p-3 h-100">
            <div class="d-flex align-items-center">
                <div class="stat-icon bg-success bg-opacity-10 text-success me-3">
                    <i class="fas fa-comments-dollar fa-lg"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-1 small fw-bold text-uppercase" style="letter-spacing: 0.025em;">Leads (WA Klik)</h6>
                    <h2 class="fw-bold mb-0"><?= number_format($total_leads) ?></h2>
                </div>
            </div>
            <div class="mt-3 pt-3 border-top border-light">
                <span class="text-success small fw-medium">
                    Terus bertumbuh!
                </span>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header bg-transparent py-3 px-4 border-bottom border-light d-flex align-items-center justify-content-between">
        <h5 class="fw-bold mb-0">Calon Pembeli Terbaru (Leads)</h5>
        <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill small">Real-time</span>
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th class="ps-4">Nama Customer</th>
                        <th>Kontak</th>
                        <th>Produk Diminati</th>
                        <th>Waktu</th>
                        <th class="pe-4 text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($recent_leads)): ?>
                    <tr>
                        <td colspan="5" class="text-center py-5 text-muted">Belum ada leads yang masuk.</td>
                    </tr>
                    <?php else: ?>
                        <?php foreach($recent_leads as $lead): ?>
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded-circle p-2 me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fas fa-user text-muted"></i>
                                    </div>
                                    <div>
                                        <span class="fw-bold d-block text-dark"><?= esc($lead['customer_name']) ?></span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="small">
                                    <span class="d-block mb-1"><i class="fas fa-envelope me-2 text-muted"></i><?= esc($lead['email']) ?></span>
                                    <span class="d-block"><i class="fab fa-whatsapp me-2 text-success fw-bold"></i><?= esc($lead['phone']) ?></span>
                                </div>
                            </td>
                            <td>
                                <span class="badge bg-light text-primary border border-primary-subtle px-2 py-1">
                                    <?= esc($lead['product_name']) ?>
                                </span>
                            </td>
                            <td>
                                <div class="small">
                                    <span class="d-block text-dark"><?= date('d M Y', strtotime($lead['created_at'])) ?></span>
                                    <span class="text-muted" style="font-size: 0.75rem;"><?= date('H:i', strtotime($lead['created_at'])) ?> WIB</span>
                                </div>
                            </td>
                            <td class="pe-4 text-end">
                                <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $lead['phone']) ?>" target="_blank" class="btn btn-sm btn-outline-success rounded-pill px-3">
                                    <i class="fab fa-whatsapp me-1"></i> Hubungi
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if (!empty($recent_leads)): ?>
    <div class="card-footer bg-transparent py-3 border-top border-light text-center">
        <a href="#" class="text-decoration-none small text-muted">Lihat Semua Riwayat Leads</a>
    </div>
    <?php endif; ?>
</div>

<style>
/* Local style for dashboard specific elements if needed */
.stat-icon {
    transition: transform 0.3s ease;
}
.card:hover .stat-icon {
    transform: scale(1.1);
}
</style>

<?= $this->endSection() ?>