<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>TODOリスト登録</title>
  <link href="css/style.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->

<!-- Head[End] -->

<!-- Main[Start] -->
<!-- ここからinsert.phpにデータを送ります -->
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend class="taitoru">TODOリスト登録</legend>
     <label class="kate">カテゴリ：
     <select name="kategori">
<option value="仕事">仕事</option>
<option value="手続き">手続き</option>
<option value="対人予定">対人予定</option>
<option value="メンテナンス">メンテナンス</option>
<option value="その他">その他</option>
</select>
</label>
<br><br>
     <label class="sime">締め切り： <input type="date" name="simekiri"></label><br><br>
     <label class="nai">やること：<textArea name="naiyou" rows="4" cols="40"></textArea></label><br>
     <br><br>
     <input type="submit" value="登録">

     <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">登録済みリスト一覧</a></div>
    </div>
  </nav>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
