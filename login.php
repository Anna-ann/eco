<?php
  require "db.php";

  $data = $_POST;
  if (isset($data['do_login'])) {
    $errors = array();
    $user = R::findOne('users', 'phone = ?', array($data['phone']));
    if ($user )
    {
      if (password_verify($data['password'], $user->password))
      {
        $_SESSION['logged_user'] = $user;
        header('Location: cabinet.php');
      }else
      {
        $errors[] = 'Неверно введен пароль!';
      }
    }else
    {
      $errors[] = 'Пользователь с таким номером не найден!';
    }

    if(! empty($errors) )
    {
      echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
    }
  }

?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Войти в личный кабинет</title>
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

  <link href="assets/css/style0.css" rel="stylesheet">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="assets/js/script.js" defer></script>
</head>

<body>

  <form action="login.php" method="post" class="form" style="margin: 0 auto;width: 300px;padding-top: 250px;text-align: center;">
    <p>
      <input name="phone" type="tel" id="phone" class="rfield" placeholder="Номер телефона" value="<?php echo $data['phone']; ?>">
    </p>
    <p>
      <input type="password" name="password" placeholder="Пароль" value="<?php echo $data['password']; ?>">
    </p>

    <p>
      <button type="submit" name="do_login">Войти</button>
    </p>

  </form>

  <script src="assets/js/src/jquery.maskedinput.js" type="text/javascript"></script>


  <script type="text/javascript">
    jQuery(function($) {
      $("#phone").mask("+7 (999) 999-9999");
    });
  </script>

</body>

</html>
