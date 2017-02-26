<?php

/**
 * Модель для работы с товарами
 */
class Product {

    //Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 6;

    /**
     * Получаем последние товары
     *
     * @param int $page
     * @return array
     */
    public static function getLatestProducts ($page = 1) {

        $limit = self::SHOW_BY_DEFAULT;

        //Задаем смещение
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = db::getConnection();

        $sql = "
                SELECT id, name, price, is_new
                  FROM product
                    WHERE status = 1
                      ORDER BY id DESC
                        LIMIT :limit OFFSET :offset
                ";

        //Подготавливаем данные
        $res = $db->prepare($sql);
        $res->bindParam(':limit', $limit, PDO::PARAM_INT);
        $res->bindParam(':offset', $offset, PDO::PARAM_INT);

        //Выполняем запрос
        $res->execute();

        //Получаем и возвращаем результат
        $productsList = $res->fetchAll(PDO::FETCH_ASSOC);

        return $productsList;
    }

    /**
     * Возвращает путь к изображению
     * @param integer $id
     * @return string <p>Путь к изображению</p>
     */
    public static function getImage ($id) {

        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = "/app/media/upload/images/products/$id/";

        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }


}
