<?php

class AdminBlogController extends Admin {

    public function actionIndex (){

        //проверка доступа
        //$this->checkAdmin();

        $data['posts'] = Blog::getPostList();
        $data['title'] = 'Admin Blog List Page ';
        $this->_view->rendertemplate('admin/header',$data);
        $this->_view->render('admin/blog/index',$data);
        $this->_view->rendertemplate('admin/footer',$data);
    }

    public function actionAdd () {
        //проверка доступа
        // $this->checkAdmin();
        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {
            $options['title'] = trim(strip_tags($_POST['title']));
            $options['description'] = trim(strip_tags($_POST['description']));
            $options['content'] = trim(strip_tags($_POST['content']));
            $options['status'] = trim(strip_tags($_POST['status']));

            $id = Blog::addPost($options);
            header('Location: /admin/blog');

        }
        $data['title'] = 'Admin Blog Add Page ';

        $this->_view->rendertemplate('admin/header',$data);
        $this->_view->render('admin/blog/add',$data);
        $this->_view->rendertemplate('admin/footer',$data);
    }



    public function actionEdit ($id){

        //проверка доступа
        //$this->checkAdmin();

        //Получаем заказ по id
        $post = Blog::getPostById($id);

        //Если форма отправлена, принимаем данные и обрабатываем
        if(isset($_POST) and !empty($_POST)){

            $options['title'] = trim(strip_tags($_POST['title']));
            $options['description'] = trim(strip_tags($_POST['description']));
            $options['content'] = trim(strip_tags($_POST['content']));
            $options['status'] = trim(strip_tags($_POST['status']));

            //Записываем изменения
            Blog::updatePost($id, $options);

            header('Location: /admin/blog');
        }

        $data['post'] = $post;
        $data['title'] = 'Admin Post Edit Page ';
        $this->_view->rendertemplate('admin/header',$data);
        $this->_view->render('admin/blog/edit',$data);
        $this->_view->rendertemplate('admin/footer',$data);

    }

    public function actionDelete ($id) {

        //проверка доступа
        //$this->checkAdmin();

        //Проверяем форму
        if (isset($_POST['submit'])) {
            Blog::deletePostById($id);
            header('Location: /admin/blog');
        }

        $data['id'] = $id;
        $data['title'] = 'Admin Post Delete Page ';
        $this->_view->rendertemplate('admin/header',$data);
        $this->_view->render('admin/blog/delete',$data);
        $this->_view->rendertemplate('admin/footer',$data);

    }
}
