<article class='large'>

        <h2>Просмотр заказа #<?php echo $data['orders']['id'];?></h2>
        <h4>Информация о заказе</h4>

        <table>

            <tr>
                <td>Номер заказа :</td>
                <td><?php echo $data['orders']['id'];?></td>
            </tr>

            <tr>
                <td>Имя клиента:</td>
                <td><?php echo $data['orders']['user_name'];?></td>
            </tr>

            <tr>
                <td>Телефон клиента :</td>
                <td><?php echo $data['orders']['user_phone'];?></td>
            </tr>

            <tr>
                <td>Комментарий клиента :</td>
                <td><?php echo $data['orders']['user_comment'];?></td>
            </tr>

            <tr>
                <td>ID клиента :</td>
                <td><?php echo $data['orders']['user_id'];?></td>
            </tr>

            <tr>
                <th>Дата заказа :</th>
                <td><?php echo $data['orders']['formated_date'];?></td>
            </tr>

            <tr>
                <th>Статус заказа :</th>
                <td><?php echo Order::getStatusText($data['orders']['status']);?></td>
            </tr>

        </table>

        <h3>Товары в заказе</h3>

        <table>

            <tr>
                <th>ID товара</th>
                <th>Код товара</th>
                <th>Название</th>
                <th>Цена</th>
                <th>Количество</th>
            </tr>

            <?php $i=0; foreach ($data['products'] as $product):?>
                <tr>
                    <td><?php echo $product['id']?></td>
                    <td><?php echo $product['code'];?></td>
                    <td><?php echo $product['name'];?></td>
                    <td><?php echo $product['price'];?></td>
                    <td><?php echo $data['pQuantity'][$i][$product['id']]; $i++;?></td>
                    <td><?php print_r($data['pQuantity']);?></td>
                </tr>
            <?php endforeach;?>
        </table>
</article>
