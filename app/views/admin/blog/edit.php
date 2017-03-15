<article class='large'>

        <h1>Изменить пост</h1>
        <form action="#" method="post" id="add_form">
            <p><label>Заголовок</label><br />
            <input type='text' name='title' value="<?php echo $data['post']['title']?>"></p>

            <p><label>Краткое описание</label><br />
            <textarea name='description' cols='60' rows='10'><?php echo $data['post']['description']?></textarea></p>

            <p><label>Контент</label><br />
            <textarea name='content' cols='60' rows='10'><?php echo $data['post']['content']?></textarea></p>

            <p>Статус</p>
            <select name="status">
                <option value="1" <?php if($data['post']['status'] == 1) echo 'selected'?>>Отображать</option>
                <option value="0" <?php if($data['post']['status'] == 0) echo 'selected'?>>Скрывать</option>
            </select>

            <input type=submit name="submit" value="Сохранить" id="add_btn">
        </form>
</article>
