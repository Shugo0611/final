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
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <table>
        <tr><th>番号</th><th>名前</th><th>タイプ</th></tr>

        <?php
        $pdo = new PDO($connect, USER, PASS);
        $sql = $pdo->prepare('SELECT * FROM POKEMON WHERE id=?');
        $sql->execute([$_POST['id']]);
        foreach ($sql as $row) {
            echo '<tr>';
            echo '<form action="update-else.php" method="post">';
            echo '<td>';
            echo '<input type="text" name="id" value="' . $row['id'] . '">';
            echo '</td>';
            echo '<td>';
            echo '<input type="text" name="name" value="' . $row['name'] . '">';
            echo '</td>';
            echo '<td>';
            echo '<input type="text" name="type" value="' . $row['type'] . '">';
            echo '</td>';
            echo '<td><input type="submit" value="更新"></td>';
            echo '</form>';
            echo '</tr>';
            echo "\n";
        }
        ?>
    </table>
    <button onclick="location.href='top.php'">トップに戻る</button>
</body>
</html>
