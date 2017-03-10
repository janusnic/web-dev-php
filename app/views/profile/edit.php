<section>
    <div class="container">
            <?php if($data['res']):?>
                <h4 id="edit_thanks">Данные успешно изменены!</h4>
                <h3 id="to_cabinet">Вернуться в <a href="/profile" id="reg_main_a">Кабинет</a></h3>
            <?php else: ?>

            <?php if (isset($errors) && is_array($errors)):?>
                <ul class="errors">
                    <?php foreach($data['errors'] as $error):?>
                        <li> - <?php echo $error;?></li>
                    <?php endforeach;?>
                </ul>
            <?php endif;?>

            <form action="#" method="post" id="edit_form">
                <h2>Редактирование данных</h2>
                <p>Имя</p>
                <input required type="text" name="name" placeholder="Введите имя">
                <p>Пароль</p>
                <input required type="password" name="password" placeholder="Введите пароль">
                <input type=submit name="submit" value="Сохранить" id="save_btn">
            </form>
        <?php endif;?>
    </div>
</section>
