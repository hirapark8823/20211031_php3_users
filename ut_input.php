<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー管理（入力画面）</title>
</head>

<body>
  <form action="ut_create.php" method="POST">
    <fieldset>
      <legend>ユーザー管理（入力画面）</legend>
      <a href="ut_read.php">一覧画面</a>
      <div>
        username: <input type="text" name="username">
      </div>
      <div>
        password: <input type="text" name="password">
      </div>
      <div>
        <button>submit</button>
      </div>
    </fieldset>
  </form>

</body>

</html>