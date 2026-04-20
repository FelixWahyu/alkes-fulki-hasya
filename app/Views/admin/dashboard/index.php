<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm p-3">
            <div class="d-flex align-items-center">
                <div class="bg-primary text-white rounded p-3 me-3">
                    <i class="fas fa-boxes fa-2x"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0">Total Produk</h6>
                    <h3 class="fw-bold mb-0"><?= $total_products ?></h3>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-0 shadow-sm p-3">
            <div class="d-flex align-items-center text-success">
                <div class="bg-success text-white rounded p-3 me-3">
                    <i class="fas fa-users fa-2x"></i>
                </div>
                <div>
                    <h6 class="text-muted mb-0">Leads (WA Klik)</h6>
                    <h3 class="fw-bold mb-0"><?= $total_leads ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-3">
    <div class="card-header bg-white py-3">
        <h5 class="fw-bold mb-0">Calon Pembeli Terbaru (Leads)</h5>
    </div>
    <div class="card-body p-0">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>Email / No HP</th>
                    <th>Produk Diminati</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($recent_leads as $lead): ?>
                <tr>
                    <td><strong><?= esc($lead['customer_name']) ?></strong></td>
                    <td class="small"><?= esc($lead['email']) ?><br><?= esc($lead['phone']) ?></td>
                    <td><span class="badge bg-light text-primary border border-primary"><?= esc($lead['product_name']) ?></span></td>
                    <td class="text-muted small"><?= date('d/m/Y H:i', strtotime($lead['created_at'])) ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>