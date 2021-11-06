<?php
// var_dump($_GET);
// exit();
// 関数ファイル読み込み 
include("ut_functions.php");
// 送信されたidをgetで受け取る 
$id = $_GET['id'];
// DB接続&id名でテーブルから検索
$pdo = connect_to_db();

$sql = 'SELECT * FROM users_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
// $status = $stmt->execute();

exec_query($stmt);
$record = $stmt->fetch(PDO::FETCH_ASSOC); //１行だけ取得したい
$username = $record['username'];
$password = $record['password']

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー管理</title>
</head>

<body>
  <form action="ut_update.php" method="POST">
    <fieldset>
      <legend>ユーザー管理（編集）</legend>
      <a href="ut_read.php">一覧画面</a>
      <div>
        username: <input type="text" name="username" value="<?= $record["username"] ?>">
      </div>
      <div>
        password: <input type="text" name="password" value="<?= $record["password"] ?>">
      </div>
      <input type="hidden" name="id" value="<?= $record['id'] ?>">
      <div>
        <button>submit</button>
      </div>

    </fieldset>
  </form>

</body>

</html>