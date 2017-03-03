<article class='large'>

        <h1>Изменить категорию</h1>
        <form action="#" method="post" id="add_form">

            <p>Название Категории</p>
            <input required type="text" name="name" value="<?php echo $data['category']['name']?>">

            <p>Родительская категория</p>
            <input required type="text" name="parent_id"  value="<?php echo $data['category']['parent_id']?>">

            <p>Порядковый номер</p>
            <input required type="text" name="sort_order" value="<?php echo $data['category']['sort_order']?>">

            <p>Статус</p>
            <select name="status">
                <option value="1" <?php if($data['category']['status'] == 1) echo 'selected'?>>Отображать</option>
                <option value="0" <?php if($data['category']['status'] == 0) echo 'selected'?>>Скрывать</option>
            </select>

            <input type=submit name="submit" value="Сохранить" id="add_btn">
        </form>

<div class="appendix"></div>        
</article>
