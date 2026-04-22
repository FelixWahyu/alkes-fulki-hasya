<?= $this->extend('admin/layout/template') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-xl-5">
            <div class="card border-0 shadow-sm animate-fade-in" style="border-radius: 1rem; overflow: hidden;">
                <div class="card-header bg-white border-0 pt-4 px-4 pb-0">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                            <i class="fas fa-key text-primary fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-0">Keamanan Akun</h5>
                            <p class="text-muted small mb-0">Ubah password administrator secara berkala</p>
                        </div>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <?php if(session()->getFlashdata('error')): ?>
                        <div class="alert alert-danger d-flex align-items-center gap-2 py-2 px-3 mb-4 rounded-3 border-0 small" role="alert" style="background-color:#fee2e2; color:#b91c1c;">
                            <i class="fas fa-exclamation-circle"></i>
                            <div><?= session()->getFlashdata('error') ?></div>
                        </div>
                    <?php endif; ?>

                    <?php if(session()->getFlashdata('success')): ?>
                        <div class="alert alert-success d-flex align-items-center gap-2 py-2 px-3 mb-4 rounded-3 border-0 small" role="alert" style="background-color:#dcfce7; color:#15803d;">
                            <i class="fas fa-check-circle"></i>
                            <div><?= session()->getFlashdata('success') ?></div>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('admin/update-password') ?>" method="POST" id="passwordForm">
                        <?= csrf_field() ?>
                        
                        <!-- Password Saat Ini -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark small text-uppercase" style="letter-spacing: 0.05em;">Password Saat Ini</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 px-3"><i class="fas fa-lock-open text-muted small"></i></span>
                                <input type="password" name="current_password" id="current_password" 
                                       class="form-control bg-light border-start-0 ps-0" 
                                       placeholder="Masukkan password lama" required>
                                <span class="input-group-text bg-light border-start-0 cursor-pointer password-toggle" data-target="current_password">
                                    <i class="fas fa-eye text-muted small"></i>
                                </span>
                            </div>
                            <div id="currentFeedback" class="validation-message"></div>
                        </div>

                        <hr class="my-4 opacity-10">

                        <!-- Password Baru -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark small text-uppercase" style="letter-spacing: 0.05em;">Password Baru</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 px-3"><i class="fas fa-shield-alt text-muted small"></i></span>
                                <input type="password" name="new_password" id="new_password" 
                                       class="form-control bg-light border-start-0 ps-0" 
                                       placeholder="Minimal 6 karakter" required>
                                <span class="input-group-text bg-light border-start-0 cursor-pointer password-toggle" data-target="new_password">
                                    <i class="fas fa-eye text-muted small"></i>
                                </span>
                            </div>
                            <div id="newFeedback" class="validation-message"></div>
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark small text-uppercase" style="letter-spacing: 0.05em;">Konfirmasi Password Baru</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 px-3"><i class="fas fa-check-double text-muted small"></i></span>
                                <input type="password" name="confirm_password" id="confirm_password" 
                                       class="form-control bg-light border-start-0 ps-0" 
                                       placeholder="Ulangi password baru" required>
                                <span class="input-group-text bg-light border-start-0 cursor-pointer password-toggle" data-target="confirm_password">
                                    <i class="fas fa-eye text-muted small"></i>
                                </span>
                            </div>
                            <div id="confirmFeedback" class="validation-message"></div>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="btn btn-primary w-100 py-2 fw-bold" id="submitBtn">
                                <i class="fas fa-save me-2"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .cursor-pointer { cursor: pointer; }
    .validation-message { font-size: 0.75rem; margin-top: 0.25rem; min-height: 1rem; transition: all 0.2s; }
    .invalid-feedback-custom { color: #ef4444; }
    .is-invalid { border-color: #ef4444 !important; }
    .is-valid { border-color: #22c55e !important; }
    .input-group-text { color: #64748b; }
    .password-toggle:hover i { color: #1e40af !important; }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in { animation: fadeIn 0.4s ease-out forwards; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('passwordForm');
    const currentPass = document.getElementById('current_password');
    const newPass = document.getElementById('new_password');
    const confirmPass = document.getElementById('confirm_password');
    const submitBtn = document.getElementById('submitBtn');

    // Toggle Password Visibility
    document.querySelectorAll('.password-toggle').forEach(toggle => {
        toggle.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const targetInput = document.getElementById(targetId);
            const icon = this.querySelector('i');
            
            if (targetInput.type === 'password') {
                targetInput.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                targetInput.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    });

    function updateUI(input, feedback, isValid, message) {
        if (input.value.length === 0) {
            input.classList.remove('is-invalid', 'is-valid');
            feedback.textContent = '';
            return;
        }
        if (isValid) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
            feedback.textContent = '';
        } else {
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
            feedback.textContent = message;
            feedback.classList.add('invalid-feedback-custom');
        }
    }

    currentPass.addEventListener('input', function() {
        updateUI(this, document.getElementById('currentFeedback'), this.value.length > 0, 'Password saat ini wajib diisi');
    });

    newPass.addEventListener('input', function() {
        const isValid = this.value.length >= 6;
        updateUI(this, document.getElementById('newFeedback'), isValid, 'Password minimal 6 karakter');
        // Re-validate confirmation
        if (confirmPass.value.length > 0) confirmPass.dispatchEvent(new Event('input'));
    });

    confirmPass.addEventListener('input', function() {
        const isValid = this.value === newPass.value && this.value.length > 0;
        updateUI(this, document.getElementById('confirmFeedback'), isValid, 'Password konfirmasi tidak cocok');
    });

    form.addEventListener('submit', function(e) {
        const isCurrentValid = currentPass.value.length > 0;
        const isNewValid = newPass.value.length >= 6;
        const isConfirmValid = confirmPass.value === newPass.value;

        if (!isCurrentValid || !isNewValid || !isConfirmValid) {
            e.preventDefault();
            currentPass.dispatchEvent(new Event('input'));
            newPass.dispatchEvent(new Event('input'));
            confirmPass.dispatchEvent(new Event('input'));
        } else {
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Menyimpan...';
            submitBtn.disabled = true;
        }
    });
});
</script>

<?= $this->endSection() ?>