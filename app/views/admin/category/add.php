<article class='large'>

        <h1>Добавить новню категорию</h1>
        <form action="#" method="post" id="add_form">

            <p>Родительская категория</p>
            <input required type="text" name="parent_id">

            <p>Название категории</p>
            <input required type="text" name="name">

            <p>Порядковый номер</p>
            <input required type="text" name="sort_order">

            <p>Статус отображения</p>
            <select name="status">
                <option value="1" selected>Отображать</option>
                <option value="0">Скрыть</option>
            </select>

            <input type=submit name="submit" value="Сохранить" id="add_btn">
        </form>


<div class="appendix"></div>
</article>
