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


    public function actionView ($slug){

        $post = Blog::getPostBySlug($slug);

        $res = Comment::getCommentById($post['id']);

        $comments = array();

        foreach ($res as $row) {
            $comments[] = new Comment($row);
        }

        $data['post'] = $post;
        $data['comments'] = $comments;
        $data['title'] = 'Post Page ';
        $this->_view->rendertemplate('header',$data);
        $this->_view->render('blog/view',$data);
        $this->_view->rendertemplate('footer',$data);

    }

    }
