<?php

/**
 * Контроллер для управления категориями
 */
class AdminCategoryController extends Controller{

    /**
     * Главная страница управления категориями
     *
     * @return bool
     */
    public function actionIndex (){

            $data['categories'] = Category::getCategoryListAdmin();
            $data['title'] = 'Admin Category List Page ';
            $this->_view->rendertemplate('admin/header',$data);
            $this->_view->render('admin/category/index',$data);
            $this->_view->rendertemplate('admin/footer',$data);
    }

    /**
     * Удаление категории
     *
     * @param $id категории
     * @return bool
     */
    public function actionDelete ($id) {

        //Проверяем форму
        if (isset($_POST['submit'])) {
            //Если отправлена, то удаляем нужный товар
            Category::deleteCategoryById($id);
            //и перенаправляем на страницу товаров
            header('Location: /admin/category');
        }
        $data['title'] = 'Admin Category Delete Page ';
        $data['category_id'] = $id;
        $this->_view->rendertemplate('admin/header',$data);
        $this->_view->render('admin/category/delete',$data);
        $this->_view->rendertemplate('admin/footer',$data);

    }

    /**
     * Добавление категории
     *
     * @return bool
     */
    public function actionAdd () {

        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {
            $options['parent_id'] = trim(strip_tags($_POST['parent_id']));
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['sort_order'] = trim(strip_tags($_POST['sort_order']));
            $options['status'] = trim(strip_tags($_POST['status']));

            Category::addCategory($options);
            header('Location: /admin/category');
        }
        $data['title'] = 'Admin Category Add Page ';
        $this->_view->rendertemplate('admin/header',$data);
        $this->_view->render('admin/category/add',$data);
        $this->_view->rendertemplate('admin/footer',$data);
    }

    /**
     * Редактирование категории
     *
     * @param $id категории
     * @return bool
     */
    public function actionEdit ($id) {

        // Получаем список категорий для выпадающего списка
        $category = Category::getCategoryById($id);

        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {
            $options['parent_id'] = trim(strip_tags($_POST['parent_id']));
            $options['name'] = trim(strip_tags($_POST['name']));
            $options['sort_order'] = trim(strip_tags($_POST['sort_order']));
            $options['status'] = trim(strip_tags($_POST['status']));
            Category::editCategory($id, $options);


            header('Location: /admin/category');
        }
        $data['title'] = 'Admin Category Edit Page ';
        $data['category'] = $category;
        $this->_view->rendertemplate('admin/header',$data);
        $this->_view->render('admin/category/edit',$data);
        $this->_view->rendertemplate('admin/footer',$data);

    }
}
