<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liturgi - KGPM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .liturgi-card {
            transition: transform 0.3s;
        }
        .liturgi-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="<?php echo base_url('assets/logo/kgpm.jpeg'); ?>" alt="KGPM Logo" height="30" class="d-inline-block align-top me-2">
                KGPM YOGJAKARTA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('home'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo site_url('home/liturgi'); ?>">Liturgi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php if (isset($liturgi) && !empty($liturgi)): ?>
    <div class="container my-5">
        <h1 class="mb-4 text-center">Selamat Beribadah Di KGPM Yogyakarta</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($liturgi as $item): ?>
                <?php if (end($liturgi) == $item): ?>
                    <div class="col">
                        <div class="card h-100 liturgi-card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $item['liturgijudul']; ?></h5>
                                <p class="card-text">Tanggal: <?php echo date('d-m-Y', strtotime($item['liturgitgl'])); ?></p>
                                <a href="<?php echo base_url('assets/pdf/' . $item['liturgifile']); ?>" class="btn btn-primary" target="_blank">Lihat PDF</a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <?php else: ?>
        <div class="alert alert-info" role="alert">
            Tidak ada file liturgi yang tersedia saat ini.
        </div>
    <?php endif; ?>
    <footer class="bg-dark text-white text-center py-3">
        <p style="color: white; text-decoration: none;">@ 2024 KGPM YOGJAKARTA - Felix Daniel</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
