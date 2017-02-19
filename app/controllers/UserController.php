<?php
/**
 * Class UserController для работы с пользователем
 */
 class UserController extends Controller {

    // define variables and set to empty values
    protected $result = false;
    protected $name = '';
    protected $lname = '';
    protected $email = '';
    protected $password = '';
    //Флаг ошибок
    public $errors = false;

    public function __construct(){
        parent::__construct();
    }

    protected function checkEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    protected function checkName($name) {
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            return false;
        }
        return true;
    }

    protected function checkPassword($password) {
        if (!(strlen($password)>=6) ){
            return false;
        }
        return true;
    }

    /**
     * Авторизация пользователя
     *
     * @return bool
     */
    public function actionLogin () {
        ob_start();
        if (isset($_POST) and (!empty($_POST))) {

            $this->email = trim(strip_tags($_POST['email']));
            $this->password = $_POST['password'];

            //Валидация полей
            if (!$this->checkEmail($this->email)) {
                $this->errors[] = "Некорректный Email";
            }

            //Проверяем, существует ли пользователь
            if ($this->password != '1234567') {
                $this->errors[] = "Пользователя с таким email или паролем не существует";

            }else{

                User::auth(0); //записываем пользователя в сессию
                header("Location: /profile"); //перенаправляем в личный кабинет
            }
        }

        $data['title'] = 'Login Page ';
        $this->_view->rendertemplate('header',$data);
        $this->_view->render('user/login',$data);
        $this->_view->rendertemplate('footer',$data);

    }

        /**
         * Регистрация пользователя
         *
         * @return bool
         */
        public function actionSignup() {

        $this->name = '';

        if (isset($_POST) and (!empty($_POST))) {
            $this->name = trim(strip_tags($_POST['name']));
            $this->lname = trim(strip_tags($_POST['lname']));
            $this->email = trim(strip_tags($_POST['email']));
            $this->password = trim(strip_tags($_POST['password']));

        //Валидация полей
        if (!$this->checkName($this->name)) {
            $this->errors[] = "Only letters and white space allowed. Your entry is: $this->name";
        }

        if (!$this->checkEmail($this->email)) {
            $this->errors[] = "Invalid email format. Your entry is: $this->email";
        }

        if (!$this->checkPassword($this->password)) {
            $this->errors[] = "Password must be six or more symbols. Your entry is: $this->password";
        }

         if ($this->errors == false) {
             $this->result = true;
         }
        }

        $data['title'] = 'Signup Page ';
        $this->_view->rendertemplate('header',$data);
        $this->_view->render('user/signup',$data);
        $this->_view->rendertemplate('footer',$data);

    }
    /**
     * Выход из учетной записи
     *
     * @return bool
     */
    public function actionLogout () {
        unset($_SESSION['user']);
        header('Location: /');
        return true;
    }

}
