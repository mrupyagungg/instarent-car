<!doctype html>
<html lang="en">

<head>
    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Detail <?= esc($kendaraan['jenis_kendaraan']) ?> | <?= $kendaraan['nama_kendaraan'] ?> <?= $kendaraan['tahun_kendaraan'] ?>
    </title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/icon" href="<?= base_url('assets/logo/favicon.png') ?>" />

    <!-- Font Family -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/responsive.css') ?>">

    <style>
        .navbar-header h3.navbar {
            font-family: 'Lobster', cursive;
            font-size: 35px;
            color: white;

            margin: 2rem;
            padding: 1.5rem;
        }

        .navbar-header .navbar-toggle {
            border: none;
            background: none;

        }

        /* Header styles */
        .navbar {
            background-color: #343a40;
            /* Dark background for the navbar */
            padding: 0.5rem 1rem;
            /* Padding for navbar items */
        }

        .navbar-brand img {
            max-width: 150px;
            /* Adjust logo size */
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            /* White text color for links */
            padding: 15px 20px;
            /* Padding for nav links */
        }

        .navbar-nav .nav-link:hover {
            background-color: #495057;
            /* Hover background color */
            border-radius: 5px;
            /* Rounded corners */
        }

        .navbar-toggler {
            border: none;
            /* No border for toggle button */
        }

        .navbar-toggler-icon {
            background-color: #fff;
            /* White toggle icon */
        }

        /* Custom styles */
        body {
            padding-top: 0;
            /* No padding on top, header will cover the content */
        }

        .content {
            padding-top: 70px;
            /* Padding for content to ensure it's below the header */
        }

        /* Media Queries for Responsive Header */

        /* Styles for devices with a max width of 768px (tablets and mobile devices) */
        @media (max-width: 1180px) {

            /* Adjust the navbar links to be vertical */
            .navbar-nav {
                flex-direction: column;
                /* Stack the nav items */
                padding: 0;
                /* Remove padding */
            }

            /* Adjust the navbar brand */
            .navbar-brand {
                padding: 15px 0;
                /* Add some padding for spacing */
                text-align: center;
                /* Center brand text */
            }

            /* Style the toggle button */
            .navbar-toggler {
                margin: 15px;
                /* Add some margin around the toggle button */
                border: none;
                /* Remove border */
                background: transparent;
                /* Transparent background */
            }

            /* Ensure the toggle icon is visible */
            .navbar-toggler .navbar-toggler-icon {
                background-image: url('data:image/svg+xml;charset=utf8,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 30 30\' fill=\'#000\'%3E%3Cpath stroke=\'none\' d=\'M0 0h30v30H0z\'/%3E%3Cpath stroke=\'#000\' stroke-width=\'2\' d=\'M4 7h22M4 15h22M4 23h22\'/%3E%3C/svg%3E');
            }

            /* Adjust dropdowns for better usability */
            .navbar-collapse {
                display: none;
                /* Start with the navbar collapsed */
                width: 100%;
                /* Full width for mobile */
            }

            /* Show navbar when toggled */
            .navbar-collapse.show {
                display: block;
                /* Show the navbar */
            }
        }

        /* Styles for devices with a max width of 480px (mobile devices) */
        @media (max-width: 480px) {

            /* Adjust the navbar brand for smaller screens */
            .navbar-brand {
                font-size: 20px;
                /* Smaller brand font size */
            }

            /* Adjust navbar links for smaller screens */
            .navbar-nav .nav-link {
                font-size: 16px;
                /* Smaller font size for links */
                padding: 10px 15px;
                /* Adjust padding */
            }

            /* Adjust the toggle button size */
            .navbar-toggler {
                padding: 8px;
                /* Smaller padding */
            }
        }
    </style>
</head>

<body>
    <!-- Top Area Start -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <h3 class="navbar navbar-brand">Instarent<span></span></h3>

            </div><!--/.navbar-header-->
            <button class=" navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/customer/dashboard#') ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/customer/dashboard#') ?>">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/customer/dashboard#') ?>">New Car</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/customer/dashboard#') ?>">List Cars</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/customer/dashboard#') ?>">Brands</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/customer/dashboard#') ?>">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Top Area End -->

    <!-- Main Content Start -->
    <div class="content">
        <!-- Your main content goes here -->
    </div>
    <!-- Main Content End -->

    <!-- JavaScript Files -->
    <script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>