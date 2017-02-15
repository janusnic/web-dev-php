<?php
include (ROOT . '/views/parts/header.php');
?>
<main>
        <ul id="gallery-items" class="container">
        </ul> <!-- gallery-items -->
        <?php
        $a =10; $b = 20;
        if ($a > $b) {
            echo "a больше, чем b";
        } else if ($a == $b) {
            echo "a равен b";
        } else {
            echo "a меньше, чем b";
        }
/*
        if($a > $b):
            echo $a." больше, чем ".$b;
        elseif($a == $b): // Заметьте, тут одно слово.
            echo $a." равно ".$b;
        else:
            echo $a." не больше и не равно ".$b;
        endif;

        // пример 1
        $i = 1;
        while ($i <= 10) {
            echo $i++;  // выводится будет значение переменной $i перед её увеличением (post-increment)
        }

        //  пример 2
        $i = 1;
        while ($i <= 10):
            echo $i;
            $i++;
        endwhile;

        // Главное отличие от обычного цикла while в том, что первая итерация цикла do-while гарантированно выполнится
        $i = 0;
        do {
            echo $i;
        } while ($i > 0);

        // Каждое из выражений может быть пустым или содержать несколько выражений, разделенных запятыми.
        for ($i = 1, $j = 0; $i <= 10; $j += $i, print $i, $i++);

        // Если несколько элементов в объявлении массива используют одинаковый ключ, то только последний будет использоваться, а все другие будут перезаписаны.

        $array = array(
            1    => "a",
            "1"  => "b",
            1.5  => "c",
            true => "d",
        );
        var_dump($array);

        // Массивы в PHP могут содержать ключи типов integer и string одновременно
        $array = array(
            "foo" => "bar",
            "bar" => "foo",
            100   => -100,
            -100  => 100,
        );
        var_dump($array);

        // Индексированные массивы без ключа
        $array = array("foo", "bar", "hallo", "world");
        var_dump($array);

        // Возможно указать ключ только для некоторых элементов и пропустить для других:
        $array = array(
                 "a",
                 "b",
            6 => "c",
                 "d",
        );
        var_dump($array);

        // Доступ к элементам массива может быть осуществлен с помощью синтаксиса array[key].
        $array = array("foo" => "bar", 42    => 24, "multi" => array(
                 "dimensional" => array(
                     "array" => "foo") )
        );
        var_dump($array["foo"]);
        var_dump($array[42]);
        var_dump($array["multi"]["dimensional"]["array"]);

        for ($i = 0; $i < count($categories); $i++)
        {
             echo $categories[$i]['id'].' '.$categories[$i]['parent_id'].' '.$categories[$i]['name'].'<br />';
        }

        foreach ($categories as $key => $value)
        {
             echo $key, var_dump($value), '<br />';
        }

        foreach ($categories as $key => $value)
        {
             echo $key, var_dump($value), '<br />';

             foreach ($value as $k => $v)
             {
                 echo $k, $v, '<br />';
             }
        }
        */
//        treeview($categories);
?>
    </main>

<?php
include (ROOT . '/views/parts/cart.php');
include (ROOT . '/views/parts/footer.php');
?>
