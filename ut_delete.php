<?php
include('ut_functions.php');
$id = $_GET['id'];

//DB接続
$pdo = connect_to_db();

//SQL組み立て
$sql = 'DELETE FROM users_table WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

//クエリ実行
exec_query($stmt);

//一覧画面に戻る
header("Location:ut_read.php");
exit();
