<?php
include('ut_functions.php');
$pdo = connect_to_db();
// $dbn = 'mysql:dbname=gsacf_09_04;charset=utf8;port=3306;host=localhost';
// $user = 'root';
// $pwd = '';

// try {
//   $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//   exit('DB Error：' . $e->getMessage());
// }

$sql = 'SELECT * FROM users_table';

$stmt = $pdo->prepare($sql);

exec_query($stmt);
// try {
//   $stmt->execute();
// } catch (PDOException $e) {
//   exit('sql error：' . $e->getMessage());
// }

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// データの出力用変数（初期値は空文字）を設定
$output = "";
foreach ($result as $record) {
  $output .= "<tr>";
  $output .= "<td>{$record["username"]}</td>";
  $output .= "<td>{$record["password"]}</td>";
  // edit deleteリンクを追加
  $output .= "<td><a href='ut_edit.php?id={$record["id"]}'>edit</a></td>";
  $output .= "<td><a href='ut_delete.php?id={$record["id"]}'>delete</a></td>";
  $output .= "</tr>";
}
// $recordの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
// 今回は以降foreachしないので影響なし
unset($record);
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー管理</title>
</head>

<body>
  <fieldset>
    <legend>ユーザー管理</legend>
    <a href="ut_input.php">入力画面</a>
    <table>
      <thead>
        <tr>
          <th>username</th>
          <th>password</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>