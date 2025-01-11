<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent your favourite car</title>

    <!-- 
    - favicon
  -->
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

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
</head>

<style>
.navbar-header h3 {
    font-family: 'Lobster', cursive;
    font-size: 35px;
    color: black;
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
                        <a href="#featured-car" class="navbar-link" data-nav-link>Explore cars</a>
                    </li>

                    <li>
                        <a href="/customer/about" class="navbar-link" data-nav-link>About us</a>
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
                    <h1 class="hero-text">
                        <?= session()->has('username') ? 'Welcome, ' . session()->get('username') : 'Welcome, Guest'; ?>
                    </h1><br>
                    <div class="hero-content">
                        <h2 class="h1 hero-title">The easy way to takeover a lease</h2>

                        <p class="hero-text">
                            Live in New York, New Jersey, and Connecticut!
                        </p>
                    </div>

                    <div class="hero-banner"></div>

                    <form action="" class="hero-form">
                        <div class="input-wrapper">
                            <label for="input-1" class="input-label">Car, model, or brand</label>
                            <input type="text" name="car-model" id="input-1" class="input-field"
                                placeholder="What car are you looking for?">
                        </div>

                        <div class="input-wrapper">
                            <label for="input-2" class="input-label">Max. monthly payment</label>
                            <input type="text" name="monthly-pay" id="input-2" class="input-field"
                                placeholder="Add an amount in $">
                        </div>

                        <div class="input-wrapper">
                            <label for="input-3" class="input-label">Make Year</label>
                            <input type="text" name="year" id="input-3" class="input-field"
                                placeholder="Add a minimal make year">
                        </div>

                        <button type="submit" class="btn">Search</button>
                    </form>
                </div>
            </section>

            <!-- 
        - #FEATURED CAR
      -->

            <section class="section featured-car" id="featured-car">
                <div class="container">

                    <div class="title-wrapper">
                        <h2 class="h2 section-title">Featured Cars</h2>

                        <a href="#" class="featured-car-link">
                            <span>View more</span>
                            <ion-icon name="arrow-forward-outline"></ion-icon>
                        </a>
                    </div>

                    <ul class="featured-car-list">
                        <?php foreach ($kendaraans as $kendaraan): ?>
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
                                            </strong> / month
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
            </section><br><br>

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

            <!-- js -->
            <script src="./assets/js/script.js"></script>

            <!-- link icon -->
            <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

            </body>

</html>