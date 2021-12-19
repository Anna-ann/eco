<?php
  require "db.php";

  $data = $_POST;
  if ( isset($data['do_signup']) )
  {
    //здесь регистрируем

    $errors = array();
    if (trim($data['user_name']) == '')
    {
      $errors[] = 'Введите Имя!';
    }
    if (trim($data['phone']) == '')
    {
      $errors[] = 'Введите номер телефона!';
    }
    if ($data['password'] == '')
    {
      $errors[] = 'Введите пароль!';
    }
    if ($data['password2'] != $data['password'] )
    {
      $errors[] = 'Повторный пароль введен не верно!';
    }
    if (R::count('users', "phone = ?", array($data['phone'])) > 0 )
    {
      $errors[] = 'Пользователь с таким номером уже существует';
    }
    if (empty($errors))
    {
      $user = R::dispense('users');
      $user->user_name = $data['user_name'];
      $user->phone = $data['phone'];
      $user->password = password_hash($data['password'],
        PASSWORD_DEFAULT);
      R::store($user);
      header ("Location: cabinet.php");
    }else
    {
      echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
    }
  }
?>

<section id="participate" class="padd-section">
  <div class="container" data-aos="fade-up">
    <div class="section-title text-center">
      <h2>Принять участие</h2>
    </div>

    <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
      <div class="col-lg-5 col-md-8">
        <div class="form">

          <form action="participate.php" method="post" class="form">
            <div class="form-group">
              <input type="text" name="user_name" class="form-control" placeholder="Ваше Имя" value="<?php echo $data['user_name']; ?>">
            </div>
            <div class="form-group mt-3">
              <input name="phone" type="tel" id="phone" class="form-control" placeholder="Ваш номер телефона" value="<?php echo $data['phone']; ?>">
            </div>
            <div class="form-group mt-3">
              <input type="password" name="password" class="form-control" placeholder="Ваш пароль" value="<?php echo $data['password']; ?>">
            </div>
            <div class="form-group mt-3">
              <input type="password" name="password2" class="form-control" placeholder="Введите ваш пароль еще раз" value="<?php echo $data['password2']; ?>">
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
                  ">Зарегистрироваться
              </button>
            </div>
            <p style="text-align: center;">
              Вы уже с нами ? <a href="login.php">Войти в кабинет</a>
            </p>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>
