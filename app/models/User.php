<?php

/**
 * Модель для работы с пользователями
 */
class User {

    /**
     *Запись пользователя в сессию
     *
     * @param $userId
     */
    public static function auth ($userId) {

        $_SESSION['user'] = $userId;
    }

    /**
     * Проверяем наличие открытой сессии у пользователя для
     * отображения на сайте необходимой информации
     *
     * @return bool
     */
    public static function isGuest () {

        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

}
