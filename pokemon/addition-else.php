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
    <link rel="stylesheet" href="css/style.css">
    <title>検索結果</title>
</head>

<?php
$pdo = new PDO($connect, USER, PASS);
$sql = $pdo->prepare('insert into POKEMON(id, name, type) values(?, ?, ?) on duplicate key update id = id');

if (!preg_match('/^\d+$/', $_POST['id'])) {
    echo '番号を整数で入力してください';
} else if (empty($_POST['name'])) {
    echo '名前を入力してください。';
} elseif (empty($_POST['type'])) {
    echo 'タイプを入力してください。';
} elseif ($sql->execute([$_POST['id'], $_POST['name'], $_POST['type']])) {
    echo '<font color="red">追加に成功しました</font>';
} else {
    echo '<font color="red">追加に失敗しました。重複が検出されました。</font>';
}
?>

<br><hr><br>
<table>
    <tr><th>番号</th><th>名前</th><th>タイプ</th></tr>
    <?php
    foreach ($pdo->query('select * from POKEMON') as $row) {
        echo '<tr>';
        echo '<td>', $row['id'], '</td>';
        echo '<td>', $row['name'], '</td>';
        echo '<td>', $row['type'], '</td>';
        echo '</tr>';
        echo "\n";
    }
    ?>
</table>
<form action="top.php" method="post">
    <button type="submit">トップへ戻る</button>
</form>
</body>
</html>
