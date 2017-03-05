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
    public static function register ($name, $email, $password) {

        $db = Db::getConnection();

        $sql = "
                INSERT INTO users(name, email, password)
                VALUES(:name, :email, :password)
                ";

        $res = $db->prepare($sql);
        $res->bindParam(':name', $name, PDO::PARAM_STR);
        $res->bindParam(':email', $email, PDO::PARAM_STR);
        $res->bindParam(':password', $password, PDO::PARAM_STR);

        return $res->execute();
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
     * Проверем email на доступность
     *
     * @param $email
     * @return bool
     */
    public static function checkEmailExists ($email) {

        $db = Db::getConnection();

        $sql = "
               SELECT count(*) FROM users
                    WHERE email = :email
               ";

        $res = $db->prepare($sql);
        $res->bindParam(':email', $email, PDO::PARAM_STR);
        $res->execute();

        if ($res->fetchColumn())
            return true;
        return false;
    }

    /**
     * Проверка на существовние введенных данных при ааторизации
     *
     * @param $email
     * @param $password
     * @return bool
     */
    public static function checkUserData ($email, $password) {

        $db = Db::getConnection();

        $sql = "
                SELECT id, name, email, password, role
                FROM users
                WHERE email = :email
                ";

        $res = $db->prepare($sql);

        $res->bindParam(':email', $email, PDO::PARAM_INT);

        $res->execute();

        $user = $res->fetch();

        if (password_verify($password, $user['password'])) {
            return $user['id'];
        }

        return false;
    }

    /**
     *Запись пользователя в сессию
     *
     * @param $userId
     */
    public static function auth ($userId) {

        Session::set('userId',$userId);

        Session::set('logged',true);
    }

    /**
     * Проверяем, авторизован ли пользователь при переходе в личный кабинет
     *
     * @return mixed
     */
    public static function checkLog () {

        //Если сессия есть, то возвращаем id пользователя
        if ((Session::get('userId'))) {
            return Session::get('userId');
        }

        header('Location: user/login');
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

    /**
     * Вытягиваем информацию о пользователе по id
     *
     * @param $userId
     * @return mixed
     */
    public static function getUserById ($userId) {

        $db = Db::getConnection();

        $sql = "
                SELECT id, name, email, password, role
                  FROM users
                    WHERE id = :id
                ";

        $res = $db->prepare($sql);

        $res->bindParam(':id', $userId);

        $res->execute();

        return $res->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * редактируем информацию из личного кабинета
     *
     * @param $userId
     * @param $name
     * @param $password
     * @return bool
     */
    public static function edit ($userId, $name, $password){

        $db = Db::getConnection();

        $sql = "
               UPDATE users
                    SET name = :name, password = :password
                      WHERE id = :id
               ";

        $res = $db->prepare($sql);

        $res->bindParam(':name', $name, PDO::PARAM_STR);
        $res->bindParam(':password', $password, PDO::PARAM_STR);
        $res->bindParam(':id', $userId, PDO::PARAM_INT);

        return $res->execute();
    }

}
