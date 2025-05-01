<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>𝙄𝙉𝙎𝙏𝘼𝙍𝙀𝙉𝙏 (𝙈𝙤𝙗𝙞𝙡 & 𝙈𝙤𝙩𝙤𝙧)</title>
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
                        <a href="/garasi" class="navbar-link" data-nav-link>Garasi</a>
                    </li>

                    <li>
                        <a href="/about" class="navbar-link" data-nav-link>About us</a>
                    </li>

                    <li>
                        <a href="/contact" class="navbar-link" data-nav-link>Contact us</a>
                    </li>
                    <li>
                        <a href="/contact" class="navbar-link" data-nav-link>Riwayat</a>
                    </li>

                </ul>

            </nav>

            <div class="header-actions">

                <div class="header-contact">
                    <a href="tel:88002345678" class="contact-link">8 800 234 56 78</a>

                    <span class="contact-time">Mon - Sat: 9:00 am - 6:00 pm</span>
                </div>


            </div>

        </div>
    </header>