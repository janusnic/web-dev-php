<?php
include (ROOT . '/views/parts/header.php');
?>


Hello World
<h1>Hello World</h1>

<?php echo "<h2>Hello World</h2>";?>

<?php
// с echo можно использовать переменные ...
$hello = "<h3>Hello World</h3>";
echo $hello;
echo($hello);
echo "$hello";
echo '$hello';
echo "{$hello}";

$foo = "foobar";
$bar = "barbaz";
echo $foo,$bar;     // foobarbarbaz

$str1 = <<<EOD
Пример строки,
охватывающей несколько строчек,
с использованием heredoc-синтаксиса.
$foo, $bar
EOD;
echo $str1;

$str2 = <<<'EOD'
Пример текста,
занимающего несколько строк,
с помощью синтаксиса nowdoc.
$foo, $bar
EOD;
echo $str2;
?>
<?= $hello; ?>
<?= "{$hello}"; ?>
<?php print $hello; ?>
<?php print "$hello"; ?>
<?php
include (ROOT . '/views/parts/footer.php');
?>
