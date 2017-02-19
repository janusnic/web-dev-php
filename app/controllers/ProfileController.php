<?php

/**
 * Class ProfileController
 * Контроллер Profile страницы
 */
class ProfileController {
    public function actionIndex () {

        require_once(ROOT . '/app/views/profile/index.php');

        return true;
    }
}
