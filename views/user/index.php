<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');
include (ROOT. '/views/parts/header.php');
?>

<?php
// define variables and set to empty values

$result = false;
$name = '';
$lname = '';
$email = '';
$password = '';


function checkName($name) {
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        return false;
    }
    return true;
}

function checkEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

function checkPassword($password) {
    if (!(strlen($password)>=6) ){
        return false;
    }
    return true;
}


if (isset($_POST) and (!empty($_POST))) {
    $name = trim(strip_tags($_POST['name']));
    $lname = trim(strip_tags($_POST['lname']));
    $email = trim(strip_tags($_POST['email']));
    $password = trim(strip_tags($_POST['password']));

    //Флаг ошибок
    $errors = false;

//Валидация полей
if (!checkName($name)) {
    $errors[] = "Only letters and white space allowed. Your entry is: $name";
}

if (!checkEmail($email)) {
    $errors[] = "Invalid email format. Your entry is: $email";
}

if (!checkPassword($password)) {
    $errors[] = "Password must be six or more symbols. Your entry is: $password";
}


 if ($errors == false) {
     $result = true;
     //User::register($name, $email, password_hash($password, PASSWORD_DEFAULT));
 }
}
?>

<main>
    <?php if($result):?>
        <h4 id="reg_thanks">Спасибо за регистрацию!</h4>
        <h3 id="reg_main">Вернуться на <a href="/" id="reg_main_a">Главную</a></h3>
    <?php else: ?>
        <?php if (isset($errors) && is_array($errors)):?>
            <ul class="errors">
                <?php foreach($errors as $error):?>
                    <li> - <?php echo $error;?></li>
                <?php endforeach;?>
            </ul>
        <?php endif;?>
            <div class="form">
                    <div id="signup">
                      <h1>Sign Up for Free</h1>

                      <form method="post">

                      <div class="top-row">
                        <div class="field-wrap">
                          <label>
                            First Name<span class="req">*</span>
                          </label>
                          <input type="text" name="name" value="<?php echo $name;?>" required autocomplete="off" />
                        </div>

                        <div class="field-wrap">
                          <label>
                            Last Name<span class="req">*</span>
                          </label>
                          <input type="text" name="lname" value="<?php echo $lname;?>" required autocomplete="off"/>
                        </div>
                      </div>

                      <div class="field-wrap">
                        <label>
                          Email Address<span class="req">*</span>
                        </label>
                        <input type="email" name="email" value="<?php echo $email;?>" required autocomplete="off"/>
                      </div>

                      <div class="field-wrap">
                        <label>
                          Set A Password<span class="req">*</span>
                        </label>
                        <input type="password" name="password" value="<?php echo $password;?>" required autocomplete="off"/>
                      </div>

                      <input type="submit" class="button button-block" value="Get Started" formaction="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"/>

                      </form>

                    </div>
            </div> <!-- /form -->
            <?php endif;?>
    </main>
    
<?php
include (ROOT . '/views/parts/cart.php');
include (ROOT . '/views/parts/footer.php');
?>
