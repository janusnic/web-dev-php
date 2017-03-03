<article class='large'>
        <a href="/admin/category/add" class="add_item"><i class="fa fa-plus fa-2x" aria-hidden="true"></i> Добавить категорию
        </a>
        <h4 id="admin_list_h4">Список категорий</h4>
        <table id="admin_product_list" cellspacing="0">
            <tr>
                <th>ID категории</th>
                <th>Название категории</th>
                <th>Порядковый номер</th>
                <th>Статус</th>
            </tr>

            <?php foreach ($data['categories'] as $category):?>
                <tr>
                    <td><?php echo $category['id']?></td>
                    <td><?php echo $category['name']?></td>
                    <td><?php echo $category['sort_order']?></td>
                    <td>
                        <?php echo Category::getStatusText($category['status']);?>
                    </td>
                    <td><a title="Редактировать" href="/admin/category/edit/<?php echo $category['id']?>" class="del">
                            <i class="fa fa-pencil-square-o fa-2x" aria-hidden="true"></i>
                        </a></td>
                    <td><a title="Удалить" href="/admin/category/delete/<?php echo $category['id']?>" class="del">
                            <i class="fa fa-times fa-2x" aria-hidden="true"></i>
                        </a></td>
                </tr>
            <?php endforeach;?>
        </table>
</article>
<div class="appendix"></div>
