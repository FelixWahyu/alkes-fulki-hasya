<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Panel - Fulki Hasya' ?></title>

    <!-- Favicon -->
    <?php
        $db = \Config\Database::connect();
        $logoSetting = $db->table('settings')->where('key', 'web_logo')->get()->getRowArray();
        $favIcon = (!empty($logoSetting) && !empty($logoSetting['value'])) 
                   ? base_url('uploads/media/' . $logoSetting['value']) 
                   : base_url('favicon.ico');
    ?>
    <link rel="icon" type="image/x-icon" href="<?= $favIcon ?>">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url('css/admin-custom.css') ?>">
    
</head>
<body>

    <div id="main-wrapper">
        
        <?= $this->include('admin/layout/sidebar') ?>

        <div id="main-content">
            
            <?= $this->include('admin/layout/header') ?>

            <div class="content-area px-3 px-md-4 pb-4">
                <?= $this->renderSection('content') ?>
            </div>

            <?= $this->include('admin/layout/footer') ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Sidebar Toggler for Mobile
        const sidebar = document.getElementById('sidebar');
        
        function toggleSidebar() {
            if (window.innerWidth < 992) {
                sidebar.classList.toggle('show');
            } else {
                sidebar.classList.toggle('collapsed');
            }
        }

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            if (!sidebar) return;
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isClickOnToggle = event.target.closest('.sidebar-toggle');
            
            if (!isClickInsideSidebar && !isClickOnToggle && sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
            }
        });

        // Global Logout Confirmation
        document.querySelectorAll('.logout-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('href');
                
                Swal.fire({
                    title: 'Keluar dari Sistem?',
                    text: "Sesi Anda akan berakhir dan Anda harus login kembali.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#1e40af',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'Ya, Keluar',
                    cancelButtonText: 'Batal',
                    reverseButtons: true,
                    borderRadius: '15px'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                });
            });
        });
    </script>
</body>
</html>