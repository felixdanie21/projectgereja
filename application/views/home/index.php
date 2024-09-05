<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to KGPM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .jumbotron {
            background-image: url('https://source.unsplash.com/1600x900/?church');
            background-size: cover;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            border-radius: 0;
        }
        .card {
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        /* Custom styles for KGPM theme */
        .kgpm-color {
            color: #007bff; /* KGPM's primary color */
        }
        .kgpm-bg-color {
            background-color: #007bff; /* KGPM's primary color */
        }
        /* Custom styles for black text */
        .black-text {
            color: #000000; /* Black color for text */
            font-weight: bold; /* Bold font for emphasis */
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2); /* Text shadow for depth */
        }
        /* Custom styles for buttons */
        .btn-black {
            background-color: #000000; /* Black background for buttons */
            color: white; /* White text for buttons */
            border: none; /* No border for buttons */
            padding: 10px 20px; /* Padding for buttons */
            font-size: 16px; /* Font size for buttons */
            cursor: pointer; /* Cursor pointer for buttons */
        }
        .btn-black:hover {
            background-color: #1a1a1a; /* Darker black background for hover */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark kgpm-bg-color">
        <div class="container">
        <a class="navbar-brand kgpm-color" href="#">
            <img src="<?php echo base_url('assets/logo/kgpm.jpeg'); ?>" alt="KGPM Logo" height="30" class="d-inline-block align-top">
        </a>
        <a class="navbar-brand kgpm-color" href="#">KGPM MUSAFIR YOGJAKARTA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active kgpm-color" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link kgpm-color" href="<?php echo site_url('home/liturgi'); ?>">Liturgi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid py-5">
        <div class="container text-center">
            <h1 class="display-4 kgpm-color black-text">Selamat Datang Di KGPM Musafir Yogyakarta!</h1>
            <p class="lead kgpm-color black-text">Bergabunglah dengan kami dalam ibadah dan komunitas!</p>
            <a href="#" class="btn btn-black"onclick="this.innerHTML='Sedang Dalam Proses Pengembangan ';">Pelajari Lebih Lanjut</a>
        </div>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title kgpm-color black-text">Acara yang Akan Datang</h5>
                        <p class="card-text kgpm-color black-text">Tetap terupdate dengan acara dan kegiatan terbaru kami!</p>
                        <a href="#" class="btn btn-black" onclick="this.innerHTML='Sedang Dalam Proses Pengembangan ';">Lihat Acara</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title kgpm-color black-text">Bergabunglah dengan Kami!</h5>
                        <p class="card-text kgpm-color black-text">Temukan cara Anda dapat berkontribusi pada komunitas gereja kami!</p>
                        <a href="#" class="btn btn-black"onclick="this.innerHTML='Sedang Dalam Proses Pengembangan ';">Gabung Sekarang!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white text-center py-3">
        <a href="<?=base_url('Auth')?>" style="color: white; text-decoration: none;"><p>@ 2024 KGPM YOGJAKARTA - Felix Daniel</p></a>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
