<?php require "db.php"; ?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Жасыл қалқанмен ZQ 2021 жаңа жылдық акциясы</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Roboto:100,300,400,500,700|Philosopher:400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/cabinet.css" rel="stylesheet">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="assets/js/script.js" defer></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div id="logo">
        <a href="index.php"><img src="assets/img/logo.png" alt="" title="" /></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <?php if (isset($_SESSION['logged_user'])):?>
            Сәлеметсіз бе, <?php echo $_SESSION['logged_user']->user_name; ?>!
            <a href="logout.php">Шығу</a>
          <?php else :  ?>
            Тіркелмегенсіз!<br>
            <a href="login.php">Кіру</a>
            <a href="index.php #participate">Тіркелу</a>
          <?php endif; ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <?php include 'balls.php'; ?>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="fade-in">
      <section id="cupon">
        <form action="score.php" method="post" class="form">

          <div class="form-group mt-3">
            <input type="text" class="form-control" name="cupon" maxlength="6" style="
    width: 300px;" placeholder="Әріптік-сандық кодты енгізіңіз" value="<?php echo $data['cupon']; ?>">
          </div>
          <div class="text-center">
            <button type="submit" name="do_signup" style="
            font-family: &quot;Roboto&quot;, sans-serif;
            text-transform: uppercase;
            font-weight: 400;
            font-size: 13px;
            letter-spacing: 1px;
            display: inline-block;
            padding: 11px 36px;
            border-radius: 50px;
            transition: 0.5s;
            margin-top: 30px;
            margin-bottom: 30px;
            border: 2px solid #71c55d;
            background: #fff;
            color: #71c55d;
            text-decoration: none;
            ">Добавить
          </button>
        </div>
      </form>
    </section>
      <section id="people" class="padd-section text-center">

        <div class="container" data-aos="fade-up">
          <div class="section-title text-center">
            <h2>Участники</h2>
          </div>

          <table class="content-table">
            <thead>
              <tr>
                <th>Rank</th>
                <th>Имя</th>
                <th>Баллы</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Domenic</td>
                <td>88,110</td>
              </tr>
              <tr class="active-row">
                <td>2</td>
                <td>Sally</td>
                <td>72,400</td>
              </tr>
              <tr>
                <td>3</td>
                <td>Nick</td>
                <td>52,300</td>
              </tr>
            </tbody>
          </table>


        </div>

      </section>

    </div>
  </section><!-- End Hero Section -->


  <footer class="footer">
    <div class="container">
      <div class="row">

        <div class="col-md-6 col-lg-4">
          <div class="download">

            <h2 class="navbar-brand" href="#">Загрузите приложение</h2>
            <a href="https://apps.apple.com/us/app/zhasyl-qalqan/id1475748173?l=ru&ls=1"><img src="assets/img/apple.png" alt=""></a>
            <a href="https://play.google.com/store/apps/details?id=project.irokez.kg.zhasylqalqan"><img src="assets/img/Google.png" style="width: 128px;"></a>

          </div>
        </div>

        <div class="col-md-6 col-lg-8">
          <div class="footer-logo">
            <a href="#hero"><img src="assets/img/logo.png" style="width:8%"></a>
            <a href="https://zhasylqalqan.kz/"><img src="assets/img/shield.png" alt=""></a>

          </div>
        </div>

      </div>

      <div class="copyrights">
        <div class="container">
          <p>&copy; Copyrights Zhasyl Qalqan. All rights reserved.</p>
          <div class="credits">
            Designed by Burabayeva Aidana
          </div>
        </div>
      </div>

  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/snowfall.js"></script>
  <script src="assets/js/jquery.js" type="text/javascript"></script>
  <script src="assets/js/src/jquery.maskedinput.js" type="text/javascript"></script>


  <script type="text/javascript">
    jQuery(function($) {
      $("#phone").mask("+7 (999) 999-9999");
    });
  </script>



</body>

</html>
