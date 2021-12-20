<?php
  require "db.php";

  $data = $_POST;
  if ( isset($data['do_signup']) )
  {
    //здесь регистрируем

    $errors = array();
    if (trim($data['user_name']) == '')
    {
      $errors[] = 'Атыңызды енгізіңіз!';
    }
    if (trim($data['phone']) == '')
    {
      $errors[] = 'Телефон нөмірін енгізіңіз!';
    }
    if ($data['password'] == '')
    {
      $errors[] = 'Құпия сөзді еңгізіңіз!';
    }
    if ($data['password2'] != $data['password'] )
    {
      $errors[] = 'Қайталанатын құпия сөз қате енгізілді!';
    }
    if (R::count('users', "phone = ?", array($data['phone'])) > 0 )
    {
      $errors[] = 'Бұл нөмермен тіркелген пайдаланушы бар';
    }
    if (empty($errors))
    {
      $user = R::dispense('users');
      $user->user_name = $data['user_name'];
      $user->phone = $data['phone'];
      $user->password = password_hash($data['password'],
        PASSWORD_DEFAULT);
      R::store($user);
      header ("Location: cabinetkz.php");
    }else
    {
      echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
    }
  }
?>

<section id="participate" class="padd-section">
  <div class="container" data-aos="fade-up">
    <div class="section-title text-center">
      <h2>Қатысу</h2>
    </div>

    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-5 col-md-8">
        <div class="form">

          <form action="participatekz.php" method="post" class="form">
            <div class="form-group">
              <input type="text" name="user_name" class="form-control" placeholder="Сіздің атыңыз" value="<?php echo $data['user_name']; ?>">
            </div>
            <div class="form-group mt-3">
              <input name="phone" type="tel" id="phone" class="form-control" placeholder="Телефон нөмірі" value="<?php echo $data['phone']; ?>">
            </div>
            <div class="form-group mt-3">
              <input type="password" name="password" class="form-control" placeholder="Жаңа құпия сөз" value="<?php echo $data['password']; ?>">
            </div>
            <div class="form-group mt-3">
              <input type="password" name="password2" class="form-control" placeholder="Құпия сөзді растаңыз" value="<?php echo $data['password2']; ?>">
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
                  ">Тіркелу
              </button>
            </div>
            <p style="text-align: center;">
              Тіркелгенсізбе ? <a href="login.php">Кабинетке кіру</a>
            </p>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>
