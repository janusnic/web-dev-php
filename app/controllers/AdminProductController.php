<?php

/**
 *Контроллер для просмотра и управления списком всех товаров, имеющихся в базе
 */
class AdminProductController extends Controller {

    /**
     * Просмотр всех товаров
     * @return bool
     */
    public function actionIndex () {
        $data['products'] = Product::getProductsList();
        $data['title'] = 'Admin Product List Page ';
        $this->_view->rendertemplate('admin/header',$data);
        $this->_view->render('admin/list',$data);
        $this->_view->rendertemplate('admin/footer',$data);
    }

    /**
     * Удаление конкретного товара
     *
     * @param $id товара
     * @return bool
     */
    public function actionDelete ($id) {

        //Проверяем форму
        if (isset($_POST['submit'])) {
            //Если отправлена, то удаляем нужный товар
            Product::deleteProductById($id);
            //и перенаправляем на страницу товаров
            header('Location: /admin/product');
        }

        $data['product_id'] = $id;
        $data['title'] = 'Admin Product Delete Page ';
        $this->_view->rendertemplate('admin/header',$data);
        $this->_view->render('admin/delete',$data);
        $this->_view->rendertemplate('admin/footer',$data);
    }

    /**
     * Добавление товара
     *
     * @return bool
     */
    public function actionAdd () {

        //Список категорий для выпадающего списка
        $categories = Category::getCategoryListAdmin();

        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['code'] = trim(strip_tags($_POST['code']));
            $options['price'] = trim(strip_tags($_POST['price']));
            $options['category'] = trim(strip_tags($_POST['category']));
            $options['brand'] = trim(strip_tags($_POST['brand']));
            $options['description'] = trim(strip_tags($_POST['description']));
            $options['availability'] = trim(strip_tags($_POST['availability']));
            $options['is_new'] = trim(strip_tags($_POST['is_new']));
            $options['status'] = trim(strip_tags($_POST['status']));

            //Если все ок, записываем новый товар
            $id = Product::addProduct($options);
            $dir = $_SERVER['DOCUMENT_ROOT'] ."/app/media/upload/images/products/".$id."/";
             if (!is_dir($dir)) {
                 mkdir($dir, 0777, true);
             }

            // Если запись добавлена
            if ($id) {
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    // Если загружалось, переместим его в нужную папку, дадим новое имя
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/app/media/upload/images/products/{$id}/{$id}.jpg");
                }
            };
            header('Location: /admin/product');
        }
        $data['title'] = 'Admin Product Add Page ';
        $data['categories'] = $categories;
        $this->_view->rendertemplate('admin/header',$data);
        $this->_view->render('admin/add',$data);
        $this->_view->rendertemplate('admin/footer',$data);
    }

    /**
     * Редатирование товара
     *
     * @param $id
     * @return bool
     */
    public function actionEdit ($id) {
        //Получаем информацию о выбранном товаре
        $product = Product::getProductById($id);
        //Список категорий для выпадающего списка
        $categories = Category::getCategoryListAdmin();

        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['code'] = trim(strip_tags($_POST['code']));
            $options['price'] = trim(strip_tags($_POST['price']));
            $options['category'] = trim(strip_tags($_POST['category']));
            $options['brand'] = trim(strip_tags($_POST['brand']));
            $options['description'] = trim(strip_tags($_POST['description']));
            $options['availability'] = trim(strip_tags($_POST['availability']));
            $options['is_new'] = trim(strip_tags($_POST['is_new']));
            $options['status'] = trim(strip_tags($_POST['status']));

            Product::editProduct($id, $options);
            // Если запись добавлена
            if ($id) {
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                    move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/app/media/upload/images/products/{$id}/{$id}.jpg");
                }
            };

            header('Location: /admin/product');
        }
        $data['product'] = Product::getProductById($id);
        $data['categories'] = $categories;

        $data['title'] = 'Admin Product Edit Page ';
        $this->_view->rendertemplate('admin/header',$data);
        $this->_view->render('admin/edit',$data);
        $this->_view->rendertemplate('admin/footer',$data);
    }
}
