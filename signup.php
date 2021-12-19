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
          <form action="signup.php" method="post" class="form">
            <div class="form-group">
              <input type="text" name="user_name"class="form-control" placeholder="Ваше Имя" value="<?php echo $data['user_name']; ?>">
            </div>
            <div class="form-group mt-3">
              <input name="phone" type="tel" id="phone" class="form-control" placeholder="Номер телефона" value="<?php echo $data['phone']; ?>">
            </div>
            <div class="form-group mt-3">
              <input type="password" name="password" class="form-control" placeholder="Новый Пароль"  value="<?php echo $data['password']; ?>">
            </p>
            </div>
            <div class="form-group mt-3">
              <input type="password" class="form-control" name="password2" placeholder="Подтвердите Пароль" value="<?php echo $data['password2']; ?>">
            </div>
            <div class="my-3">
              <div class="sent-message"></div>
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
                margin-bottom: 30px;
                border: 2px solid #71c55d;
                background: #fff;
                color: #71c55d;
                text-decoration: none;
                  ">Зарегистрироваться
            </button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
