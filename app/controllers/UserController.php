<?php
/**
 * Class UserController для работы с пользователем
 */
 class UserController extends Controller {

    public function __construct(){
        parent::__construct();
    }

    /**
     * Авторизация пользователя
     *
     * @return bool
     */
    public function actionLogin () {

                $result = false;
                $email = '';
                $password = '';

                if(Session::get('logged') == true){
                    Url::redirect('profile');
                }

                if (isset($_POST) and (!empty($_POST))) {

                    $email = trim(strip_tags($_POST['email']));
                    $password = $_POST['password'];

                    //Флаг ошибок
                    $data['errors'] = false;

                    //Валидация полей
                    if (!User::checkEmail($email)) {
                        $data['errors'][] = "Некорректный Email";
                    }

                    //Проверяем, существует ли пользователь
                    if ($password != '1234567') {
                        $data['errors'][] = "Пользователя с таким email или паролем не существует";
                    }else{
                        User::auth(0, $email); //записываем пользователя в сессию
                        //header("Location: /profile"); //перенаправляем в личный кабинет
                        Url::redirect('profile');
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

            // define variables and set to empty values
            $result = false;
            $name = '';
            $lname = '';
            $email = '';
            $password = '';

        if (isset($_POST) and (!empty($_POST))) {
            $name = trim(strip_tags($_POST['name']));
            $lname = trim(strip_tags($_POST['lname']));
            $email = trim(strip_tags($_POST['email']));
            $password = trim(strip_tags($_POST['password']));

            //Флаг ошибок
            $data['errors'] = false;
            //Валидация полей
            if (!User::checkName($name)) {
                $data['errors'][] = "Имя не может быть короче 2-х символов";
            }

            if (!User::checkEmail($email)) {
                $data['errors'][] = "Некорректный Email";
            }

            if (!User::checkPassword($password)) {
                $data['errors'][] = "Пароль не может быть короче 6-ти символов";
            }

            if ($data['errors'] == false) {
                $result = true;
            }
        }

        $data['success'] = $result;
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
        Session::destroy();
        header("Location: /");
    }
}
