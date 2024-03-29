<?php
const SERVER = 'mysql220.phy.lolipop.lan';
const DBNAME = 'LAA1518848-final';
const USER = 'LAA1518848';
const PASS = 'Nagamine15';
$connect = 'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <title>練習6-8</title>
</head>
<body>
    <h1>ポケモン一覧</h1>
    <hr>
    <button onclick="location.href='addition.php'">商品を登録する</button>
    <table>
        <tr><th>番号</th><th>名前</th><th>タイプ</th><th>更新</th><th>削除</th></tr>
    <?php
    $pdo = new PDO($connect, USER, PASS);
    foreach($pdo->query('SELECT * FROM POKEMON') as $row) {
        echo '<tr>';
        echo '<td>', $row['id'], '</td>';
        echo '<td>', $row['name'], '</td>';
        echo '<td>', $row['type'], '</td>';
        echo '<td>';
        echo '<form action="update.php" method="post">';
        echo '<input type="hidden" name="id" value="', $row['id'], '">';
        echo '<button type="submit">更新</button>';
        echo '</form>';
        echo '</td>';
        echo '<td>';
        echo '<form action="delete.php" method="post">';
        echo '<input type="hidden" name="id" value="', $row['id'], '">';
        echo '<button type="submit">削除</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
        echo "\n";
    }
    ?>
    </table>
</body>
</html>
