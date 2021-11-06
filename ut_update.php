<?php
// var_dump($_POST);
// exit();

include('ut_functions.php');

if (
    !isset($_POST['username']) || $_POST['username'] == '' ||
    !isset($_POST['password']) || $_POST['password'] == '' ||
    !isset($_POST['id']) || $_POST['id'] == ''
) {
    echo json_encode(["error_msg" => "no input"]);
    exit();
}

$username = $_POST['username'];
$password = $_POST['password'];
$id = $_POST['id'];

$pdo = connect_to_db();

// var_dump('<pre>'); //改行
// var_dump($todo);
// var_dump('<pre>');
// var_dump($deadline);
// var_dump('<pre>');
// var_dump($id);

$sql = "UPDATE users_table SET username=:username, password=:password,
           updated_at=sysdate() WHERE id=:id";
//SQL組み立て
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

exec_query($stmt);
// try {
//   $stmt->execute();
// } catch (PDOException $e){
//   exit('sql実行エラー：' . $e->getMessage());
// }
header("Location:ut_read.php");
exit();
