<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galeri Kegiatan - PT Traventure Indonesia</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Lightbox CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
  <!-- Css -->
  <link rel="stylesheet" href="styles/css/galeristyle.css">
</head>

<body>
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

  <section class="gallery-section">
    <div class="container">
      <h2 class="gallery-title">Galeri Kegiatan Traventure</h2>

      <div class="row g-4">
        <div class="col-sm-6 col-md-4 col-lg-3">
          <a href="https://mandiri-travel.com/wp-content/uploads/2025/05/Liburan-Bersama-Keluarga.jpg"
            data-lightbox="traventure" data-title="Kegiatan Outbound Bali 2025">
            <img src="styles/picture/Liburan-Bersama-Keluarga.webp" alt="Kegiatan Outbound"
              class="img-fluid gallery-img">
          </a>
          <h4 class="text-center">Kegiatan Outbound</h4>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3">
          <a href="https://mandiri-travel.com/wp-content/uploads/2025/05/Liburan-Bersama-Keluarga.jpg"
            data-lightbox="traventure" data-title="Kegiatan Outbound Bali 2025">
            <img src="styles/picture/Liburan-Bersama-Keluarga.webp" alt="Kegiatan Outbound"
              class="img-fluid gallery-img">
          </a>
          <h4 class="text-center">Liburan ke Bromo</h4>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3">
          <a href="https://mandiri-travel.com/wp-content/uploads/2025/05/Liburan-Bersama-Keluarga.jpg"
            data-lightbox="traventure" data-title="Kegiatan Outbound Bali 2025">
            <img src="styles/picture/Liburan-Bersama-Keluarga.webp" alt="Kegiatan Outbound"
              class="img-fluid gallery-img">
          </a>
          <h4 class="text-center">Open Trip Paris</h4>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3">
          <a href="https://mandiri-travel.com/wp-content/uploads/2025/05/Liburan-Bersama-Keluarga.jpg"
            data-lightbox="traventure" data-title="Kegiatan Outbound Bali 2025">
            <img src="styles/picture/Liburan-Bersama-Keluarga.webp" alt="Kegiatan Outbound"
              class="img-fluid gallery-img">
          </a>
          <h4 class="text-center">Melihat Aurora</h4>
        </div>

      </div>
    </div>
  </section>

  <?php
  include 'footer.php';
  ?>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Lightbox JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
</body>

</html>