<?php

/**
 * Контроллер для управления заказами
 */
class AdminOrderController extends Admin {

    /**
     * Главная, отображает все заказы пользователей
     *
     * @return bool
     */
    public function actionIndex (){

        //проверка доступа
        $this->checkAdmin();

        $data['orders'] = Order::getOrdersList();
        $data['title'] = 'Admin Orders List Page ';
        $this->_view->rendertemplate('admin/header',$data);
        $this->_view->render('admin/order/index',$data);
        $this->_view->rendertemplate('admin/footer',$data);
    }

    /**
     * Просмотр конкретного заказа
     *
     * @param $id заказа
     * @return bool
     */
    public function actionView ($id){

        //проверка доступа
        $this->checkAdmin();

        //Получаем заказ по id
        $orders = Order::getOrderById($id);

        //Преобразуем JSON  строку продуктов и их кол-ва в массив

        $productQuantity = json_decode(json_decode($orders['products'], true));

        //Выбираем ключи заказанных товаров
        $productIds = array();

        $pQuantity =  array();

        for ($i=0; $i<count($productQuantity); $i++)
        {
                array_push($productIds, $productQuantity[$i] ->{'id'});

                array_push($pQuantity, array($productQuantity[$i] ->{'id'} => $productQuantity[$i] ->{'quantity'}));
        }


        //Получаем список товаров по выбранным id

        $products = Product::getProductsByIds($productIds);

        $data['orders'] = $orders;
        $data['pQuantity'] = $pQuantity;
        $data['products'] = $products;
        $data['title'] = 'Admin Order View Page ';
        $this->_view->rendertemplate('admin/header',$data);
        $this->_view->render('admin/order/view',$data);
        $this->_view->rendertemplate('admin/footer',$data);

    }

    /**
     * Изменение заказа
     *
     * @param $id
     * @return bool
     */
    public function actionEdit ($id){

        //проверка доступа
        $this->checkAdmin();

        //Получаем заказ по id
        $order = Order::getOrderById($id);

        //Если форма отправлена, принимаем данные и обрабатываем
        if(isset($_POST) and !empty($_POST)){
            $userName = trim(strip_tags($_POST['name']));
            $userPhone = trim(strip_tags($_POST['phone']));
            $userComment = trim(strip_tags($_POST['comment']));
            $status = trim(strip_tags($_POST['status']));

            //Записываем изменения
            Order::updateOrder($id, $userName, $userPhone, $userComment, $status);

            //Перенаправляем на страницу просмотра данного заказа
            header("Location: /admin/orders/view/$id");
        }

        $data['order'] = $order;
        $data['title'] = 'Admin Order Edit Page ';
        $this->_view->rendertemplate('admin/header',$data);
        $this->_view->render('admin/order/edit',$data);
        $this->_view->rendertemplate('admin/footer',$data);

    }

    /**
     * Удаление заказа
     *
     * @param $id
     * @return bool
     */
    public function actionDelete ($id) {

        //проверка доступа
        $this->checkAdmin();

        //Проверяем форму
        if (isset($_POST['submit'])) {
            //Если отправлена, то удаляем нужный товар
            Order::deleteOrderById($id);
            //и перенаправляем на страницу заказов
            header('Location: /admin/orders');
        }

        $data['id'] = $id;
        $data['title'] = 'Admin Order Delete Page ';
        $this->_view->rendertemplate('admin/header',$data);
        $this->_view->render('admin/order/delete',$data);
        $this->_view->rendertemplate('admin/footer',$data);

    }
}
