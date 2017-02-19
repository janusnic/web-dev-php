<?php

/**
 * Class AboutController
 * Контроллер About страницы
 */
class AboutController {
    public function actionIndex () {

        require_once(ROOT . '/app/views/about/index.php');

        return true;
    }
}
