<?php
include 'koneksi.php';
session_start();

$is_logged_in = isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true;

// Proses form pemesanan
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_pemesanan'])) {
    $nama_pemesan = $_POST['nama_pemesan'];
    $paket_pesanan = $_POST['paket_pesanan'];

    $sql_pemesanan = "INSERT INTO pemesanan (nama_pemesan, paket_pesanan) VALUES (?, ?)";
    $stmt_pemesanan = $connect->prepare($sql_pemesanan);
    $stmt_pemesanan->bind_param("ss", $nama_pemesan, $paket_pesanan);

    if ($stmt_pemesanan->execute()) {
        $message = "Pemesanan berhasil disimpan!";
    } else {
        $message = "Error: " . $stmt_pemesanan->error;
    }

    header('Location: index.php?status=success&message=' . urlencode($message));
    exit;
}

// Proses form Contact Us
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit_contact'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];

    $sql_contact = "INSERT INTO contact_us (nama, email, pertanyaan) VALUES (?, ?, ?)";
    $stmt_contact = $connect->prepare($sql_contact);
    $stmt_contact->bind_param("sss", $nama, $email, $pesan);

    if ($stmt_contact->execute()) {
        $message_contact = "Pesan Anda berhasil terkirim!";
    } else {
        $message_contact = "Error: " . $stmt_contact->error;
    }
    header('Location: index.php?status=success&message_contact=' . urlencode($message_contact) . '#kontak');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traventure Indonesia</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        .navbar-brand img {
            height: auto;
            width: 100px;
        }

        .c-item {
            height: 480px;
        }

        .c-img {
            height: 100%;
            object-fit: cover;
            filter: brightness(0.6);
        }

        body {
            padding-top: 72px;
        }

        .p-img {
            height: 200px;
            object-fit: cover;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        footer {
            background-color: #343a40;
            color: #fff;
            padding: 1rem 0;
            margin-top: 3rem;
        }
    </style>
</head>

<body class="bg-light">
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-info navbar-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#" style="height: auto; width:100px;">
                    <img src="styles/picture/logo.png" alt="Logo Traventure">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#top">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#profil">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#visi_misi">Visi & Misi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#produk_kami">Paket Liburan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#kontak">Kontak</a>
                        </li>

                        <!-- Tombol Login -->
                        <?php if ($is_logged_in): ?>
                            <li class="nav-item">
                                <a class="btn btn-danger ms-lg-3" href="logout.php">Logout</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="btn btn-success ms-lg-3" href="login.php">Login</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item ms-lg-3">
                            <button class="btn btn-secondary" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                                <i class="bi bi-list"></i>
                                Menu lain
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Akhir Navbar -->

        <!-- Carousel -->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active c-item">
                    <img src="styles/picture/daniele-la-rosa-messina-477OkYru4qU-unsplash.jpg"
                        class="d-block w-100 c-img" alt="...">
                    <div class="carousel-caption top-0 mt-5 pt-5 text-center">
                        <h1 class="display-3 fw-bolder text-capitalize mb-3">Swiss Tour</h1>
                        <p class="fs-4 text-uppercase">Unleash Your Power</p>
                        <div class="d-flex justify-content-center mt-4">

                            <!-- Pengaturan Tombol Pesan -->
                            <?php if ($is_logged_in): ?>
                                <button class="btn btn-info px-4 py-2 me-3" data-bs-toggle="modal"
                                    data-bs-target="#bookingModal">Pesan Sekarang</button>
                            <?php else: ?>
                                <button class="btn btn-info px-4 py-2 me-3" disabled>Pesan Sekarang</button>
                            <?php endif; ?>
                            <a class="btn btn-success px-4 py-2" href="#kontak">Hubungi Kami</a>
                        </div>
                    </div>
                </div>

                <div class="carousel-item c-item">
                    <img src="styles/picture/derek-thomson-TWoL-QCZubY-unsplash.jpg" class="d-block w-100 c-img"
                        alt="...">
                    <div class="carousel-caption top-0 mt-5 pt-5 text-center">
                        <h1 class="display-3 fw-bolder text-capitalize mb-3">Nusa Penida Tour</h1>
                        <p class="fs-4 text-uppercase">Unleash Your Power</p>
                        <div class="d-flex justify-content-center mt-4">
                            <?php if ($is_logged_in): ?>
                                <button class="btn btn-info px-4 py-2 me-3" data-bs-toggle="modal"
                                    data-bs-target="#bookingModal">Pesan Sekarang</button>
                            <?php else: ?>
                                <button class="btn btn-info px-4 py-2 me-3" disabled>Pesan Sekarang</button>
                            <?php endif; ?>
                            <a class="btn btn-success px-4 py-2" href="#kontak">Hubungi Kami</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item c-item">
                    <img src="styles/picture/nastya-dulhiier-ge8bX0N_Dhc-unsplash.jpg" class="d-block w-100 c-img"
                        alt="...">
                    <div class="carousel-caption top-0 mt-5 pt-5 text-center">
                        <h1 class="display-3 fw-bolder text-capitalize mb-3">Europe Tour</h1>
                        <p class="fs-4 text-uppercase">Unleash Your Power</p>
                        <div class="d-flex justify-content-center mt-4">
                            <?php if ($is_logged_in): ?>
                                <button class="btn btn-info px-4 py-2 me-3" data-bs-toggle="modal"
                                    data-bs-target="#bookingModal">Pesan Sekarang</button>
                            <?php else: ?>
                                <button class="btn btn-info px-4 py-2 me-3" disabled>Pesan Sekarang</button>
                            <?php endif; ?>
                            <a class="btn btn-success px-4 py-2" href="#kontak">Hubungi Kami</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!-- Akhir carousel -->

        <!-- Modal Booking -->
        <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form action="index.php" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="bookingModalLabel">Form Pemesanan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                                <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" required>
                            </div>
                            <div class="mb-3">
                                <label for="paket_pesanan" class="form-label">Paket yang Dipesan</label>
                                <select class="form-select" id="paket_pesanan" name="paket_pesanan" required>
                                    <option selected disabled value="">Pilih paket...</option>
                                    <option value="Raja Ampat Exotic Trip">Raja Ampat Exotic Trip</option>
                                    <option value="Turki Historical Journey">Turki Historical Journey</option>
                                    <option value="Korea Selatan Trip">Korea Selatan Trip</option>
                                    <option value="Bromo Sunrise Adventure">Bromo Sunrise Adventure</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" name="submit_pemesanan" class="btn btn-primary">Pesan
                                Sekarang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Akhir dari modal -->

        <!-- Offcanvas -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <p class="text-secondary fst-italic">
                        Explore the World with Us – Your Journey, Our Priority
                    </p>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about_us">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#profil">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#visi_misi">Visi & Misi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#produk_kami">Paket Liburan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    <li>
                        <a href="galeri.php" class="d-block py-2">Galeri Foto</a>
                    </li>
                    <li>
                        <a href="testimoni.php" class="d-block py-2">Daftar Klien</a>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown mt-3">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Artikel
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="artikel1.php">Artikel 1</a></li>
                                <li><a class="dropdown-item" href="artikel2.php">Artikel 2</a></li>
                                <li><a class="dropdown-item" href="artikel3.php">Artikel 3</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Akhir dari offcanvas -->
    </header>

    <main class="container py-5">
        <!-- About Us -->
        <section id="about_us" class="my-5 p-4 bg-white rounded shadow-sm">
            <h2 class="text-center fw-bold">About Us</h2>
            <hr class="mb-4">
            <p class="lead text-center">
                Traventure Indonesia adalah perusahaan travel yang berdiri sejak tahun 2015. Kami berkomitmen
                menghadirkan pengalaman perjalanan yang nyaman, aman, dan berkesan untuk setiap pelanggan.
                Dengan jaringan destinasi luas, layanan profesional, serta harga kompetitif, kami selalu menjadi
                partner terbaik untuk perjalanan Anda.
            </p>
        </section>

        <!-- Profil Perusahaan -->
        <section id="profil" class="my-5 p-4 bg-white rounded shadow-sm">
            <h3 class="fw-bold">Profil Perusahaan</h3>
            <div class="d-flex flex-column flex-md-row align-items-center mt-4">
                <div class="me-md-4 mb-4 mb-md-0">
                    <img src="styles/picture/afif-ramdhasuma-joghOw56iLU-unsplash.jpg" alt="Team Traventure"
                        class="profile-img" style="height: 150px; width: auto;">
                </div>
                <div class="table-responsive w-100">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td><b class="text-nowrap">Nama Perusahaan</b></td>
                                <td class="text-nowrap">:</td>
                                <td>PT Traventure Indonesia</td>
                            </tr>
                            <tr>
                                <td><b class="text-nowrap">Tahun Berdiri</b></td>
                                <td class="text-nowrap">:</td>
                                <td>2015</td>
                            </tr>
                            <tr>
                                <td><b class="text-nowrap">Bidang Usaha</b></td>
                                <td class="text-nowrap">:</td>
                                <td>Jasa perjalanan wisata domestik dan internasional</td>
                            </tr>
                            <tr>
                                <td><b class="text-nowrap">Legalitas</b></td>
                                <td class="text-nowrap">:</td>
                                <td>Izin resmi Kementerian Pariwisata & Ekonomi Kreatif, terdaftar sebagai anggota ASITA
                                    (Asosiasi Perusahaan Perjalanan Wisata Indonesia).</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <h3 class="fw-bold mt-5">Mengapa Memilih Kami?</h3>
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-transparent border-0"><b class="text-nowrap">✈️ Layanan Profesional:</b>
                    Tim berpengalaman siap membantu dari awal hingga akhir perjalanan.</li>
                <li class="list-group-item bg-transparent border-0"><b class="text-nowrap">🌏 Destinasi Luas:</b>
                    Menyediakan pilihan perjalanan domestik dan internasional.</li>
                <li class="list-group-item bg-transparent border-0"><b class="text-nowrap">🏨 Partner Terbaik:</b>
                    Bekerja sama dengan hotel, transportasi, dan tour guide terpercaya.</li>
            </ul>
            <p class="text-justify mt-4 fw-medium">
                PT Traventure Indonesia telah berpengalaman dalam menghadirkan perjalanan wisata yang nyaman, aman, dan
                penuh kesan bagi setiap pelanggan. Dengan dukungan tim profesional dan jaringan mitra terpercaya, kami
                mampu memberikan layanan terbaik mulai dari pemilihan destinasi, akomodasi, hingga fasilitas perjalanan
                yang lengkap. Dengan paket wisata yang fleksibel, harga kompetitif, serta pelayanan yang mengutamakan
                kepuasan pelanggan, kami yakin dapat menjadi pilihan anda. Kami memiliki
                komitmen bahwa setiap perjalanan bukan
                sekadar liburan, melainkan sebuah pengalaman berharga yang tak terlupakan.
            </p>
        </section>

        <section id="visi_misi" class="my-5 p-4 bg-white rounded shadow-sm">
            <h2 class="text-center fw-bold">Visi & Misi</h2>
            <hr class="mb-4">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <h4 class="card-title fw-bold">Visi</h4>
                            <p class="card-text">
                                Menjadi perusahaan travel terdepan yang menghadirkan perjalanan berkualitas dan berkesan
                                bagi setiap pelanggan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="card-title text-center fw-bold">Misi</h4>
                            <ol class="card-text">
                                <li>Memberikan layanan wisata yang nyaman, aman, dan terpercaya.</li>
                                <li>Menyediakan paket perjalanan domestik & internasional dengan harga kompetitif.</li>
                                <li>Mendukung pengembangan pariwisata lokal Indonesia.</li>
                                <li>Menjalin kerjasama strategis dengan mitra transportasi, hotel, dan tour guide
                                    profesional.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="produk_kami" class="my-5 p-4 bg-white rounded shadow-sm">
            <h2 class="text-center fw-bold">Paket Liburan</h2>
            <hr class="mb-4">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 justify-content-center">
                <div class="col">
                    <div class="card h-100">
                        <img src="styles/picture/produk/ridho-ibrahim-Q5dKAbRfPN0-unsplash.jpg"
                            class="card-img-top p-img" alt="Raja Ampat">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">Raja Ampat Exotic Trip</h5>
                            <p class="card-text mb-2">
                                <span class="fs-6 fw-bold text-secondary">Harga: Rp 6.500.000/pax</span>
                            </p>
                            <ul class="list-unstyled mb-auto">
                                <li><small>✔️ Tiket pesawat PP Jakarta – Sorong</small></li>
                                <li><small>✔️ Hotel bintang 3 (4 malam)</small></li>
                                <li><small>✔️ Tour guide profesional</small></li>
                                <li><small>✔️ Snorkeling gear</small></li>
                                <li><small>✔️ Makan sesuai itinerary</small></li>
                            </ul>
                            <?php if ($is_logged_in): ?>
                                <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#bookingModal"
                                    data-paket="Raja Ampat Exotic Trip">Pesan Sekarang</button>
                            <?php else: ?>
                                <button class="btn btn-primary mt-3" disabled>Pesan Sekarang</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="styles/picture/produk/engin-yapici-WA1u0scVLZU-unsplash.jpg"
                            class="card-img-top p-img" alt="Turki">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">Turki Historical Journey</h5>
                            <p class="card-text mb-2">
                                <span class="fs-6 fw-bold text-secondary">Harga: Rp 18.000.000/pax</span>
                            </p>
                            <ul class="list-unstyled mb-auto">
                                <li><small>✔️ Tiket pesawat internasional PP</small></li>
                                <li><small>✔️ Hotel bintang 4 (4 malam)</small></li>
                                <li><small>✔️ Tour guide berbahasa indonesia</small></li>
                                <li><small>✔️ Tiket masuk objek wisata</small></li>
                                <li><small>✔️ Transportasi bus private</small></li>
                            </ul>
                            <?php if ($is_logged_in): ?>
                                <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#bookingModal"
                                    data-paket="Turki Historical Journey">Pesan Sekarang</button>
                            <?php else: ?>
                                <button class="btn btn-primary mt-3" disabled>Pesan Sekarang</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="styles/picture/produk/shawn-nq4tcJz77r0-unsplash.jpg" class="card-img-top p-img"
                            alt="Korea Selatan">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">Korea Selatan Trip</h5>
                            <p class="card-text mb-2">
                                <span class="fs-6 fw-bold text-secondary">Harga: Rp 15.000.000/pax</span>
                            </p>
                            <ul class="list-unstyled mb-auto">
                                <li><small>✔️ Tiket pesawat PP Jakarta – Seoul</small></li>
                                <li><small>✔️ Hotel bintang 3/4 (6 malam)</small></li>
                                <li><small>✔️ Tiket masuk Nami Island, Everland, dll.</small></li>
                                <li><small>✔️ Makan sesuai itinerary</small></li>
                            </ul>
                            <?php if ($is_logged_in): ?>
                                <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#bookingModal"
                                    data-paket="Korea Selatan Trip">Pesan Sekarang</button>
                            <?php else: ?>
                                <button class="btn btn-primary mt-3" disabled>Pesan Sekarang</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="styles/picture/produk/husniati-salma-uAFGUY20W-U-unsplash.jpg"
                            class="card-img-top p-img" alt="Bromo">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">Bromo Sunrise Adventure</h5>
                            <p class="card-text mb-2">
                                <span class="fs-6 fw-bold text-secondary">Harga: Rp 1.750.000/pax</span>
                            </p>
                            <ul class="list-unstyled mb-auto">
                                <li><small>✔️ Jeep tour ke Gunung Bromo & Bukit Kingkong</small></li>
                                <li><small>✔️ Tiket masuk kawasan wisata</small></li>
                                <li><small>✔️ Penginapan homestay (2 malam)</small></li>
                            </ul>
                            <?php if ($is_logged_in): ?>
                                <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#bookingModal"
                                    data-paket="Bromo Sunrise Adventure">Pesan Sekarang</button>
                            <?php else: ?>
                                <button class="btn btn-primary mt-3" disabled>Pesan Sekarang</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="kontak" class="my-5 p-4 bg-white rounded shadow-sm">
            <h2 class="text-center fw-bold text-decoration-underline">Contact Us</h2>
            <p class="fs-5 text-center text-secondary mb-5">Punya pertanyaan? Silakan tuliskan pesan Anda, dan kami akan
                jawab segera!</p>

            <div class="row g-5">
                <div class="col-lg-6">
                    <h4 class="mb-3">Kirimkan Pesan Anda</h4>
                    <form action="index.php" method="POST">
                        <div class="mb-3">
                            <label for="inputNama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="inputNama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Alamat Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="inputPesan" class="form-label">Pesan</label>
                            <textarea class="form-control" id="inputPesan" rows="4" name="pesan" required></textarea>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" name="submit_contact" class="btn btn-primary">Kirim Pesan</button>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6">
                    <h4 class="mb-3">Temukan Kami</h4>
                    <div class="ratio ratio-4x3 mb-4">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.425980076295!2d106.82035111476939!3d-6.20842529550978!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1661d9a2a95%3A0x6e9a6503c9d2f44c!2sMenara%20Astra!5e0!3m2!1sid!2sid!4v1628173495456!5m2!1sid!2sid"
                            style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                    <div class="mt-4">
                        <h5 class="mb-2">Informasi Kontak</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2">
                                <strong><i class="bi bi-geo-alt-fill me-2"></i>Alamat:</strong>
                                <span>Menara Astra, Jl. Jend. Sudirman Kav. 5-6, Jakarta</span>
                            </li>
                            <li class="mb-2">
                                <strong><i class="bi bi-telephone-fill me-2"></i>Telepon:</strong>
                                <span>(021) 12345678</span>
                            </li>
                            <li class="mb-2">
                                <strong><i class="bi bi-envelope-fill me-2"></i>Email:</strong>
                                <span>info@traventureindonesia.com</span>
                            </li>
                            <li class="mb-2">
                                <strong><i class="bi bi-printer-fill me-2"></i>Fax:</strong>
                                <span>021-1234567</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="text-center">
        <div class="container">
            <p class="mb-0">&copy; 2024 Traventure Indonesia. Design By: Bobibolaa</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
        crossorigin="anonymous"></script>

    <script>
        // Mengisi nilai paket yang dipesan ke dalam modal
        var bookingModal = document.getElementById('bookingModal');
        bookingModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var paket = button.getAttribute('data-paket');
            var modalInput = bookingModal.querySelector('#paket_pesanan');
            if (paket) {
                modalInput.value = paket;
            }
        });
    </script>
</body>

</html>