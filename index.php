<?php include('header.php'); ?>

<main class="main">

<!-- Hero Section -->
<section id="hero" class="hero section mb-5">
  <div class="container text-center">
    <div class="d-flex flex-column justify-content-center align-items-center">
      <h1 data-aos="fade-up">Welcome to <span>Harvestly</span></h1>
      <p data-aos="fade-up" data-aos-delay="100">Panen Segar Dari Petani<br></p>
      <img src="assets/img/harvestly.com.webp" class="img-fluid hero-img" alt="" data-aos="zoom-out" data-aos-delay="300">
      <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
        <a href="#about" class="btn-get-started">Get Started</a>
      </div>
    </div>
  </div>
</section>
<!-- /Hero Section -->

<!-- About Section -->
<section id="about" class="about section mb-5">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
        <p class="who-we-are">About Us</p>
        <h3>Panen Segar dari Petani, Langsung ke Rumah Anda</h3>
        <p>
        Harvestly.com adalah platform modern yang menghubungkan Anda langsung dengan petani lokal di seluruh Indonesia. Kami percaya bahwa hasil panen terbaik berasal dari tangan-tangan petani yang berdedikasi, dan misi kami adalah memastikan Anda mendapatkan produk segar dengan kualitas terbaik.
        </p>
        <ul>
          <li><i class="bi bi-check-circle"></i> <span>Memperkuat kesejahteraan petani lokal dengan akses pasar yang lebih luas.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Menyediakan produk segar dari lahan pertanian ke konsumen tanpa perantara.</span></li>
          <li><i class="bi bi-check-circle"></i> <span>Mendorong konsumsi pangan lokal yang sehat dan berkualitas tinggi.</span></li>
        </ul>
        <a href="about.php" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
      </div>
      <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
        <div class="row gy-4">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /About Section -->

<!-- Contact Section -->
<section id="contact" class="contact section mt-5 mb-5">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Contact</h2>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">

      <div class="col-lg-6">
        <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
          <i class="bi bi-geo-alt"></i>
          <h3>Address</h3>
          <p>Indonesia</p>
        </div>
      </div><!-- End Info Item -->

      <div class="col-lg-3 col-md-6">
        <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
          <i class="bi bi-telephone"></i>
          <h3>Call Us</h3>
          <p>+62 812345678</p>
        </div>
      </div><!-- End Info Item -->

      <div class="col-lg-3 col-md-6">
        <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
          <i class="bi bi-envelope"></i>
          <h3>Email Us</h3>
          <p>Harvestyly@gmail.com</p>
        </div>
      </div><!-- End Info Item -->

    </div>

    <div class="row gy-4 mt-1">
      <div class="col-lg" data-aos="fade-up" data-aos-delay="300">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31918.100941903624!2d100.35138034974887!3d-0.3027605804323853!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd538a460df4be1%3A0xc940d13d891ab206!2sBukittinggi%2C%20Kota%20Bukittinggi%2C%20Sumatera%20Barat!5e0!3m2!1sid!2sid!4v1731044237381!5m2!1sid!2sid"  frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div><!-- End Google Maps -->
    </div>

  </div>

</section><!-- /Contact Section -->

</main>

<?php include('footer.php'); ?>