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
		<title>練習6-6-output</title>
	</head>
	<body>
<?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('update POKEMON set name=?,type=? where id=?');

    if (empty($_POST['name'])) {
        echo '名前を入力してください。';
    } elseif (empty($_POST['type'])) {
        echo 'タイプを入力してください。';
    } elseif ($sql->execute([htmlspecialchars($_POST['name']), $_POST['type'], $_POST['id']])) {
        echo '更新に成功しました';
    } else {
        echo '更新に失敗しました';
    }
    
?>
        <hr>
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
        <button onclick="location.href='top.php'">トップ画面へ戻る</button>
    </body>
</html>
