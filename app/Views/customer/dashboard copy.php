<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>instarent</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="<?= base_url('assets/logo/favicon.png') ?>" />

    <!-- Font Family -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/linearicons.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/flaticon.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/animate.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/owl.theme.default.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootsnav.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css') ?>">


    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>
    .navbar-header h3.navbar {
        font-family: 'Lobster', cursive;
        font-size: 40px;
        color: white;

        margin: 2rem 0rem;
        padding: 1.5rem;
    }

    .navbar-header .navbar-toggle {
        border: none;
        background: none;
        padding: 10px;
    }
</style>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!--welcome-hero start -->
    <section id="home" class="welcome-hero">

        <!-- top-area Start -->
        <div class="top-area">
            <div class="header-area">
                <!-- Start Navigation -->
                <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy" data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

                    <div class="container">

                        <!-- Start Header Navigation -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                                <i class="fa fa-bars"></i>
                            </button>
                            <h3 class="navbar">Instarent<span></span></h3>
                        </div><!--/.navbar-header-->

                        <!-- End Header Navigation -->

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
                            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                                <li class=" scroll active"><a href="#home">home</a></li>
                                <li class="scroll"><a href="#service">service</a></li>
                                <li class="scroll"><a href="#new-cars">new cars</a></li>
                                <li class="scroll"><a href="#featured-cars">list cars</a></li>
                                <li class="scroll"><a href="#brand">brands</a></li>
                                <li class="scroll"><a href="#contact">contact</a></li>
                            </ul><!--/.nav -->
                        </div><!-- /.navbar-collapse -->
                    </div><!--/.container-->
                </nav><!--/nav-->
                <!-- End Navigation -->
            </div><!--/.header-area-->
            <div class="clearfix"></div>

        </div><!-- /.top-area-->
        <!-- top-area End -->

        <div class="container">
            <div class="welcome-hero-txt">
                <h2>get your desired car in resonable price</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
                <button class="welcome-btn" onclick="window.location.href='#'">contact us</button>
            </div>
        </div>

        <!-- search bar start -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="model-search-content custom-margin">
                        <!-- Form Search -->
                        <form method="get" id="searchForm">
                            <div class="row">
                                <!-- Pilihan Jenis -->
                                <div class="col-md-offset-1 col-md-2 col-sm-12">
                                    <div class="single-model-search">
                                        <h2>Select Jenis</h2>
                                        <div class="model-select-icon">
                                            <select class="form-control" id="jenisSelect" name="jenis">
                                                <option value="">Pilih Jenis</option>
                                                <?php if (isset($jenisKendaraan) && !empty($jenisKendaraan)) : ?>
                                                    <?php foreach ($jenisKendaraan as $jenis) : ?>
                                                        <option value="<?= esc($jenis) ?>"><?= esc($jenis) ?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pilihan Nama -->
                                <div class="col-md-offset-1 col-md-2 col-sm-12">
                                    <div class="single-model-search">
                                        <h2>Select Nama</h2>
                                        <div class="model-select-icon">
                                            <select class="form-control" id="namaSelect" name="nama">
                                                <option value="">Pilih Kendaraan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pilihan Tahun -->
                                <div class="col-md-offset-1 col-md-2 col-sm-12">
                                    <div class="single-model-search">
                                        <h2>Select Year</h2>
                                        <div class="model-select-icon">
                                            <select class="form-control" id="tahunSelect" name="tahun">
                                                <option value="">Pilih Tahun</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Search -->
                                <div class="col-md-2 col-sm-12">
                                    <div class="single-model-search text-center">
                                        <button type="submit" class="welcome-btn model-search-btn" style="margin-top: 30px;">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <style>
                    .custom-margin {
                        margin-top: 100px;
                        align-items: center;
                    }
                </style>
            </div>
        </div>
        <!-- search bar end -->
    </section>
    <!--/.welcome-hero-->
    <!--welcome-hero end -->

    <!--service start -->
    <section id="service" class="service">
        <div class="container">
            <div class="service-content">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="single-service-item">
                            <div class="single-service-icon">
                                <i class="flaticon-car"></i>
                            </div>
                            <h2><a href="#">largest dealership <span> of</span> car</a></h2>
                            <p>
                                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut den fugit sed quia.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="single-service-item">
                            <div class="single-service-icon">
                                <i class="flaticon-car-repair"></i>
                            </div>
                            <h2><a href="#">unlimited repair warrenty</a></h2>
                            <p>
                                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut den fugit sed quia.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="single-service-item">
                            <div class="single-service-icon">
                                <i class="flaticon-car-1"></i>
                            </div>
                            <h2><a href="#">insurence support</a></h2>
                            <p>
                                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut den fugit sed quia.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->

    </section><!--/.service-->
    <!--service end-->

    <!--new-cars start -->
    <section id="new-cars" class="new-cars">
        <div class="container">
            <div class="section-header">
                <p>checkout <span>the 3</span> popular cars</p>
                <h2>Top 3 cars</h2>
            </div><!--/.section-header-->
            <div class="new-cars-content">
                <div class="owl-carousel owl-theme" id="new-cars-carousel">
                    <div class="new-cars-item">
                        <div class="single-new-cars-item">
                            <div class="row">
                                <div class="col-md-7 col-sm-12">
                                    <div class="new-cars-img">
                                        <img src="<?= base_url('assets/images/new-cars-model/ncm1.png') ?>" alt="img" />
                                    </div><!--/.new-cars-img-->
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="new-cars-txt">
                                        <h2><a href="#">chevrolet camaro <span> za100</span></a></h2>
                                        <p>
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                        <p class="new-cars-para2">
                                            Sed ut pers unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
                                        </p>
                                        <button class="welcome-btn new-cars-btn" onclick="window.location.href='#'">
                                            view details
                                        </button>
                                    </div><!--/.new-cars-txt-->
                                </div><!--/.col-->
                            </div><!--/.row-->
                        </div><!--/.single-new-cars-item-->
                    </div><!--/.new-cars-item-->
                    <div class="new-cars-item">
                        <div class="single-new-cars-item">
                            <div class="row">
                                <div class="col-md-7 col-sm-12">
                                    <div class="new-cars-img">
                                        <img src="<?= base_url('assets/images/new-cars-model/ncm2.png') ?>" />
                                    </div><!--/.new-cars-img-->
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="new-cars-txt">
                                        <h2><a href="#">BMW series-3 wagon</a></h2>
                                        <p>
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                        <p class="new-cars-para2">
                                            Sed ut pers unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
                                        </p>
                                        <button class="welcome-btn new-cars-btn" onclick="window.location.href='#'">
                                            view details
                                        </button>
                                    </div><!--/.new-cars-txt-->
                                </div><!--/.col-->
                            </div><!--/.row-->
                        </div><!--/.single-new-cars-item-->
                    </div><!--/.new-cars-item-->
                    <div class="new-cars-item">
                        <div class="single-new-cars-item">
                            <div class="row">
                                <div class="col-md-7 col-sm-12">
                                    <div class="new-cars-img">
                                        <img src="<?= base_url('assets/images/new-cars-model/ncm3.png') ?>" alt="img" />
                                    </div><!--/.new-cars-img-->
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <div class="new-cars-txt">
                                        <h2><a href="#">ferrari 488 superfast</a></h2>
                                        <p>
                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                        <p class="new-cars-para2">
                                            Sed ut pers unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.
                                        </p>
                                        <button class="welcome-btn new-cars-btn" onclick="window.location.href='#'">
                                            view details
                                        </button>
                                    </div><!--/.new-cars-txt-->
                                </div><!--/.col-->
                            </div><!--/.row-->
                        </div><!--/.single-new-cars-item-->
                    </div><!--/.new-cars-item-->
                </div><!--/#new-cars-carousel-->
            </div><!--/.new-cars-content-->
        </div><!--/.container-->

    </section><!--/.new-cars-->
    <!--new-cars end -->

    <!--featured-cars start -->
    <section id="featured-cars" class="featured-cars">
        <div class="container">
            <div class="section-header">
                <p>checkout <span>the</span> vehicle</p>
                <h2>list vehicle</h2>
            </div><!--/.section-header-->
            <div class="featured-cars-content">
                <div class="row">
                    <?php foreach ($kendaraans as $kendaraan): ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="single-featured-cars">
                                <div class="featured-img-box">
                                    <div class="overlay"></div> <!-- Overlay Gelap -->
                                    <div class="featured-cars-img">
                                        <a href="#" data-toggle="modal" data-target="#modalKendaraan<?= $kendaraan['id_kendaraan'] ?>">
                                            <img src="<?= base_url('uploads/' . esc($kendaraan['gambar_kendaraan'])) ?>" alt="cars">
                                            <div class="view-detail">View Detail</div> <!-- Menambahkan div untuk View Detail -->
                                        </a>
                                    </div>
                                    <div class="featured-model-info">
                                        <p>
                                            model: <?= esc($kendaraan['tahun_kendaraan']) ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="featured-cars-txt">
                                    <h2><a href="#" data-toggle="modal" data-target="#modalKendaraan<?= $kendaraan['id_kendaraan'] ?>">
                                            <?= esc(ucwords($kendaraan['merk_kendaraan'] . ' ' . $kendaraan['nama_kendaraan'])) ?></a></h2>
                                    <h3>Rp. <?= number_format($kendaraan['harga_sewa_kendaraan'], 2) ?></h3>
                                    <p>
                                        Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="modalKendaraan<?= $kendaraan['id_kendaraan'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLabel<?= $kendaraan['id_kendaraan'] ?>" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel<?= $kendaraan['id_kendaraan'] ?>"><?= esc(ucwords($kendaraan['merk_kendaraan'] . ' ' . $kendaraan['nama_kendaraan'])) ?></h5>
                                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="<?= base_url('uploads/' . esc($kendaraan['gambar_kendaraan'])) ?>" class="img-fluid" alt="car">
                                        <p>Model: <?= esc($kendaraan['tahun_kendaraan']) ?></p>
                                        <p>Kode: <?= esc($kendaraan['kode_kendaraan']) ?></p>
                                        <p>Harga: Rp. <?= number_format($kendaraan['harga_sewa_kendaraan'], 2) ?></p>
                                        <p>Deskripsi: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec venenatis, erat vel placerat auctor, nisl lorem pretium sem, non vestibulum mi lectus id eros.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        <a href="<?= base_url('pelanggan/add_data_pelanggan/' . esc($kendaraan['id_kendaraan'])) ?>" class="btn btn-primary">Go to Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->

                    <?php endforeach; ?>
                </div>
            </div>
        </div><!--/.container-->
    </section>


    <style>
        /* Styling untuk section featured cars */
        #featured-cars {
            padding: 30px 0;
            background-color: #f9f9f9;
        }

        .section-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-header p {
            font-size: 18px;
            color: #888;
            font-weight: 300;
            margin-bottom: 5px;
        }

        .section-header p span {
            font-weight: 600;
            color: #333;
        }

        .section-header h2 {
            font-size: 32px;
            color: #333;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .featured-cars-content {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .single-featured-cars {
            margin-bottom: 50px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .single-featured-cars:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .featured-img-box {
            position: relative;
            overflow: hidden;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        /* Overlay Gelap */
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            /* Warna hitam dengan transparansi */
            opacity: 0;
            /* Sembunyikan overlay secara default */
            transition: opacity 0.3s ease;
            /* Transisi untuk efek hover */
        }

        /* Menampilkan overlay saat hover pada gambar */
        .featured-img-box:hover .overlay {
            opacity: 1;
            /* Tampilkan overlay saat hover */
        }

        .featured-cars-img img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }

        .featured-cars-img:hover img {
            transform: scale(1.1);
        }

        /* Styling untuk tombol View Detail */
        .view-detail {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background: #007bff;
            /* Warna latar belakang */
            color: #fff;
            /* Warna teks */
            padding: 10px 20px;
            /* Padding untuk tombol */
            border-radius: 10px;
            /* Sudut melengkung */
            font-size: 16px;
            /* Ukuran font */
            font-weight: bold;
            /* Ketebalan font */
            text-align: center;
            /* Pusatkan teks */
            text-decoration: none;
            /* Hilangkan garis bawah */
            opacity: 0;
            /* Sembunyikan tombol secara default */
            transition: all 0.3s ease;
            /* Transisi untuk efek hover */
        }

        /* Menampilkan tombol saat hover pada gambar */
        .featured-img-box:hover .view-detail {
            opacity: 1;
            /* Tampilkan tombol saat hover */
            transform: translateX(-50%) translateY(-5px);
            /* Sedikit geser ke atas */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            /* Tambah bayangan */
        }

        /* Efek hover pada tombol View Detail */
        .view-detail:hover {
            background: #0056b3;
            /* Ganti warna latar belakang saat hover */
            transform: translateX(-50%) translateY(-5px) scale(1.05);
            /* Efek skala saat hover */
        }

        .featured-model-info p {
            margin: 10px 0;
            font-size: 14px;
            color: #666;
        }

        .featured-cars-txt {
            padding: 15px;
            text-align: center;
        }

        .featured-cars-txt h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .featured-cars-txt h3 {
            font-size: 20px;
            color: #e74c3c;
            margin-bottom: 15px;
        }

        .featured-cars-txt p {
            font-size: 14px;
            color: #777;
        }

        /* Styling untuk modal */
        .modal-header {
            border-bottom: none;
            background-color: #f8f9fa;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 600;
            color: #333;
        }

        .modal-body {
            text-align: center;
            padding: 20px;
        }

        .modal-body img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .modal-body p {
            font-size: 16px;
            color: #555;
            margin-bottom: 10px;
        }

        .modal-footer {
            border-top: none;
            padding: 15px;
        }

        .modal-footer .btn {
            padding: 10px 20px;
            border-radius: 5px;
        }

        .modal-footer .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .modal-footer .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .modal-footer .btn-secondary:hover {
            background-color: #565e64;
            border-color: #4e555b;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .section-header h2 {
                font-size: 28px;
            }

            .single-featured-cars {
                margin-bottom: 20px;
            }

            .modal-body img {
                max-width: 90%;
            }
        }
    </style>
    <!--/.featured-cars-->
    <!--featured-cars end -->

    <!-- clients-say strat -->
    <section id="clients-say" class="clients-say">
        <div class="container">
            <div class="section-header">
                <h2>what our clients say</h2>
            </div><!--/.section-header-->
            <div class="row">
                <div class="owl-carousel testimonial-carousel">
                    <div class="col-sm-3 col-xs-12">
                        <div class="single-testimonial-box">
                            <div class="testimonial-description">
                                <div class="testimonial-info">
                                    <div class="testimonial-img">
                                        <img src="<?= base_url('assets/images/clients/c1.png') ?>" alt="image of clients person" />
                                    </div><!--/.testimonial-img-->
                                </div><!--/.testimonial-info-->
                                <div class="testimonial-comment">
                                    <p>
                                        Sed ut pers unde omnis iste natus error sit voluptatem accusantium dolor laudan rem aperiam, eaque ipsa quae ab illo inventore verit.
                                    </p>
                                </div><!--/.testimonial-comment-->
                                <div class="testimonial-person">
                                    <h2><a href="#">tomas lili</a></h2>
                                    <h4>new york</h4>
                                </div><!--/.testimonial-person-->
                            </div><!--/.testimonial-description-->
                        </div><!--/.single-testimonial-box-->
                    </div><!--/.col-->
                    <div class="col-sm-3 col-xs-12">
                        <div class="single-testimonial-box">
                            <div class="testimonial-description">
                                <div class="testimonial-info">
                                    <div class="testimonial-img">
                                        <img src="<?= base_url('assets/images/clients/c2.png') ?>" alt="image of clients person" />
                                    </div><!--/.testimonial-img-->
                                </div><!--/.testimonial-info-->
                                <div class="testimonial-comment">
                                    <p>
                                        Sed ut pers unde omnis iste natus error sit voluptatem accusantium dolor laudan rem aperiam, eaque ipsa quae ab illo inventore verit.
                                    </p>
                                </div><!--/.testimonial-comment-->
                                <div class="testimonial-person">
                                    <h2><a href="#">romi rain</a></h2>
                                    <h4>london</h4>
                                </div><!--/.testimonial-person-->
                            </div><!--/.testimonial-description-->
                        </div><!--/.single-testimonial-box-->
                    </div><!--/.col-->
                    <div class="col-sm-3 col-xs-12">
                        <div class="single-testimonial-box">
                            <div class="testimonial-description">
                                <div class="testimonial-info">
                                    <div class="testimonial-img">
                                        <img src="<?= base_url('assets/images/clients/c3.png') ?>" alt="image of clients person" />
                                    </div><!--/.testimonial-img-->
                                </div><!--/.testimonial-info-->
                                <div class="testimonial-comment">
                                    <p>
                                        Sed ut pers unde omnis iste natus error sit voluptatem accusantium dolor laudan rem aperiam, eaque ipsa quae ab illo inventore verit.
                                    </p>
                                </div><!--/.testimonial-comment-->
                                <div class="testimonial-person">
                                    <h2><a href="#">john doe</a></h2>
                                    <h4>washington</h4>
                                </div><!--/.testimonial-person-->
                            </div><!--/.testimonial-description-->
                        </div><!--/.single-testimonial-box-->
                    </div><!--/.col-->
                </div><!--/.testimonial-carousel-->
            </div><!--/.row-->
        </div><!--/.container-->

    </section><!--/.clients-say-->
    <!-- clients-say end -->

    <!--brand strat -->
    <section id="brand" class="brand">
        <div class="container">
            <div class="brand-area">
                <div class="owl-carousel owl-theme brand-item">
                    <div class="item">
                        <a href="#">
                            <img src="<?= base_url('assets/images/brand/br1.png') ?>" alt="brand-image" />
                        </a>
                    </div><!--/.item-->
                    <div class="item">
                        <a href="#">
                            <img src="<?= base_url('assets/images/brand/br2.png') ?>" alt="brand-image" />
                        </a>
                    </div><!--/.item-->
                    <div class="item">
                        <a href="#">
                            <img src="<?= base_url('assets/images/brand/br3.png') ?>" alt="brand-image" />
                        </a>
                    </div><!--/.item-->
                    <div class="item">
                        <a href="#">
                            <img src="<?= base_url('assets/images/brand/br4.png') ?>" alt="brand-image" />
                        </a>
                    </div><!--/.item-->

                    <div class="item">
                        <a href="#">
                            <img src="<?= base_url('assets/images/brand/br5.png') ?>" alt="brand-image" />
                        </a>
                    </div><!--/.item-->

                    <div class="item">
                        <a href="#">
                            <img src="<?= base_url('assets/images/brand/br6.png') ?>" alt="brand-image" />
                        </a>
                    </div><!--/.item-->
                </div><!--/.owl-carousel-->
            </div><!--/.clients-area-->

        </div><!--/.container-->

    </section><!--/brand-->
    <!--brand end -->

    <!--blog start -->
    <section id="blog" class="blog"></section><!--/.blog-->
    <!--blog end -->

    <!--contact start-->
    <footer id="contact" class="contact">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="single-footer-widget">
                            <div class="footer-logo">
                                <a href="index.html">instarent</a>
                            </div>
                            <p>
                                Ased do eiusm tempor incidi ut labore et dolore magnaian aliqua. Ut enim ad minim veniam.
                            </p>
                            <div class="footer-contact">
                                <p>info@themesine.com</p>
                                <p>+1 (885) 2563154554</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6">
                        <div class="single-footer-widget">
                            <h2>about devloon</h2>
                            <ul>
                                <li><a href="#">about us</a></li>
                                <li><a href="#">career</a></li>
                                <li><a href="#">terms <span> of service</span></a></li>
                                <li><a href="#">privacy policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-12">
                        <div class="single-footer-widget">
                            <h2>top brands</h2>
                            <div class="row">
                                <div class="col-md-7 col-xs-6">
                                    <ul>
                                        <li><a href="#">BMW</a></li>
                                        <li><a href="#">lamborghini</a></li>
                                        <li><a href="#">camaro</a></li>
                                        <li><a href="#">audi</a></li>
                                        <li><a href="#">infiniti</a></li>
                                        <li><a href="#">nissan</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-5 col-xs-6">
                                    <ul>
                                        <li><a href="#">ferrari</a></li>
                                        <li><a href="#">porsche</a></li>
                                        <li><a href="#">land rover</a></li>
                                        <li><a href="#">aston martin</a></li>
                                        <li><a href="#">mersedes</a></li>
                                        <li><a href="#">opel</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-offset-1 col-md-3 col-sm-6">
                        <div class="single-footer-widget">
                            <h2>news letter</h2>
                            <div class="footer-newsletter">
                                <p>
                                    Subscribe to get latest news update and informations
                                </p>
                            </div>
                            <div class="hm-foot-email">
                                <div class="foot-email-box">
                                    <input type="text" class="form-control" placeholder="Add Email">
                                </div><!--/.foot-email-box-->
                                <div class="foot-email-subscribe">
                                    <span><i class="fa fa-arrow-right"></i></span>
                                </div><!--/.foot-email-icon-->
                            </div><!--/.hm-foot-email-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-sm-6">
                        <p>
                            &copy; copyright.designed and developed by <a href="https://www.themesine.com/">themesine</a>.
                        </p><!--/p-->
                    </div>
                    <div class="col-sm-6">
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div>
                    </div>
                </div>
            </div><!--/.footer-copyright-->
        </div><!--/.container-->

        <div id="scroll-Top">
            <div class="return-to-top">
                <i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
            </div>

        </div><!--/.scroll-Top-->

    </footer><!--/.contact-->
    <!--contact end-->

    <!-- Modal -->
    <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="resultModalLabel">Hasil Pencarian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modalContent">
                    <!-- Hasil pencarian akan ditampilkan di sini -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <style>
        .modal {
            z-index: 1050;
            /* Pastikan z-index modal cukup tinggi */
        }

        .modal-backdrop {
            z-index: 1040;
            /* Backdrop harus memiliki z-index lebih rendah */
        }
    </style>

    <!-- JavaScript yang diload setelah halaman selesai diload -->
    <script>
        // Data kendaraan dari server
        const kendaraans = <?= json_encode($kendaraans) ?>;

        // Ketika Jenis dipilih
        document.getElementById('jenisSelect').addEventListener('change', function() {
            const selectedJenis = this.value;

            // Filter kendaraan berdasarkan jenis yang dipilih
            const filteredKendaraans = kendaraans.filter(kendaraan => kendaraan.jenis_kendaraan === selectedJenis);

            // Kosongkan dropdown Nama dan Tahun
            document.getElementById('namaSelect').innerHTML = '<option value="">Pilih Kendaraan</option>';
            document.getElementById('tahunSelect').innerHTML = '<option value="">Pilih Tahun</option>';

            // Isi dropdown Nama berdasarkan hasil filter
            const uniqueNamas = new Set(); // To avoid duplicates
            filteredKendaraans.forEach(kendaraan => {
                if (!uniqueNamas.has(kendaraan.nama_kendaraan)) {
                    uniqueNamas.add(kendaraan.nama_kendaraan);
                    const optionNama = document.createElement('option');
                    optionNama.value = kendaraan.nama_kendaraan;
                    optionNama.text = kendaraan.nama_kendaraan;
                    document.getElementById('namaSelect').appendChild(optionNama);
                }
            });

            // Isi dropdown Tahun berdasarkan hasil filter
            const uniqueTahun = new Set(); // To avoid duplicates
            filteredKendaraans.forEach(kendaraan => {
                if (!uniqueTahun.has(kendaraan.tahun_kendaraan)) {
                    uniqueTahun.add(kendaraan.tahun_kendaraan);
                    const optionTahun = document.createElement('option');
                    optionTahun.value = kendaraan.tahun_kendaraan;
                    optionTahun.text = kendaraan.tahun_kendaraan;
                    document.getElementById('tahunSelect').appendChild(optionTahun);
                }
            });
        });

        // Tangkap form submit
        document.getElementById('searchForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Mencegah form reload halaman

            // Ambil nilai dari form
            const jenis = document.getElementById('jenisSelect').value;
            const nama = document.getElementById('namaSelect').value;
            const tahun = document.getElementById('tahunSelect').value;

            // Periksa apakah tidak ada yang dipilih
            if (!jenis && !nama && !tahun) {
                document.getElementById('modalContent').innerHTML = '<p>Data Anda tidak ditemukan. Silakan pilih kriteria pencarian.</p>';
                $('#resultModal').modal('show'); // Tampilkan modal
                return; // Hentikan eksekusi lebih lanjut
            }

            // Filter kendaraan berdasarkan pilihan user
            const resultKendaraans = kendaraans.filter(kendaraan =>
                (jenis ? kendaraan.jenis_kendaraan === jenis : true) &&
                (nama ? kendaraan.nama_kendaraan === nama : true) &&
                (tahun ? kendaraan.tahun_kendaraan === tahun : true)
            );

            // Tampilkan hasil ke dalam modal
            let content = '';
            if (resultKendaraans.length > 0) {
                resultKendaraans.forEach(kendaraan => {
                    content += `
                <p>Kendaraan: ${kendaraan.nama_kendaraan}, Jenis: ${kendaraan.jenis_kendaraan}, Tahun: ${kendaraan.tahun_kendaraan}</p>
                <a href="detail/${kendaraan.id_kendaraan}" class="btn btn-primary">Lihat Detail</a>
            `;
                });
            } else {
                content = '<p>Tidak ada kendaraan yang cocok dengan filter Anda.</p>';
            }

            document.getElementById('modalContent').innerHTML = content;
            $('#resultModal').modal('show'); // Tampilkan modal
        });
    </script>
    </div>
    <!-- Load jQuery terlebih dahulu -->
    <script src="<?= base_url('assets/js/jquery.js') ?>"></script>

    <!-- Modernizr untuk fitur pendeteksian -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    <!-- Load Bootstrap JS setelah jQuery -->
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>

    <!-- Plugin lain yang membutuhkan jQuery -->
    <script src="<?= base_url('assets/js/bootsnav.js') ?>"></script>
    <script src="<?= base_url('assets/js/owl.carousel.min.js') ?>"></script>

    <!-- Plugin tambahan -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- File custom JavaScript Anda -->
    <script src="<?= base_url('assets/js/custom.js') ?>"></script>


</body>

</html>