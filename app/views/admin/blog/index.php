<article class='large'>
        <a href="/admin/blog/add" class="add_item"><i class="fa fa-plus fa-2x" aria-hidden="true"></i> Добавить пост
        </a>
        <h4>Список публикаций</h4>
        <table>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Статус</th>
                <th colspan="2">Action</th>
            </tr>

            <?php foreach ($data['posts'] as $post):?>
                <tr>
                    <td><?php echo $post['id']?></td>
                    <td><?php echo $post['title']?></td>

                    <td>
                        <?php echo Blog::getStatusText($post['status']);?>
                    </td>

                    <td><a title="Редактировать" href="/admin/blog/edit/<?php echo $post['id']?>" class="del">
                            <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                        </a></td>
                    <td><a title="Удалить" href="/admin/blog/delete/<?php echo $post['id']?>" class="del">
                            <i class="fa fa-times fa-2x" aria-hidden="true"></i>
                        </a></td>
                </tr>
            <?php endforeach;?>
        </table>
</article>
<div class="appendix"></div>
