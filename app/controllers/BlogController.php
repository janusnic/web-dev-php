<?php

/**
 * Class BlogController
 * Контроллер Blog страницы
 */
class BlogController extends Controller {

    public function __construct(){
        parent::__construct();
    }

    public function actionIndex () {
        $data['title'] = 'Blog Page ';
        $data['posts'] = Blog::getLatestPosts();
        $this->_view->rendertemplate('header',$data);
        $this->_view->render('blog/index',$data);
        $this->_view->rendertemplate('footer',$data);
    }

    public function actionView ($id){
    //public function actionView ($slug){

    //    $post = Blog::getPostBySlug($slug);
     $post = Blog::getPostById($id);

        $data['post'] = $post;
        $data['title'] = 'Post Page ';
        $this->_view->rendertemplate('header',$data);
        $this->_view->render('blog/view',$data);
        $this->_view->rendertemplate('footer',$data);

    }


}
