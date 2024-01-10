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
		<title>練習6-8-delete</title>
	</head>
	<body>
		<?php
		$pdo = new PDO($connect, USER, PASS);
		$sql = $pdo->prepare('delete from  POKEMON WHERE id = ?');
		if ($sql->execute([$_POST['id']])) {
			echo '削除に成功しました。';
		} else {
			echo '削除に失敗しました。';
		}
		?>
		<br><hr><br>
		<table>
			<tr><th>番号</th><th>名前</th><th>タイプ</th></tr>
	<?php
			foreach ($pdo->query('SELECT * FROM POKEMON') as $row) {
				echo '<tr>';
				echo '<td>', $row['id'], '</td>';
				echo '<td>', $row['name'], '</td>';
				echo '<td>', $row['type'], '</td>';
				echo '</tr>';
				echo "\n";
			}
	?>
		</table>
		<button onclick="location.href='top.php'">トップへ戻る</button>
	        </body>
        </html>