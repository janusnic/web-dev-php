<?php

/**
 * Модель для работы с товарами
 */
class Blog {

    const SHOW_BY_DEFAULT = 6;

    public static function getLatestPosts ($page = 1) {

        $limit = self::SHOW_BY_DEFAULT;

        //Задаем смещение
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        $db = db::getConnection();

        $sql = "
                SELECT id, title, slug, description, content, DATE_FORMAT(`date`, '%d.%m.%Y %H:%i:%s') AS formated_date, status
                  FROM blog_post
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
        $postList = $res->fetchAll(PDO::FETCH_ASSOC);

        return $postList;
    }

    public static function getPostById ($postId) {

        $db = Db::getConnection();

        $sql = "
        SELECT id, title, slug, description, content, DATE_FORMAT(`date`, '%d.%m.%Y %H:%i:%s') AS formated_date, status
          FROM blog_post
                    WHERE id = :id
               ";

        $res = $db->prepare($sql);
        $res->bindParam(':id', $postId, PDO::PARAM_INT);
        $res->execute();

        $post = $res->fetch(PDO::FETCH_ASSOC);

        return $post;
    }

    public static function getPostBySlug ($postSlug) {

        $db = Db::getConnection();

        $sql = "
        SELECT id, title, slug, description, content, DATE_FORMAT(`date`, '%d.%m.%Y %H:%i:%s') AS formated_date, status
          FROM blog_post
                    WHERE slug = :slug
               ";

        $res = $db->prepare($sql);
        $res->bindParam(':slug', $postSlug, PDO::PARAM_STR);
        $res->execute();

        $post = $res->fetch(PDO::FETCH_ASSOC);

        return $post;
    }
    public static function getPostList () {

        $db = Db::getConnection();

        $sql = "
                SELECT id, title, slug, description, content, DATE_FORMAT(`date`, '%d.%m.%Y %H:%i:%s') AS formated_date, status
                  FROM blog_post
                ORDER BY id ASC
                ";

        $res = $db->query($sql);

        $posts = $res->fetchAll(PDO::FETCH_ASSOC);
        return $posts;

    }

    public static function addPost ($options) {

        $db = Db::getConnection();

        $sql = "
                INSERT INTO blog_post(title, slug, description, content,  status)
                VALUES (:title, :slug, :description, :content,  :status)
                ";

        $res = $db->prepare($sql);

        $slug = Slug::makeSlug($options['title']);

        $res->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $res->bindParam(':slug', $slug, PDO::PARAM_STR);
        $res->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $res->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $res->bindParam(':status', $options['status'], PDO::PARAM_INT);

        //Если запрос выполнен успешно
        if ($res->execute()) {
            return $db->lastInsertId();
        } else {
            return 0;
        }
    }

    public static function updatePost ($id, $options) {

        $db = Db::getConnection();

        $sql = "
                UPDATE blog_post
                SET
                    title = :title,
                    slug = :slug,
                    description = :description,
                    content = :content,
                    status = :status
                WHERE id = :id
                ";

        $res = $db->prepare($sql);

        $res->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $res->bindParam(':slug', $options['slug'], PDO::PARAM_STR);
        $res->bindParam(':description', $options['description'], PDO::PARAM_STR);
        $res->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $res->bindParam(':status', $options['status'], PDO::PARAM_INT);
        $res->bindParam(':id', $id, PDO::PARAM_INT);

        return $res->execute();
    }

    public static function deletePostById ($id) {
        $db = Db::getConnection();

        $sql = "
                DELETE FROM blog_post WHERE id = :id
                ";

        $res = $db->prepare($sql);
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    }

    public static function getStatusText ($status) {
        switch ($status) {
            case '1':
                return 'Отображается';
                break;
            case '0':
                return 'Скрыта';
                break;
        }
    }

}
