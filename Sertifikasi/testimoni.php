<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Testimoni Pelanggan - Traventure Indonesia</title>
  <!-- Css -->
  <link rel="stylesheet" href="styles/css/style.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
    }

    .testimonial-section {
      padding: 60px 0;
    }

    .testimonial-title {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 40px;
      text-align: center;
      color: #2c3e50;
    }

    .card-testimonial {
      border: none;
      border-radius: 15px;
      box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
      background: #fff;
    }

    .card-testimonial:hover {
      transform: translateY(-8px);
    }

    .card-testimonial img {
      border-radius: 50%;
      width: 80px;
      height: 80px;
      object-fit: cover;
      margin: 15px auto 10px;
    }

    .testimonial-name {
      font-weight: 600;
      color: #34495e;
    }

    .testimonial-city {
      font-size: 0.9rem;
      color: #7f8c8d;
      margin-bottom: 15px;
    }

    .testimonial-text {
      font-size: 0.95rem;
      color: #555;
      font-style: italic;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      filter: invert(1);
    }
  </style>
</head>
<header>
  <?php
  include 'navbar.php';
  ?>
  <!-- Hero carousel -->
  <div id="carouselExampleCaptions" class="carousel slide">
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
        <img src="styles/picture/daniele-la-rosa-messina-477OkYru4qU-unsplash.jpg" class="d-block w-100 c-img"
          alt="...">
        <div class="carousel-caption top-0 mt-4">
          <p class="mt-5 fs-3 text-uppercase">Unleash your power</p>
          <h1 class="display-1 fw-bolder text-capitalize mb-5">Swiss Tour</h1>
          <button class="btn btn-info px-4 py-2 fs-5 mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">Pesan
            Sekarang</button>
          <a class="btn btn-success px-4 py-2 fs-5 mt-5" href="#kontak">Hubungi
            Kami</a>
        </div>
      </div>
      <div class="carousel-item c-item">
        <img src="styles/picture/derek-thomson-TWoL-QCZubY-unsplash.jpg" class="d-block w-100 c-img" alt="...">
        <div class="carousel-caption top-0 mt-4">
          <p class="mt-5 fs-3 text-uppercase">Unleash your power</p>
          <h1 class="display-1 fw-bolder text-capitalize mb-5">Nusa Penida Tour</h1>
          <button class="btn btn-info px-4 py-2 fs-5 mt-5">Pesan Sekarang</button>
          <button class="btn btn-success px-4 py-2 fs-5 mt-5">Hubungi Kami</button>
        </div>
      </div>
      <div class="carousel-item c-item">
        <img src="styles/picture/nastya-dulhiier-ge8bX0N_Dhc-unsplash.jpg" class="d-block w-100 c-img" alt="...">
        <div class="carousel-caption top-0 mt-4">
          <p class="mt-5 fs-3 text-uppercase">Unleash your power</p>
          <h1 class="display-1 fw-bolder text-capitalize mb-5">Europe Tour</h1>
          <button class="btn btn-info px-4 py-2 fs-5 mt-5">Pesan Sekarang</button>
          <button class="btn btn-success px-4 py-2 fs-5 mt-5">Hubungi Kami</button>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Booking travel</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="flex-row">
              <div class="mb-3">
                <input type="text" class="form-control" id="email-book" placeholder="Email Address">
              </div>
              <div class="mb-3">
                <textarea class="form-control" id="message-text"></textarea>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Checkout</button>
        </div>
      </div>
    </div>
  </div>
</header>

<section class="testimonial-section">
  <div class="container">
    <h2 class="testimonial-title">Apa Kata Mereka?</h2>

    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">

        <!-- Testimoni 1 -->
        <div class="carousel-item active">
          <div class="card card-testimonial text-center p-4">
            <img src="styles/picture/funny-profile-pictures-17.png" alt="Pelanggan 1">
            <h5 class="testimonial-name">Andi Pratama</h5>
            <p class="testimonial-city">Jakarta</p>
            <p class="testimonial-text">"Perjalanan yang luar biasa! Semua terorganisir dengan baik, membuat liburan
              saya bersama keluarga sangat menyenangkan."</p>
          </div>
        </div>

        <!-- Testimoni 2 -->
        <div class="carousel-item">
          <div class="card card-testimonial text-center p-4">
            <img src="styles/picture/funny-profile-pictures-17.png" alt="Pelanggan 2">
            <h5 class="testimonial-name">Siti Rahmawati</h5>
            <p class="testimonial-city">Surabaya</p>
            <p class="testimonial-text">"Paket wisatanya sangat lengkap dan worth it. Fasilitasnya juga sesuai dengan
              yang dijanjikan."</p>
          </div>
        </div>

        <!-- Testimoni 3 -->
        <div class="carousel-item">
          <div class="card card-testimonial text-center p-4">
            <img src="styles/picture/funny-profile-pictures-17.png" alt="Pelanggan 3">
            <h5 class="testimonial-name">Budi Santoso</h5>
            <p class="testimonial-city">Yogyakarta</p>
            <p class="testimonial-text">"Guide-nya ramah, perjalanan sangat nyaman. Saya pasti akan merekomendasikan
              Traventure kepada teman-teman."</p>
          </div>
        </div>

        <!-- Testimoni 4 -->
        <div class="carousel-item">
          <div class="card card-testimonial text-center p-4">
            <img src="styles/picture/funny-profile-pictures-17.png" alt="Pelanggan 4">
            <h5 class="testimonial-name">Maria Kristina</h5>
            <p class="testimonial-city">Bandung</p>
            <p class="testimonial-text">"Salah satu pengalaman terbaik saya! Dari awal booking sampai akhir
              perjalanan, semuanya lancar."</p>
          </div>
        </div>

      </div>

      <!-- Navigasi -->
      <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>

    </div>
  </div>
</section>

<?php
include 'footer.php';
?>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>