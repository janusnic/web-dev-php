<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
include (ROOT. '/views/parts/header.php');
?>

<?php
// define variables and set to empty values

ob_start();

$email = '';
$password = '';

function checkEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

if (isset($_POST) and (!empty($_POST))) {

    $email = trim(strip_tags($_POST['email']));
    $password = $_POST['password'];

    //Флаг ошибок
    $errors = false;

    //Валидация полей
    if (!checkEmail($email)) {
        $errors[] = "Некорректный Email";
    }

    //Проверяем, существует ли пользователь
    //$userId = User::checkUserData($email, $password);

    if ($password != '1234567') {
        $errors[] = "Пользователя с таким email или паролем не существует";

    }else{
        //User::auth($userId); //записываем пользователя в сессию
        header("Location: http://127.0.0.1:3000/"); //перенаправляем в личный кабинет
    }

}
?>

<main>
    <?php if (isset($errors) && is_array($errors)):?>
        <ul class="errors">
            <?php foreach($errors as $error):?>
                <li> - <?php echo $error;?></li>
            <?php endforeach;?>
        </ul>
    <?php endif;?>

            <div class="form">
                    <div id="login">
                      <h1>Welcome Back!</h1>

                      <form action="" method="post">

                        <div class="field-wrap">
                        <label>
                          Email Address<span class="req">*</span>
                        </label>
                        <input type="email" name="email" required autocomplete="off"/>
                      </div>

                      <div class="field-wrap">
                        <label>
                          Password<span class="req">*</span>
                        </label>
                        <input type="password" name="password" required autocomplete="off"/>
                      </div>

                      <p class="forgot"><a href="#">Forgot Password?</a></p>

                      <input type="submit" class="button button-block" value="Log In" />

                      </form>

                  </div><!-- tab-content -->

            </div> <!-- /form -->

    </main>



<?php

include (ROOT . '/views/parts/footer.php');
?>
