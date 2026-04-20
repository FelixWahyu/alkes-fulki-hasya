<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin Panel - Fulki Hasya' ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Inter', 'Poppins', sans-serif;
            overflow-x: hidden;
        }
        
        /* Styling Sidebar */
        #sidebar {
            min-height: 100vh;
            background-color: #2C7BE5; 
            width: 260px;
            transition: all 0.3s;
        }
        
        #sidebar .sidebar-brand {
            padding: 20px;
            font-size: 1.25rem;
            font-weight: 800;
            color: #fff;
            text-align: center;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 10px;
        }

        #sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            margin: 4px 15px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s;
        }

        #sidebar .nav-link:hover, #sidebar .nav-link.active {
            color: #2C7BE5;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        #sidebar .nav-link i {
            width: 25px;
        }

        /* Layouting agar Footer selalu di bawah */
        #main-wrapper {
            display: flex;
            min-height: 100vh;
        }

        #main-content {
            flex: 1;
            display: flex;
            flex-direction: column; /* Penting untuk mendorong footer ke bawah */
            min-width: 0; 
        }
        
        .content-area {
            flex: 1; /* Area konten utama meluas memenuhi ruang sisa */
        }
    </style>
</head>
<body>

    <div id="main-wrapper">
        
        <?= $this->include('admin/layout/sidebar') ?>

        <div id="main-content">
            
            <?= $this->include('admin/layout/header') ?>

            <div class="content-area px-4 pb-4">
                <?= $this->renderSection('content') ?>
            </div>

            <?= $this->include('admin/layout/footer') ?>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>