<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/icons/favicon.ico'); ?>">
    <!-- 
    - favicon
  -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/brand/instarentlogopng.png') ?>" type="image/svg+xml">

    <!-- 
    - custom css link
  -->
    <link rel="stylesheet" href="<?= base_url('assets/css/stylee.css') ?>">
    <script src="<?= base_url('assets/js/script.js') ?>"></script>

    <!-- 
    - google font link
  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&family=Open+Sans&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<style>
.navbar-header h3 {
    font-family: 'Lobster', cursive;
    font-size: 35px;
    color: black;
}

.hero-forms {
    /* max-width: 500px; */
    background: rgba(255, 255, 255, 0.47);
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    margin: 50px auto;
}

.input-wrapper {
    margin-bottom: 10px;
}

.input-label {
    font-weight: bold;
    margin-bottom: 5px;
    display: block;
}

.input-field {
    width: 100%;
    padding: 10px;
    border: 1px solid #ced4da;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.input-field:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
    outline: none;
}

.btn {
    width: 50%;
    padding: 10px;
    margin-left: 20px;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    background: linear-gradient(135deg, #007bff, #0056b3);
    border: none;
    color: white;
    transition: all 0.3s ease;
}

.btn:hover {
    background: linear-gradient(135deg, #0056b3, #007bff);
    transform: scale(1.05);
}
</style>

<body?>

    <!-- 
    - #HEADER
  -->

    <header class="header" data-header>
        <div class="container">

            <div class="overlay" data-overlay></div>

            <div class="navbar-header">
                <h3>instarent</h3>
            </div>

            <nav class="navbar" data-navbar>
                <ul class="navbar-list">

                    <li>
                        <a href="/customer/dashboard" class="navbar-link" data-nav-link>Home</a>
                    </li>

                    <li>
                        <a href="/garasi" class="navbar-link" data-nav-link>Garasi</a>
                    </li>

                    <li>
                        <a href="/about" class="navbar-link" data-nav-link>About us</a>
                    </li>

                    <li>
                        <a href="/contact" class="navbar-link" data-nav-link>Contact us</a>
                    </li>

                </ul>

            </nav>

            <div class="header-actions">

                <div class="header-contact">
                    <a href="tel:88002345678" class="contact-link">8 800 234 56 78</a>

                    <span class="contact-time">Mon - Sat: 9:00 am - 6:00 pm</span>
                </div>

                <button class="nav-toggle-btn" data-nav-toggle-btn aria-label="Toggle Menu">
                    <span class="one"></span>
                    <span class="two"></span>
                    <span class="three"></span>
                </button>

            </div>

        </div>
    </header>

    <main>
        <article>

            <!-- 
        - #HERO
      -->

            <section class="section hero" id="home">
                <div class="container">
                    <!-- Tampilkan pesan welcome jika username ada di session -->

                    <div class="hero-content">
                        <h2 class="h1 hero-title">
                            <?= session()->get('username') ? 'Selamat Datang  ' . esc(session()->get('username')) : 'Welcome, Guest'; ?>
                        </h2>

                        <h3 class="h2 hero-text">Instarent solusi terbaik </h3>

                        <p class="hero-text">
                            <i data-lucide="map-pin"></i> PBB RUKO R11 BDG, Buah Batu, Bandung, Jawa Barat
                        </p>

                        <script src="https://unpkg.com/lucide@latest"></script>
                        <script>
                        lucide.createIcons();
                        </script>


                    </div>

                    <div class="hero-banner"></div>
                    <!-- <button type="submit" class="btn"></button> -->
                    <a class="view-more-btn" href="#featured-car">SELENGKAPNYA</a>
                </div>

            </section>

            <!-- 
        - #FEATURED CAR
      -->

            <section class="section featured-car" id="featured-car">
                <div class="container">

                    <div class="title-wrapper">
                        <h2 class="h2 section-title">Pilih Kendaraan</h2>

                        <a href="/garasi" class="featured-car-link">
                            <span>View more</span>
                            <ion-icon name="arrow-forward-outline"></ion-icon>
                        </a>
                    </div>

                    <ul class="featured-car-list">
                        <?php foreach (array_slice($kendaraans, 3, 6) as $kendaraan): ?>
                        <li>
                            <div class="featured-car-card">

                                <figure class="card-banner">
                                    <img src="<?= base_url('uploads/' . esc($kendaraan['gambar_kendaraan'])) ?>"
                                        alt="Car Image">
                                </figure>

                                <div class="card-content">

                                    <div class="card-title-wrapper">
                                        <h3 class="h3 card-title">
                                            <a href="#"><?= esc(ucwords($kendaraan['nama_kendaraan'])) ?></a>
                                        </h3>

                                        <data class="year" value="<?= esc($kendaraan['tahun_kendaraan']) ?>">
                                            <?= esc($kendaraan['tahun_kendaraan']) ?>
                                        </data>
                                    </div>

                                    <ul class="card-list">

                                        <li class="card-list-item">
                                            <ion-icon name="flash-outline"></ion-icon>
                                            <span class="card-item-text">
                                                Bensin
                                            </span>
                                        </li>
                                        <li class="card-list-item">
                                            <ion-icon name="car-sport-outline"></ion-icon>
                                            <span class="card-item-text">
                                                <?= esc(ucwords($kendaraan['merk_kendaraan'])) ?></span>
                                        </li>

                                    </ul>

                                    <div class="card-price-wrapper">
                                        <p class="card-price">
                                            <strong>
                                                <?= number_format($kendaraan['harga_sewa_kendaraan'], 2) ?>
                                            </strong> / day
                                        </p>
                                        <!-- <button class="btn fav-btn" aria-label="Add to favourite list">
                                            <ion-icon name="heart-outline"></ion-icon>
                                        </button> -->

                                        <a href="<?= base_url('detail/' . esc($kendaraan['id_kendaraan'])) ?>"
                                            class="btn">
                                            Rent now
                                        </a>
                                    </div>

                                </div>

                            </div>

                        </li>

                        <?php endforeach; ?>

                    </ul>

                </div>

                <div class="container">
                    <a href="<?= base_url('garasi') ?>" class=" view-more-btn">
                        View More <ion-icon name="arrow-forward-outline"></ion-icon>
                    </a>
                </div>
            </section>

            <!-- 
        - #GET START
      -->

            <section class="section get-start">
                <div class="container">

                    <h2 class="h2 section-title">Get started with 4 simple steps</h2>

                    <ul class="get-start-list">

                        <li>
                            <div class="get-start-card">

                                <div class="card-icon icon-1">
                                    <ion-icon name="person-add-outline"></ion-icon>
                                </div>

                                <h3 class="card-title">Create a profile</h3>

                                <p class="card-text">
                                    If you are going to use a passage of Lorem Ipsum, you need to be sure.
                                </p>

                                <a href="#featured-car" class="card-link">Get started</a>

                            </div>
                        </li>

                        <li>
                            <div class="get-start-card">

                                <div class="card-icon icon-2">
                                    <ion-icon name="car-outline"></ion-icon>
                                </div>

                                <h3 class="card-title">Tell us what car you want</h3>

                                <p class="card-text">
                                    Various versions have evolved over the years, sometimes by accident, sometimes on
                                    purpose
                                </p>

                            </div>
                        </li>

                        <li>
                            <div class="get-start-card">

                                <div class="card-icon icon-3">
                                    <ion-icon name="person-outline"></ion-icon>
                                </div>

                                <h3 class="card-title">Match with seller</h3>

                                <p class="card-text">
                                    It to make a type specimen book. It has survived not only five centuries, but also
                                    the leap into
                                    electronic
                                </p>

                            </div>
                        </li>

                        <li>
                            <div class="get-start-card">

                                <div class="card-icon icon-4">
                                    <ion-icon name="card-outline"></ion-icon>
                                </div>

                                <h3 class="card-title">Make a deal</h3>

                                <p class="card-text">
                                    There are many variations of passages of Lorem available, but the majority have
                                    suffered alteration
                                </p>

                            </div>
                        </li>

                    </ul>

                </div>
            </section>

            <section class="section testimonial">
                <div class="container">
                    <h2 class="h2 section-title">What Our Customers Say</h2>
                    <ul class="testimonial-list">
                        <li>
                            <div class="testimonial-card">
                                <p class="card-text">"Proses penyewaan sangat mudah, dan mobil dalam kondisi sempurna.
                                    Sangat merekomendasikan layanan ini!"</p>

                                <div class="stars">★★★★★</div>
                                <div class="card-user">
                                    <img src="<?= base_url('assets/images/sm/avatar1.jpg') ?>" alt="User Photo">
                                    <div>
                                        <h3 class="user-name">John Doe</h3>
                                        <span class="user-role">Businessman</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="testimonial-card">
                                <p class="card-text">"Pengalaman luar biasa! Layanan pelanggan sangat baik, dan saya
                                    menemukan mobil yang sempurna untuk perjalanan saya."</p>

                                <div class="stars">★★★★☆</div>
                                <div class="card-user">
                                    <img src="<?= base_url('assets/images/sm/avatar3.jpg') ?>" alt="User Photo">
                                    <div>
                                        <h3 class="user-name">Sarah Smith</h3>
                                        <span class="user-role">Frequent Traveler</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="testimonial-card">
                                <p class="card-text">"Layanan rental mobil terbaik! Harga terjangkau dan mobil yang
                                    terawat dengan baik membuat perjalanan saya sangat nyaman."</p>

                                <div class="stars">★★★★★</div>
                                <div class="card-user">
                                    <img src="<?= base_url('assets/images/sm/avatar4.jpg') ?>" alt="User Photo">
                                    <div>
                                        <h3 class="user-name">Michael Brown</h3>
                                        <span class="user-role">Entrepreneur</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>

            <!-- footer -->
            <link rel="stylesheet" href="<?= base_url('assets/css/detail.css') ?>">

            <footer class="footer">

                <div class="container">

                    <!-- Footer Top Section -->
                    <div class="footer-top">
                        <div class="footer-column">
                            <h3 class="footer-title-insta">Instarent</h3>
                            <p class="footer-description">Sewa mobil terbaik untuk kebutuhan perjalanan Anda. Nyaman,
                                mudah, dan
                                terpercaya.</p>
                        </div>

                        <div class="footer-column">
                            <h4 class="footer-title">Quick Links</h4>
                            <ul class="footer-links">
                                <li><a href="/customer/dashboard" class="footer-link">Home</a></li>
                                <li><a href="/customer/detail" class="footer-link">Explore Cars</a></li>
                                <li><a href="/about" class="footer-link">About Us</a></li>
                            </ul>
                        </div>

                        <div class="footer-column">
                            <h4 class="footer-title">Contact Us</h4>
                            <p><i class="material-icons">phone</i> 8 800 234 56 78</p>
                            <p><i class="material-icons">email</i> support@instarent.com</p>
                            <p><i class="material-icons">location_on</i> Bandung, Indonesia</p>
                        </div>

                        <!-- Payment Methods -->
                        <div class="footer-colum">
                            <h4 class="footer-title">Payment</h4>
                            <div class="payment-icons">
                                <div>
                                    <div class="payment-icons">
                                        <img src="<?= base_url('assets/images/Logo Bank Pembayaran.png') ?>" alt="BCA">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

            <!-- js -->
            <script src="./assets/js/script.js"></script>

            <!-- link icon -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

            </body>

</html>