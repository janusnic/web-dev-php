<section>
    <div class="container">
        <h2>Личный кабинет</h2>
        <h4 id="cabinet_greeting">Привет, <?php echo $data['user']['name']; ?></h4>
        <ul id="cabinet_list">
           <li><a href="/profile/edit">Редактировать персональные данные</a></li>
           <li><a href="/profile/orders">Список покупок</a></li>
        </ul>
    </div>
</section>
