<?php

/**
 * Модель для работы с пользователями
 */
class User {

    /**
     * Если в контроллере все ОК, принимаем данные и записываем в БД
     *
     * @param $name имя
     * @param $email email
     * @param $password пароль
     * @return bool  возвращает true/false
     */


    // define variables and set to empty values
    protected $result = false;
    protected $name = '';
    protected $lname = '';
    protected $email = '';
    protected $password = '';

    public function __construct($email, $password) {
      $this->$email = $email;
      $this->password = $password;
    }

    public function getLogin() {
      return $this->name;
    }

    public function getRights() {
      return $this->rights;
    }

    public function setRights($rights) {
      $this->rights = $rights;
    }

    /**
     * Проверяем поле Имя на корректность
     *
     * @param $name
     * @return bool
     */
    public static function checkName ($name) {
        if (strlen($name) > 1) {
            return true;
        }
        return false;
    }

    /**
     * Проверяем поле Телефон на корректность
     *
     * @param $phone
     * @return bool
     */
    public static function checkPhone ($phone) {
        if (strlen($phone) > 9) {
            return true;
        }
        return false;
    }

    /**
     * Проверяем поле Пароль на корректность
     *
     * @param $password
     * @return bool
     */
    public static function checkPassword ($password) {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /**
     * Проверяем поле Email на корректность
     *
     * @param $email
     * @return bool
     */
    public static function checkEmail ($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    /**
     *Запись пользователя в сессию
     *
     * @param $userId
     */
    public static function auth ($userId, $name) {
            Session::set('userId',$userId);
            Session::set('username',$name);
            Session::set('logged',true);
    }

    /**
     * Проверяем наличие открытой сессии у пользователя для
     * отображения на сайте необходимой информации
     *
     * @return bool
     */
    public static function isGuest () {
        if (Session::get('logged') == true) {
            return false;
        }
        return true;
    }

}
